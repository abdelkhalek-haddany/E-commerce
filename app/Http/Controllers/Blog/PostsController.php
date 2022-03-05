<?php

namespace App\Http\Controllers\Blog;

use App\Events\PostViewer;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use App\Models\Blog\Post;
use App\Mail\VisitorContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Lang;

class PostsController extends Controller
{
    public function index()
    {
        $tags = Tag::where('is_published', '1')->get();

        // $lang = Lang::getLocale();
        
        // if($lang=="ar"){
        // $recent_posts = Post::query()
        // ->where('is_published', true)->where('lang', 'ar')
        // ->orderBy('created_at', 'desc')->take(5)->get();
        // $posts = Post::orderBy('id', 'DESC')->where('post_type', 'post')
        // ->where('is_published', '1')->where('lang', 'ar')->paginate(8);
        // }else{
        $recent_posts = Post::query()
        ->where('is_published', true)
        ->orderBy('created_at', 'desc')->take(5)->get();
        $posts = Post::orderBy('id', 'DESC')->where('post_type', 'post')
        ->where('is_published', '1')->paginate(8);
        // }

        return view('shop.pages.blog.posts', compact('posts','tags','recent_posts'));
    }

    public function post($slug)
    {
        $lang = Lang::getLocale();

        $post = Post::where('slug', $slug)->where('post_type', 'post')->where('is_published', '1')->first();
        
        if ($post) {
            // get previous user id
            $previous = Post::where('id','<', $post->id)->where('post_type', 'post')->where('is_published', '1')->where('lang', $lang)->first();
            // get next user id
            $next = Post::where('id', '>', $post->id)->where('post_type', 'post')->where('is_published', '1')->where('lang', $lang)->first();
            // increase post viewer
            event(new PostViewer($post));
            return view('shop.pages.blog.post', compact('post','previous','next'));
        } else {
            return view('errors.404');
        }
    }


    public function tag($slug)
    {
        $lang = Lang::getLocale();
        $tag = Tag::where('slug', $slug)->where('is_published', '1')->first();
        if ($tag) {
            $tags = Tag::where('is_published', '1')->get();
            $posts = $tag->posts()->orderBy('posts.id', 'DESC')
            ->where('is_published', '1')
            ->where('lang', "ar")
            ->paginate(16);
            return view('shop.pages.blog.tag', compact('tag', 'posts', 'tags'));
        } else {
            return view('errors.404');
        }
    }

    public function showContactForm()
    {
        return view('contact');
    }
}
