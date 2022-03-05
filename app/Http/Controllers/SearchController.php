<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop\Category;
use App\Models\Blog\Tag;
use App\Models\Blog\Post;
use App\Models\Shop\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        //get the general information about the website

        $key = trim($request->get('q'));

        $posts = Post::query()
            ->where('title', 'like', "%{$key}%")
            ->orWhere('details', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        $products = Product::query()
            ->where('title', 'like', "%{$key}%")
            ->orWhere('summary', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        $countPosts = $posts->count();

        $countProducts = $products->count();

        //get all the categories
        $categories = Category::all();

        //get all the tags
        $tags = Tag::all();

        return view('shop.pages.search', compact('key',
            'posts','products','categories','tags','countProducts','countPosts',
    ));
    }
}
