<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\StoreVendorRequest;
use App\Http\Requests\Shop\UpdateVendorRequest;
use App\Models\Shop\Category;
use App\Models\Shop\Vendor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ImgUpTrait;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VendorCreated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class VendorsController extends Controller
{

use ImgUpTrait;
    public function index()
    {
        $vendors = User::where('userType','vendor')->get();
        return view('admin.vendors.index', compact('vendors'));
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
                    $request->request->add(['active' => '1']);
                else
                    $request->request->add(['active' => '0']);
    
                $filePath = "";
                if ($request->has('logo')) {
                    //$filePath = SaveImage('vendors', $request->logo);
                    $filePath = $this->SaveImage($request->logo,'uploads/vendors');
                }
    
                $vendor = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'company_name' => $request->company_name,
                    'userType' => 'vendor',
                    'category_id' => $request->category_id,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'active' => $request->active,
                    'country' => $request->country,
                    'city' => $request->city,
                    'province' => $request->province,
                    'last_login' => now(),
                    // 'address' => $request->address,
                    'logo' => $filePath,
                    'password' => Hash::make($request->password),
                ]);
    
                //Notification::send($vendor, new VendorCreated($vendor));
    
                return redirect()->route('vendors.index')->with(['success' => __('admin/messages.saved')]);
    
            } catch (\Exception $ex) {
                return $ex;
                return redirect()->route('vendors.index')->with(['error' => __('admin/messages.error')]);
    
            }
        }
    
        public function edit($id)
        {
            try {
    
                $vendor = User::get()->find($id);
                if (!$vendor)
                    return redirect()->route('vendors.index')->with(['error' => __('admin/messages.not_found')]);
    
                $categories = Category::get();
    
                return view('admin.vendors.edit', compact('vendor', 'categories'));
    
            } catch (\Exception $exception) {
                return redirect()->route('vendors.index')->with(['error' => __('admin/messages.error')]);
            }
        }
    
        public function update($id, UpdateVendorRequest $request)
        {
            try {
                $vendor = User::get()->find($id);
                if (!$vendor)
                    return redirect()->route('vendors.index')->with(['error' => __('admin/messages.not_found')]);
                DB::beginTransaction();
                //photo
                if ($request->has('logo') ) {
                    $filePath = $this->SaveImage($request->logo,'uploads/vendors');
                    User::where('id', $id)
                        ->update([
                            'logo' => $filePath,
                        ]);
                }
                if (!$request->has('active'))
                    $request->request->add(['active' => '0']);
                else
                    $request->request->add(['active' => '1']);
                    
                    $vendor = User::where('id', $id);
    
                if ($request->has('password') && !is_null($request->  password)) {
                    $vendor->update(['password'=>Hash::make($request->password)]);
                }
    
                $vendor->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'company_name' => $request->company_name,
                    'phone' => $request->phone,
                    'userType'=> 'vendor',
                    'country' => $request->country,
                    'city' => $request->city,
                    'province' => $request->province,
                    'category_id' => $request->category_id,
                    'email' => $request->email,
                    'active' => $request->active,
                    'last_login' => now(),
                    // 'address' => $request->address,
                ]);
                DB::commit();
                return redirect()->route('vendors.index')->with(['success' => __('admin/messages.updated')]);
            } catch (\Exception $exception) {
                return $exception;
                DB::rollback();
                return redirect()->route('vendors.index')->with(['error' => __('admin/messages.error')]);
            }
    
        }
    
        public function destroy($id)
        {
    
           try {
                $vendor = User::find($id);
                if (!$vendor)
                    return redirect()->route('vendors.index')->with(['error' => __('admin/messages.not_found')]);                
                    $logo = $vendor->logo;
                    if(file_exists($logo)) unlink($logo);
                    $vendor->delete();
                
                return redirect()->route('vendors.index')->with(['success' => __('admin/messages.deleted')]);
    
            } catch (\Exception $ex) {
                return redirect()->route('vendors.index')->with(['error' => __('admin/messages.error')]);
            }
        }
    
        public function changeStatus($id)
        {
            try {
                $vendor = User::find($id);
                if (!$vendor)
                    return redirect()->route('vendors.index')->with(['error' => __('admin/messages.not_found')]);
    
               $status =  $vendor->active  == '0' ? '1' : '0';
    
               $vendor -> update(['active' =>$status ]);
    
                return redirect()->route('vendors.index')->with(['success' => __('admin/messages.status_changed')]);
    
            } catch (\Exception $ex) {
                return redirect()->route('vendors.index')->with(['error' => __('admin/messages.error')]);
            }
        }
    }
    