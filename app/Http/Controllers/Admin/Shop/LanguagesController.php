<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\LanguageRequest;
use App\Models\Shop\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LanguagesController extends Controller
{
    public function index()
    {
        $languages = Language::select()->paginate(10);
        return view('admin.languages.index', compact('languages'));
    }

    public function create()
    {
        return view('admin.languages.create');
    }

    public function store(LanguageRequest $request)
    {
        try {
            Language::create($request->all());
            return redirect()->route('languages.index')->with(['success' => __('admin/messages.saved')]);
        } catch (\Exception $ex) {
            return redirect()->route('languages.index')->with(['error' => __('admin/messages.error')]);
        }
    }

    public function edit($id)
    {
        $language = Language::select()->find($id);
        if (!$language) {
            return redirect()->route('languages.index')->with(['error' => __('admin/messages.error')]);
        }

        return view('admin.languages.edit', compact('language'));
    }

    public function update($id, LanguageRequest $request)
    {

        try {
            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('languages.edit', $id)->with(['error' => __('admin/messages.error')]);
            }


            if (!$request->has('active'))
                $request->request->add(['active' => 0]);

            $language->update($request->except('_token'));

            return redirect()->route('languages.index')->with(['success' => __('admin/messages.updated')]);

        } catch (\Exception $ex) {
            return redirect()->route('languages.index')->with(['error' => __('admin/messages.error')]);
        }
    }

    public function destroy($id)
    {

        try {
            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('languages.index', $id)->with(['error' => __('admin/messages.not_found')]);
            }
            $language->delete();

            return redirect()->route('languages.index')->with(['success' => __('admin/messages.deleted')]);

        } catch (\Exception $ex) {
            return redirect()->route('languages.index')->with(['error' => __('admin/messages.error')]);
        }
    }

    public function changeStatus($id)
    {
        try {
            $language = Language::find($id);
            if (!$language)
                return redirect()->route('languages.index')->with(['error' => __('admin/messages.not_found')]);

           $status =  $language->active  == 0 ? '1' : '0';

           $language -> update(['active' =>$status ]);

            return redirect()->route('languages.index')->with(['success' => __('admin/messages.status_changed')]);

        } catch (\Exception $ex) {
            return redirect()->route('languages.index')->with(['error' => __('admin/messages.error')]);
        }
    }
}
