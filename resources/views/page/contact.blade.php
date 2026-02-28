@extends('layouts.app')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ Breadcrumbs::render('contact') }}</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
        <div class="container">
            <div class="page-header page-header-big text-center"
                style="background-image: url('{{ $getPage->getImage() }}')">
                <h1 class="page-title text-white">{{ $getPage->title }}</h1>
            </div><!-- End .page-header -->
        </div><!-- End .container -->

        <div class="page-content pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-2 mb-lg-0">
                        {!! $getPage->description !!}
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="contact-info">

                                    <ul class="contact-list">
                                        @if (!empty($getSystemSettingApp->address))
                                            <li>
                                                <i class="icon-map-marker"></i>
                                                {{ $getSystemSettingApp->address }}
                                            </li>
                                        @endif
                                        @if (!empty($getSystemSettingApp->phone))
                                            <li>
                                                <i class="icon-phone"></i>
                                                <a
                                                    href="tel:{{ $getSystemSettingApp->phone }}">{{ $getSystemSettingApp->phone }}</a>
                                            </li>
                                        @endif
                                        @if (!empty($getSystemSettingApp->phone_two))
                                            <li>
                                                <i class="icon-phone"></i>
                                                <a
                                                    href="tel:{{ $getSystemSettingApp->phone_two }}">{{ $getSystemSettingApp->phone_two }}</a>
                                            </li>
                                        @endif
                                        @if (!empty($getSystemSettingApp->email))
                                            <li>
                                                <i class="icon-envelope"></i>
                                                <a
                                                    href="mailto:{{ $getSystemSettingApp->email }}">{{ $getSystemSettingApp->email }}</a>
                                            </li>
                                        @endif
                                        @if (!empty($getSystemSettingApp->email_two))
                                            <li>
                                                <i class="icon-envelope"></i>
                                                <a
                                                    href="mailto:{{ $getSystemSettingApp->email_two }}">{{ $getSystemSettingApp->email_two }}</a>
                                            </li>
                                        @endif
                                    </ul><!-- End .contact-list -->
                                </div><!-- End .contact-info -->
                            </div><!-- End .col-sm-7 -->

                            <div class="col-sm-5">
                                <div class="contact-info">

                                    <ul class="contact-list">
                                        @if (!empty($getSystemSettingApp->working_hours))
                                            <li>
                                                <i class="icon-clock-o"></i>
                                                <span class="text-dark">
                                                    <p>{{ $getSystemSettingApp->working_hours }}</p>
                                                </span>
                                            </li>
                                        @endif

                                    </ul><!-- End .contact-list -->
                                </div><!-- End .contact-info -->
                            </div><!-- End .col-sm-5 -->
                        </div><!-- End .row -->
                    </div><!-- End .col-lg-6 -->
                    <div class="col-lg-6">
                        <h2 class="title mb-1">Виникли запитання?</h2><!-- End .title mb-2 -->
                        <p class="mb-2">Використовуйте форму нижче, щоб зв’язатися з відділом продажів</p>
                        <div style="padding: 10px 0">@include('layouts._message')</div>
                        <form action="#" class="contact-form mb-3" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cname" class="sr-only">Ім'я</label>
                                    <input type="text" class="form-control" id="cname" name ="name"
                                        placeholder="Ім'я *" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label for="cemail" class="sr-only">Електронна адреса</label>
                                    <input type="email" class="form-control" id="cemail" name ="email"
                                        placeholder="Електронна адреса *" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cphone" class="sr-only">Телефон</label>
                                    <input type="tel" name ="phone" class="form-control" id="cphone"
                                        placeholder="Телефон">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label for="csubject" class="sr-only">Тема</label>
                                    <input type="text" name="subject" class="form-control" id="csubject"
                                        placeholder="Тема" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label for="cmessage" class="sr-only">Повідомлення</label>
                            <textarea class="form-control" name="message" cols="30" rows="4" id="cmessage" required
                                placeholder="Повідомлення *"></textarea>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="verification">{{ $first_number}} + {{ $second_number}} = ?</label>
                                        <input type="text" name ="verification" class="form-control" id="verification"
                                            placeholder="Перевірочна сума">
                                    </div><!-- End .col-sm-6 -->

                                </div>

                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                <span>Відправити</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form><!-- End .contact-form -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->

            </div><!-- End .container -->
       {{--      <div id="map"></div><!-- End #map --> --}}
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
