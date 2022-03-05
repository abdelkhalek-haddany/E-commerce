<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\CategoryRequest;
use App\Models\Shop\Category;
use App\Traits\ImgUpTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    use ImgUpTrait;
    public function index()
    {
        $categories = Category::get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::get();

        return view('admin.categories.create', compact('categories'));
    }


    public function store(CategoryRequest $request)
    {
        try {
            if (!$request->has('is_published')){
                $is_published="0";
            }else{
                $is_published="1";
            }

            $photoName = ($request->photo != null) ? $this->SaveImage($request->photo,'uploads/categories'): '';
            $category = Category::create([
                'title' => $request->title,
                'photo'=>$photoName,
                'parent_id'=>$request->category_id,
                'description' => $request->description,
                'slug' => Str::slug($request->title),
                'is_published' => $is_published,
            ]);
            return redirect()->route('categories.index')->with(['success' => __('admin/messages.saved')]);

        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('categories.index')->with(['error' => __('admin/messages.error')]);
        }

    }


    public function edit($cat_id)
    {
        //get specific categories and its translations
        $Categories = Category::get();
        $Category = Category::get()->find($cat_id);

        if (!$Category)
            return redirect()->route('categories.index')->with(['error' => __('admin/messages.not_found')]);

        return view('admin.categories.edit', compact('Category','Categories'));
    }

    public function update($cat_id, CategoryRequest $request)
    {

        try {
            if (!$request->has('is_published')){
                $is_published="0";
            }else{
                $is_published="1";
            }
            $category = Category::find($cat_id);
            $cat = Category::where('id',$cat_id)->get()->first();
            if (!$category)
                return redirect()->route('categories.index')->with(['error' => __('admin/messages.not_found')]);
            $photoName = ($request->photo != null) 
            ? $this->SaveImage($request->photo,'uploads/categories') 
            : $cat->photo;

            $category->update([
                'title' => $request->title,
                'photo'=>$photoName,
                'description' => $request->description,
                'parent_id'=>$request->category_id,
                'slug' => Str::slug($request->title),
                'is_published' => $is_published,
            ]);
        

            return redirect()->route('categories.index')->with(['success' => __('admin/messages.updated')]);
        } catch (\Exception $ex) {
            return redirect()->route('categories.index')->with(['error' => __('admin/messages.error')]);
        }
    }

    public function destroy($id)
    {

        try {
            $category = Category::find($id);
            if (!$category) {
                return redirect()->route('categories.index', $id)->with(['error' => __('admin/messages.not_found')]);
            }
            else{
                if(file_exists($category->thumbnail())) unlink($category->thumbnail);
            $category->delete();
            return redirect()->route('categories.index')->with(['success' => __('admin/messages.deleted')]);
            }
        } catch (\Exception $ex) {
            return redirect()->route('categories.index')->with(['error' => __('admin/messages.error')]);
        }
    }

    public function changeStatus($id)
    {
        try {
            $category = Category::find($id);
            if (!$category)
                return redirect()->route('categories.index')->with(['error' => __('admin/messages.not_found')]);

           $status =  $category->is_published  == 0 ? '1' : '0';

           $category->update(['is_published'=>$status ]);

            return redirect()->route('categories.index')->with(['success' => __('admin/messages.status_changed')]);

        } catch (\Exception $ex) {
            return redirect()->route('categories.index')->with(['error' => __('admin/messages.error')]);
        }
    }
}
