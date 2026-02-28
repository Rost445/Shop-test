@extends('layouts.app')
@section('style')
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('url('assets/images/page-header-bg.jpg')')">
            <div class="container">
                <h1 class="page-title">{{ $getBlog->title }}</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">

                    @foreach ($breadcrumbs as $breadcrumb)
                        @if (!$loop->last)
                            <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                        @else
                            <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                        @endif
                    @endforeach

                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <article class="entry single-entry">
                            @include('layouts._message')
                            <figure class="entry-media">
                                <img class="img-thumbnail" style="max-height:420px;max-width:873px; object-fit: contain;"
                                    src="{{ $getBlog->getImage() }}" alt="{{ $getBlog->title }}">
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <a href="#">{{ \Carbon\Carbon::parse($getBlog->created_at)->locale('uk')->translatedFormat('d F Y') }}&nbsp;{{ \Carbon\Carbon::parse($getBlog->created_at)->locale('uk')->translatedFormat('h:i') }}</a>
                                    <span class="meta-separator">|</span>
                                    <a href="#comments">{{ $getBlog->getCommentCount() }} Коментарі</a>
                                    @if (!empty($getBlog->getCategory))
                                        <span class="meta-separator">|</span>
                                        <a
                                            href="{{ url('blog/categpry/' . $getBlog->getCategory->slug) }}">{{ $getBlog->getCategory->name }}</a>
                                    @endif
                                </div>
                                <div class="py-4"></div>
                                <div class="entry-content editor-content">
                                    {!! $getBlog->description !!}
                                </div><!-- End .entry-content -->
                            </div>
                        </article>
                        @if ($getRelatedPost->count() > 0)
                            <div class="related-posts">
                                <h3 class="title">Пов’язані публікації</h3><!-- End .title -->

                                <div class="owl-carousel owl-simple" data-toggle="owl"
                                    data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":1
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    }
                                }
                            }'>

                                    @foreach ($getRelatedPost as $related)
                                        <article class="entry entry-grid">
                                            <figure class="entry-media">
                                                <a href="{{ url("blog/{$related->slug}") }}">
                                                    <img src="{{ $related->getImage() }}" alt="{{ $related->title }}">
                                                </a>
                                            </figure><!-- End .entry-media -->

                                            <div class="entry-body">
                                                <div class="entry-meta">
                                                    <a
                                                        href="#">{{ \Carbon\Carbon::parse($related->created_at)->locale('uk')->translatedFormat('d F Y') }}</a>
                                                    <span class="meta-separator">|</span>
                                                    <a href="#">{{ $related->getCommentCount() }} Коментарі</a>
                                                </div><!-- End .entry-meta -->

                                                <h2 class="entry-title">
                                                    <a href="{{ url("blog/{$related->slug}") }}">{{ $related->title }}</a>
                                                </h2><!-- End .entry-title -->
                                                @if (!empty($related->getCategory))
                                                    <div class="entry-cats">
                                                        
                                                        <a
                                                            href="{{ url('blog/categpry/' . $related->getCategory->slug) }}">
                                                            {{ $related->getCategory->name }}</a>

                                                    </div>
                                                @endif
                                            </div><!-- End .entry-body -->
                                        </article><!-- End .entry -->
                                    @endforeach
                                </div><!-- End .owl-carousel -->
                            </div><!-- End .related-posts -->
                        @endif
                        <div class="comments" id="comments">
                            <h3 class="title">{{ $getBlog->getCommentCount() }} Коментарі</h3><!-- End .title -->
                            <ul>
                                @foreach ($getBlog->getComment as $comment)
                                    <li>
                                        <div class="comment">

                                            <div class="comment-body">

                                                <div class="comment-user">
                                                    <h4><a href="#">{{ $comment->getUser->name }} </a></h4>
                                                    <span class="comment-date">{{ \Carbon\Carbon::parse($comment->created_at)->locale('uk')->translatedFormat('d F Y') }}
                                                        &nbsp;{{ \Carbon\Carbon::parse($comment->created_at)->locale('uk')->translatedFormat('h:i ') }}</span>
                                                </div><!-- End .comment-user -->

                                                <div class="comment-content">
                                                    <p>{{ $comment->comment }} </p>
                                                </div><!-- End .comment-content -->
                                            </div><!-- End .comment-body -->
                                        </div><!-- End .comment -->
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- End .comments -->
                        <div class="reply">
                            <div class="heading">
                                <h3 class="title">Залиште коментар</h3><!-- End .title -->
                            </div><!-- End .heading -->

                            <form action="{{ url('blog/submit_comment') }}" method="post" class="comment-form">
                                {{ csrf_field() }}
                                <input type="hidden" name="blog_id" value="{{ $getBlog->id }}">
                                <label for="reply-message" class="sr-only">коментар</label>
                                <textarea name="comment" id="reply-message" cols="30" rows="4" class="form-control" required
                                    placeholder="Коментар *"></textarea>
                                @if (Auth::check())
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>ПРОКОМЕНТУВАТИ</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                @else
                                    <a href="#signin-modal" data-toggle="modal" class="btn btn-outline-primary-2">
                                        <span>ПРОКОМЕНТУВАТИ</span>
                                        <i class="icon-long-arrow-right"></i></a>
                                @endif
                            </form>
                        </div><!-- End .reply -->
                    </div><!-- End .col-lg-9 -->

                    <aside class="col-lg-3">
                        @include('blog._sidebar')
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection



@section('script')
@endsection
