<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\StoreLivreurRequest;
use App\Http\Requests\Shop\UpdateLivreurRequest;
use App\Models\Shop\Category;
use App\Models\Shop\livreur;
use App\Models\User;
use App\Traits\ImgUpTrait;
use Illuminate\Support\Facades\Notification;
use App\Notifications\livreurCreated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LivreursController extends Controller
{

use ImgUpTrait;
    public function index()
    {
        $livreurs = User::where('userType','livreur')->get();
        return view('admin.livreurs.index', compact('livreurs'));
    }

    public function create()
    {
        return view('admin.livreurs.create');
    }

    public function store(StoreLivreurRequest $request)
    {
        try {
            if (!$request->has('active'))
                $request->request->add(['active' => '1']);
            else
                $request->request->add(['active' => '0']);

            $livreur = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'userType' => 'livreur',
                'phone' => $request->phone,
                'email' => $request->email,
                'active' => $request->active,
                'last_login' => now(),
                'country' => $request->country,
                'city' => $request->city,
                'province' => $request->province,
                'password' => Hash::make($request->password),
            ]);

            //Notification::send($livreur, new livreurCreated($livreur));

            return redirect()->route('livreurs.index')->with(['success' => __('admin/messages.saved')]);

        } catch (\Exception $ex) {
            return $ex;
            return redirect()->route('livreurs.index')->with(['error' => __('admin/messages.error')]);

        }
    }

    public function edit($id)
    {
        try {

            $livreur = User::get()->find($id);
            if (!$livreur)
                return redirect()->route('livreurs.index')->with(['error' => __('admin/messages.not_found')]);

            $categories = Category::get();

            return view('admin.livreurs.edit', compact('livreur', 'categories'));

        } catch (\Exception $exception) {
            return redirect()->route('livreurs.index')->with(['error' => __('admin/messages.error')]);
        }
    }

    public function update($id, UpdateLivreurRequest $request)
    {
        try {
            $livreur = User::get()->find($id);
            if (!$livreur)
                return redirect()->route('livreurs.index')->with(['error' => __('admin/messages.not_found')]);
            DB::beginTransaction();
            
            if (!$request->has('active'))
                $request->request->add(['active' => '0']);
            else
                $request->request->add(['active' => '1']);
                
                $livreur = User::where('id', $id);

            if ($request->has('password') && !is_null($request->  password)) {
                $livreur->update(['password'=>Hash::make($request->password)]);
            }

            $livreur->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'userType'=> 'livreur',
                'email' => $request->email,
                'active' => $request->active,
                'last_login' => now(),
                'country' => $request->country,
                'city' => $request->city,
                'province' => $request->province,
                'updated_at' => now(),
            ]);
            DB::commit();
            return redirect()->route('livreurs.index')->with(['success' => __('admin/messages.updated')]);
        } catch (\Exception $exception) {
            return $exception;
            DB::rollback();
            return redirect()->route('livreurs.index')->with(['error' => __('admin/messages.error')]);
        }

    }

    public function destroy($id)
    {

       try {
            $livreur = User::find($id);
            if (!$livreur)
                return redirect()->route('livreurs.index')->with(['error' => __('admin/messages.not_found')]);                
                $logo = $livreur->logo;
                if(file_exists($logo)) unlink($logo);
                $livreur->delete();
            
            return redirect()->route('livreurs.index')->with(['success' => __('admin/messages.deleted')]);

        } catch (\Exception $ex) {
            return redirect()->route('livreurs.index')->with(['error' => __('admin/messages.error')]);
        }
    }

    public function changeStatus($id)
    {
        try {
            $livreur = User::find($id);
            if (!$livreur)
                return redirect()->route('livreurs.index')->with(['error' => __('admin/messages.not_found')]);

           $status =  $livreur->active  == '0' ? '1' : '0';

           $livreur -> update(['active' =>$status ]);

            return redirect()->route('livreurs.index')->with(['success' => __('admin/messages.status_changed')]);

        } catch (\Exception $ex) {
            return redirect()->route('livreurs.index')->with(['error' => __('admin/messages.error')]);
        }
    }
}
