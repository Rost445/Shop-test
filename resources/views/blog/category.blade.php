@extends('layouts.app')
@section('style')
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('url('assets/images/page-header-bg.jpg')')">
            <div class="container">
                <h1 class="page-title">{{ $getCategory->title }}</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">{!! Breadcrumbs::render('blog_category', $category) !!}</a></li>
                   
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="entry-container max-col-2" data-layout="fitRows">
                            @foreach ($getBlog as $value)
                                <div class="entry-item col-sm-6">
                                    <article class="entry entry-grid">
                                        <figure class="entry-media">
                                            <a href="{{ url("blog/{$value->slug}") }}">
                                                <img src="{{ $value->getImage() }}"
                                                    style="height:300px;width:100%; object-fit: cover;"
                                                    alt="{{ $value->title }}">
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <a href="#">{{ \Carbon\Carbon::parse($value->created_at)->locale('uk')->translatedFormat('d F Y') }}&nbsp;{{ \Carbon\Carbon::parse($value->created_at)->locale('uk')->translatedFormat('h:i') }}</a>
                                                <span class="meta-separator">|</span>
                                                <a href="#comments">{{ $value->getCommentCount() }} Коментарі</a>
                                            </div><!-- End .entry-meta -->

                                            <h2 class="entry-title">
                                                <a href="{{ url("blog/{$value->slug}") }}">{{ $value->title }}</a>
                                            </h2><!-- End .entry-title -->
                                            @if (!empty($value->getCategory))
                                                <div class="entry-cats">
                                                    <a
                                                        href="{{ url("blog/category/{$value->getCategory->slug}") }}">{{ $value->getCategory->name }}</a>

                                                </div>
                                            @endif
                                            <div class="entry-content">
                                                {{ Illuminate\Support\Str::limit(strip_tags($value->short_description), 180) }}
                                                <br>
                                                <a href="{{ url("blog/{$value->slug}") }}" class="read-more">Продовжити
                                                    читання</a>
                                            </div>
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->
                                </div><!-- End .entry-item -->
                            @endforeach
                        </div><!-- End .entry-container -->

                        {!! $getBlog->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
