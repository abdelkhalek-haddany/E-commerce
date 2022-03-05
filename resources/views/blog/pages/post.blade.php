@extends('layouts._master')
@section('meta')
<meta content="abdelkhalek haddany posts ,{{$post->title}}, {{$post->expert}}" name="description">
<meta content="
    @if(count($post->tags) > 0)
        @foreach($post->tags as $tag)
            {{$tag->name}}
        @endforeach
    @endif
    {{$post->title}},
" name="keywords">
@endsection
@section('title',"$post->title")
@section('content')
<div class="single-post">
    <div class="main-content">
    <div class="breadcrumbs" >
    <div class="container breadcrumbs">
        <span><a href="{{route("posts")}}"> {{__("pages/blog/posts.page_title")}} </a></span>
        {{-- <span><a href="{{ url('category/' . $post->categories->first()->slug) }}"> {{$post->categories->first()->name}} </a></span> --}} 
        <span> {{$post->title}} </span>
        </div>
    </div>
        <div class="container">
        <article class="article">
            <header class="article-header">
                
                <h1 class="text-lg">{{$post->title}}</h1>
                <div class="post-desc">
                    {{$post->expert}}
                </div>
            </header>
                <div class="article-info">
            <div class="article-content">
                {!! $post->details !!}
                <p class="t">
                    {{__("pages/blog/post.thanks")}}
                </p>
            </div>
            <div class="post-meta">
                <span> <a href="{{route('about')}}">( {{__("pages/blog/post.by")}}. {{$post->user->name}} )</a></span>
            </div>    
                </div>
            
                <div class="post-tags">
                    <h4>{{__("pages/blog/globale.tags")}}</h4>

                    @if(count($post->tags) > 0)
                                <span class="post-category">
                                    @foreach($post->tags as $tag)
                                        <a href="{{ url('tag/' . $tag->slug) }}">{{ $tag->name }}</a>
                                    @endforeach
                        </span>
                            @endif
                        
                </div>
                <div class="post-share">
                    <h4>{{__("pages/blog/post.share_post")}}</h4>
                    <a class="icon-facebook"
                        href="https://www.facebook.com/sharer/sharer.php?u={{url()->full()}}" 
                        target="_blank">{{__("pages/blog/post.facebook")}}</a>
                    <a class="icon-twitter"
                        href="https://twitter.com/share?text='{{$post->title}}'&url={{url()->full()}}" 
                        target="_blank">{{__("pages/blog/post.twitter")}}</a>
                    <a class="icon-linkedin"
                        href="http://www.linkedin.com/shareArticle?mini=true&url{{url()->full()}}&title={{$post->title}}&summary={{$post->slug_title}}&source=haddany.org" 
                    target="_blank">{{__("pages/blog/post.linkedin")}}</a>
                </div>
                    <div class="post-pagination row">
                    <div class="col-sm-6 col-xm-12 ">
                        <div class="prev-button">

                        
                    @if($previous != null)
                    
                        <span class="prev"><a href="{{ route('post' , $previous->slug) }}"> <i class="fas fa-chevron-left" aria-hidden="true"></i>{{$previous->title}}</a></span>
                    @else
                    <span class='desibled'><i class='fas fa-chevron-left' aria-hidden='true'></i> {{__("pages/blog/globale.previous_single")}}</span>
                    @endif
                </div>
                </div>
            <div class="col-sm-6 col-xm-12">
                    <div class="next-button">
                    @if($next != null)
                    <span class="next"><a href="{{ route('post' , $next->slug) }}"> {{$next->title}} <i class="fas fa-chevron-right" aria-hidden="true"></i></a></span>
                    @else
                    <span class='desibled'>{{__("pages/blog/globale.next_single")}} <i class='fas fa-chevron-right' aria-hidden='true'></i></span>
                    @endif
                </div>    
            </div>
        </div>
        {{-- 
                <div class="related-posts">
                    <h4>Related Posts</h4>

        <!-- the loop -->
        @foreach ($relitedPosts as $relatedPost)
    <div class="col-lg-4 col-sm-6" data-aos="fade-down-right" data-aos-delay="100">
        <div class="main-post">
        <div class="post-thumbnail"><img src="" alt=""></div>
            <h2 class="post-title">{{$relatedPost->title}}</h2>
            <!-- <div class="post-content">
            {{ $relatedPost->slug_title}}
        </div> -->
                <a href="{{ url('post/' . $relatedPost->slug) }}" class="read-more"><span>Read More...</span></a>
            </div>
    </div>
    @endforeach  
<!-- end of the loop -->
    </div> --}}
                {{-- <div class="ads">
                    <h4>Ads</h4>
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- horizontal -->
                <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-client="ca-pub-9803119932380109"
                        data-ad-slot="5955144779"
                        data-ad-format="auto"
                        data-full-width-responsive="true"></ins>
                <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                
                </div> --}}
    </article>
    </div>
</div>
</div>
@include('sections._footer')
@endsection