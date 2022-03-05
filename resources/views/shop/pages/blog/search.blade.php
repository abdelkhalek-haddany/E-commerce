@extends('shop/layouts/authers/_master')
@section('title','Search')
@section('content')

@section('meta')
<meta content="abdelkhalek haddany serach page" name="description">
<meta content="haddany search, abdelkhalek search,abdellkhalek haddany search" name="keywords">
@endsection
@section('title','Search | Abdelkhalek Haddany')
@section('content')
    <main class="search" id="main">
        <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
        <h2 class="search-title">
            <span class="num-result">{{$count}}</span> {{__('shop/pages/blog/search.search_result_for')}} <span>{{$key}}</span>
        </h2>
        <div class="row">
            <div class="col-lg-8">
            @if($count > 0)
            <div class="entries">
                <div class="topecs-list">
                @foreach ($posts as $post)
                <article class="entry">
                <h2 class="entry-title">
                    <a href="{{ url('post/' . $post->slug) }}"> {{ $post->title }}</a>
                </h2>
            
                <div class="entry-meta">
                <ul class="row">
                <li class="col-md-6">
                    <div class="tags-search">
                        @if(count($post->tags) > 0)
                                <span class="post-category">
                                    @foreach($post->tags as $tag)
                                        <a href="{{ url('tag/' . $tag->slug) }}">{{ $tag->name }}</a>
                                    @endforeach
                                </span>
                        @endif
                    </div>
                </li>
                <li class="col-md-6"><i class="fas fa-clock"></i>{{ date('M d, Y', strtotime($post->created_at)) }}</li>
                </ul>
            </div>
                </article>
    @endforeach
            </div>
            {{-- End blog entry --}}
            <div class="clearfex"></div>
            {{-- End blog entries list   --}}
            </div>
            @endif
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    {{--  End Search field --}}
                    <h3 class="sidebar-title">{{__('shop/pages/blog/globale.search')}}</h3>
                    <hr>
                    <div class="sidebar-item search-form">
                    <form action="search">
                        {{ csrf_field() }}
                        <input type="text"  name="s" id="s" placeholder="Search for...">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <br>
                    <div class="latest-posts">
                    <h3 class="sidebar-title">{{__('shop/pages/blog/globale.recent_posts')}}</h3>

                    @foreach($recent_posts as $recent_post)
                        <a href="{{ url('post/' . $recent_post->slug) }}">{{ $recent_post->title }}</a>
                    @endforeach
                    </div>
                </div></div>
                    <div class="sidebar">
                    <div class="tags">
                        <h3 class="sidebar-title">{{__('shop/pages/blog/globale.tags')}}</h3>
                        <hr>
                        @foreach($tags as $tag)
                        <a href="{{ url('tag/' . $tag->slug) }}">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    </div>  {{-- End tags sidebar --}} 

                    <div class="sidebar">
                @include('sections._palmier_sidebar')
                </div>
                        
                </div> {{-- End sidebar --}} 
                </div>{{-- End blog sidebar --}} 
            </div>
    </section>
    </main>
@include('sections._footer')
@endsection