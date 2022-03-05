<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\Blog\Tag;
use App\Models\Blog\Post;
use App\Traits\ImgUpTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StorePostRequest;
use App\Http\Requests\Blog\UpdatePostRequest;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->where('post_type', 'post')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::orderBy('id', 'ASC')->get();
        return view('admin.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    use ImgUpTrait;
    public function store(StorePostRequest $request)
    {
        try{
        $imagesName = $this->SaveImage($request->thumbnail,'uploads/posts');
        $post = new  Post();
        $post->user_id = Auth::id();
        $post->thumbnail = $imagesName;
        $post->title = $request->title;
        $post->lang = $request->lang;
        $post->slug = Str::slug($request->title);
        $post->expert = $request->expert;
        $post->details = $request->details;
        $post->views = 1;
        $post->is_published = $request->is_published;
        $post->post_type = 'post';
        $post->save();

        $post->tags()->sync($request->tag_id, false);

        return redirect()->route('posts.index')->with(['success' => __('admin/messages.saved')]);
    } catch (\Exception $ex) {
        return redirect()->route('posts.index')->with(['error' => __('admin/messages.error')]);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    // public function show(Post $post)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
        $tags = Tag::orderBy('id', 'ASC')->get();
        $post = Post::where('id',$id)->get()->first();
        if($post)
        return view('admin.posts.edit', compact('post','tags'));
        } catch (\Exception $ex) {
            return redirect()->route('posts.index')->with(['error' => __('admin/messages.error')]);
        }
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    
    public function update(UpdatePostRequest $request, $id)
    {

        try{
        $p = Post::where('id',$id)->get()->first();

        $photoName = ($request->thumbnail) 
            ? $this->SaveImage($request->thumbnail,'uploads/posts') 
            : $p->thumbnail;
        
            
        $post = Post::find($id);
        $post->user_id = Auth::id();
        $post->thumbnail = $photoName;
        $post->lang = $request->lang;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->expert = $request->expert;
        $post->details = $request->details;
        $post->views = $post->views;
        $post->is_published = $request->is_published;
        $post->update();

        $post->tags()->sync($request->tag_id);

        return redirect()->route('posts.index')->with(['success' => __('admin/messages.updated')]);
    } catch (\Exception $ex) {
        return redirect()->route('posts.index')->with(['error' => __('admin/messages.error')]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try{
            if($post){
                if(file_exists($post->thumbnail())) unlink($post->thumbnail);
                $post->delete();
            }
        return redirect()->route('posts.index')->with(['success' => __('admin/messages.deleted')]);
    } catch (\Exception $ex) {
        return redirect()->route('posts.index')->with(['error' => __('admin/messages.error')]);
    }
    }

    public function changeStatus($id)
    {
        try {
            $post = Post::find($id);
            if (!$post)
                return redirect()->route('posts.index')->with(['error' => __('admin/messages.not_found')]);

           $status =  $post->is_published  == '0' ? '1' : '0';

           $post -> update(['is_published' =>$status ]);

            return redirect()->route('posts.index')->with(['success' => __('admin/messages.status_changed')]);

        } catch (\Exception $ex) {
            return redirect()->route('posts.index')->with(['error' => __('admin/messages.error')]);
        }
    }

}
