@extends('layouts.app')
@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{ Breadcrumbs::render('shipping_method') }}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('{{ $getPage->getImage() }}')">
            <h1 class="page-title text-white">{{ $getPage->title }}</h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3 mb-lg-0">
                    <h2 class="title">{{ $getPage->title }}</h2>
                  {!! $getPage->description !!}
                </div>
                
                
              
            </div>

            <div class="mb-5"></div>
        </div>

      

        <div class="mb-2"></div><!-- End .mb-2 -->

        
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection

