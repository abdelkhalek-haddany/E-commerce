<?php
namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\StoreVendorRequest;
use App\Http\Requests\Shop\UpdateVendorRequest;
use App\Models\Shop\Cart;
use App\Models\Shop\CartItem;
use App\Models\Shop\Category;
use App\Models\Shop\NoAuthCart;
use App\Models\Shop\NoAuthCartItem;
use App\Models\Shop\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ShoppingCartController extends Controller
{

    public function index()
    {
        if(Auth::check()){
        $cartItems=CartItem::where('user_id',Auth::id())->get();
        }else{
        $token = Cookie::get('token') ? Cookie::get('token') : csrf_token();
        $cartItems=CartItem::where('token',$token)->get();
        }
        return view('shop.pages.shopping-cart',compact('cartItems'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.vendors.create', compact('categories'));
    }

    public function store(StoreVendorRequest $request)
    {
        try {

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            $filePath = "";
            if ($request->has('logo')) {
                //$filePath = SaveImage('vendors', $request->logo);
                $filePath = $this->SaveImage($request->logo,'uploads/vendors');

            }

            $vendor = Vendor::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'active' => $request->active,
                'last_login' => now(),
                'address' => $request->address,
                'logo' => $filePath,
                'password' => $request->password,
            ]);
            $vendor->category()->sync($request->category_id,false);

            //Notification::send($vendor, new VendorCreated($vendor));

            return redirect()->route('vendors.index')->with(['success' => 'تم الحفظ بنجاح']);

        } catch (\Exception $ex) {
            return $ex;
            return redirect()->route('vendors.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }

    public function edit($id)
    {
        try {

            $vendor = Vendor::get()->find($id);
            if (!$vendor)
                return redirect()->route('vendors.index')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا ']);

            $categories = Category::get();

            return view('admin.vendors.edit', compact('vendor', 'categories'));

        } catch (\Exception $exception) {
            return redirect()->route('vendors.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update($id, UpdateVendorRequest $request)
    {
        try {
            $vendor = Vendor::get()->find($id);
            if (!$vendor)
                return redirect()->route('vendors.index')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا ']);
            DB::beginTransaction();
            //photo
            if ($request->has('logo') ) {
                 $logoname = $this->SaveImage('uploads/vendors', $request->logo);
                Vendor::where('id', $id)
                    ->update([
                        'logo' => $logoname,
                    ]);
            }


            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

             $data = $request->except('_token', 'id', 'logo', 'password');


            if ($request->has('password') && !is_null($request->  password)) {

                $data['password'] = $request->password;
            }

            $vendor = Vendor::where('id', $id)
                ->update(
                    $data
                );
            $vendor->category()->sync($request->category_id,false);



            DB::commit();
            return redirect()->route('vendors.index')->with(['success' => 'تم التحديث بنجاح']);
        } catch (\Exception $exception) {
            return $exception;
            DB::rollback();
            return redirect()->route('vendors.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    public function destroy($id)
    {

       try {
            $vendor = Vendor::find($id);
            if (!$vendor)
                return redirect()->route('vendors.index')->with(['error' => 'هذا القسم غير موجود ']);                
                $logo = $vendor->logo;
                unlink(public_path()."/uploads/vendors/".$logo);
            
                $vendor->delete();
            
            return redirect()->route('vendors.index')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('vendors.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function changeStatus($id)
    {
        try {
            $vendor = Vendor::find($id);
            if (!$vendor)
                return redirect()->route('vendors.index')->with(['error' => 'this vendor not exists']);

           $status =  $vendor->active  == 0 ? 1 : 0;

           $vendor -> update(['active' =>$status ]);

            return redirect()->route('vendors.index')->with(['success' => 'the status changed successefuly']);

        } catch (\Exception $ex) {
            return redirect()->route('vendors.index')->with(['error' => 'there are an error please try agin or contact us']);
        }
    }
}