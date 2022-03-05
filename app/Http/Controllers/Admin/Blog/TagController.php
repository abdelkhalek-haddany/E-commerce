<?php

namespace App\Http\Controllers\admin\Blog;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreTagRequest;
use App\Http\Requests\Blog\UpdateTagRequest;
use App\Models\User;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')->get();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        try {
        $tag = new Tag();
        $tag->user_id = Auth::id();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->description = $request->description;
        $tag->is_published = $request->is_published;
        $tag->save();
            return redirect()->route('tags.index')->with(['success' => 'tag created successfully']);
        
        }catch (\Exception $ex) {

            return redirect()->route('tags.index')->with(['error' => 'there are an error please try again or contact us']);
        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tag $tag
     * @return \Illuminate\Http\Response
     */
    // public function show(Tag $tag)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        try {
        $tag->user_id = Auth::id();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->description = $request->description;
        $tag->is_published = $request->is_published;
        $tag->update();

        return redirect()->route('tags.index')->with(['success' => __('admin/messages.updated')]);
        
        }catch (\Exception $ex) {

        return redirect()->route('tags.index')->with(['error' => __('admin/messages.error')]);
    
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        Session::flash('delete-message', 'tag deleted successfully');
        return redirect()->route('tags.index');
    }
}
