@extends('layouts._master')
@section('meta')
<meta content="abdelkhalek haddany category,category blog" name="description">
<meta content="category haddany, category abdelkhalek, category abdelkhalek haddany,abdelkhalek haddany social media" name="keywords">
@endsection
@section('title','Category | Abdelkhalek Haddany')
@section('content')

<section id="tag" class="tag">
    <div class="container" data-aos="fade-up">
        <h1 class="tag-title">{{$category->name}} </h1>
        <h4 class="tag-desc">{{$category->description}}</h4>
    <div class="row">
        <div class="col-lg-8 entries">
            <div class="row tag-list">
                @foreach($posts as $post)
        <div class="col-md-6">
        <article class="entry">
            <div class="entry-img">
                <img src="{{asset("uploads/posts/$post->thumbnail")}}" class="post-thumbnail" alt="Post Image">
            </div>
            <h2 class="entry-title">
                <a href="{{ url('post/' . $post->slug) }}">
                    <h2 class="post-title">
                        {{ $post->title }}
                    </h2>
                </a>
            </h2>
            <div class="entry-content">
            <div>
                {{$post->expert}}
            </div>
            </div>
        </article>
        </div>
        @endforeach
        
    </div>
        </div>  <?php // End blog entries list  ?>
        <div class="col-lg-4">
            <div class="sidebar">
            <div class="tags">
            <h2>Tags</h2>
            <hr>
                    @foreach($tags as $tag)
                        <a href="{{ url('tag/' . $tag->slug) }}">{{ $tag->name }}</a>
                    @endforeach
            </span>
                </div>
            
    <div class="clearefix"></div>
    </div>
        </div>
        
</section>
@include('sections._footer')
@endsection