@extends('shop/layouts/authers/_master')
@section('title','Posts')
@section('content')
@section('meta')
<meta content="abdelkhalek haddany posts" name="description">
<meta content="haddany articles, abdelkhalek posts, abdelkhalek haddany articles,
@if (count($posts)>0)
@foreach($posts as $post)
    {{$post->title}},
@endforeach
@endif
" name="keywords">
@endsection
@section('title','Posts | Abdelkhalek Haddany')
@section('content')

    <?php // START MAIN BLOGS ?>
    <main id="main">
        <section id="blog" class="blog">
        
        <div class="container" data-aos="fade-up">
            <h1 class="p-title">
                {{__("shop/pages/blog/posts.page_title")}}
            </h1>
            <h4 class="p-desc">{{__("shop/pages/blog/posts.page_desc")}}</h4>
        <div class="row">
            <div class="col-lg-8 entries">
                @if (count($posts)>0)
                <div  class="row topecs-list">
                @foreach($posts as $post)
            <div class="col-lg-12">
            <article class="entry">
                <a href="{{route('post' , $post->slug) }}">
                <div class="entry-img">
                    <img src="{{asset("uploads/posts/$post->thumbnail")}}" class="post-thumbnail" alt="Post Image">
                </div>
                <h2 class="entry-title">
                {{ $post->title }}
                </h2>
            </a>
                <div class="entry-content">
                <div class="entry-expert">
                    {{ $post->expert }}
                </div>
                {{-- <div class="read-more">
                    <a href="{{ url('post/' . $post->slug) }}">Read the post</a>
                </div> --}}
                <hr>
                <div class="entry-meta">
                    <ul class="row">
                        <li class="col-md-5"><i class="fas fa-user"></i> <a href="{{route('about')}}">{{ $post->user->name }}</a></li>
                        <li class="col-md-4"><i class="fas fa-clock"></i> <a><time>on {{ date('M d, Y', strtotime($post->created_at)) }}</time></a></li>
                        <li class="col-md-3"><i class="fas fa-eye"></i> <a>{{$post->views}}</a></li>
                    </ul>
                    </div>
                </div>
            </article>
            </div>
            @endforeach
        {{--  End blog entry --}}
        </div>
        <div class="blog-pagination">
            @if ($posts->hasPages())
            <ul class="pagenation">
                @if ($posts->onFirstPage())
                    <li class="disabled"><span>{{__("shop/pages/blog/globale.previous")}}</span></li>
                @else
                    <li><a href="{{ $posts->previousPageUrl() }}" rel="prev">{{__("shop/pages/blog/globale.previous")}}</a></li>
                @endif
                @foreach ($posts as $post)
                    @if (is_string($post))
                        <li class="disabled"><span>{{ $post }}</span></li>
                    @endif
                    @if (is_array($post))
                        @foreach ($post as $page => $url)
                            @if ($page == $posts->currentPage())
                                <li class="active my-active"><span>{{ $page }}</span></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if ($posts->hasMorePages())
                <li><a href="{{ $posts->nextPageUrl() }}" rel="next">{{__("shop/pages/blog/globale.next")}}</a></li>
            @else
                <li class="disabled"><span>{{__("shop/pages/blog/globale.next")}}</span></li>
            @endif
        </ul>
    @endif 
        </div>
        @endif
            </div>  {{-- End blog entries list  --}}
            <div class="col-lg-4">
            <div class="sidebar">
                {{--  End Search field --}}
                <h3 class="sidebar-title">{{__("shop/pages/blog/globale.search")}}</h3>
                <hr>
                <div class="sidebar-item search-form">
                <form action="{{route('search')}}">
                    @csrf
                    <input type="text"  name="s" id="s" placeholder="{{__('shop/pages/blog/globale.search_for')}}">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
                <br>
                <div class="latest-posts">
                    <h3 class="sidebar-title">{{__("shop/pages/blog/globale.recent_posts")}}</h3>

                    @foreach($recent_posts as $recent_post)
                        <a href="{{ route('post' , $recent_post->slug) }}">{{ $recent_post->title }}</a>
                    @endforeach
                </div>
            </div>
            </div>
                <div class="sidebar">
                <div class="tags">
                    <h3 class="sidebar-title">{{__("shop/pages/blog/globale.tags")}}</h3>
                    <hr>
                    @foreach($tags as $tag)
                    <a href="{{ url('tag/' . $tag->slug) }}">{{ $tag->name }}</a>
                    @endforeach
                </div>
                </div>  {{-- End tags sidebar --}} 
                <!--<div class="sidebar">-->
                {{-- <!--@include('sections._palmier_sidebar')--> --}}
                <!--</div>-->


                {{-- <div class="sidebar">
                @include('sections._palmier_sidebar')
                </div> --}}

            </div> {{-- End sidebar --}} 
            </div>{{-- End blog sidebar --}} 
        </div>
        
        <div class="clearefix"></div>
        </div>
    </section>
    </main>
     {{-- // END MAIN BLOGS  --}}
@endsection
