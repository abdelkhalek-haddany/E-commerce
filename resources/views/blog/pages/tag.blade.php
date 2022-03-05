@extends('layouts._master')
@section('meta')
<meta content="{{$tag->description}}" name="description">
<meta content="
@foreach($tags as $tag)
    {{ $tag->name }},
@endforeach
" name="keywords">
@endsection
@section('title',"$tag->name Tag")
@section('content')
<section id="tag" class="tag">
    <div class="container" data-aos="fade-up">
        <h1 class="tag-title">{{$tag->name}} </h1>
        <h4 class="tag-desc">{{$tag->description}}</h4>
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
    
    {{-- <div class="sidebar">
        <div class="tags">
            <h3 class="sidebar-title">Google Ads</h3>
            <hr>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- square -->
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-9803119932380109"
                    data-ad-slot="8702643339"
                    data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
        </div>
        </div>  End ads sidebar  --}}
        </div>
</section>
@include('sections._footer')
@endsection