@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $header_title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right mx-2">
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('admin.system_setting') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.layouts._message')
                        <div class="card card-primary">

                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName">Вебсайт</label>
                                        <input type="text" name="website_name" value="{{ $getRecord->website_name }}"
                                            class="form-control" placeholder="Назва сайту (інтернет магазину)">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Лого</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="logo" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Виберіть
                                                    файл</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Завантажити</span>
                                            </div>
                                        </div>
                                        @if (!@empty($getRecord->getLogo()))
                                            <img src="{{ $getRecord->getLogo() }}" class="img-thumbnail"
                                                style="width: 200px; margin-top:10px" alt="">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Фавікон</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="favicon" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Виберіть
                                                    файл</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Завантажити</span>
                                            </div>
                                        </div>
                                        @if (!@empty($getRecord->getFavicon()))
                                            <img src="{{ $getRecord->getFavicon() }}" class="img-thumbnail"
                                                style="width: 50px; margin-top:10px" alt="">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Текст у футері</label>
                                        <textarea class="form-control" cols="30" rows="5" name="footer_description"
                                            placeholder="Короткий опис вашої діяльності">{{ $getRecord->footer_description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Значки оплати</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="footer_payment_icon" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Виберіть
                                                    файл</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Завантажити</span>
                                            </div>
                                        </div>
                                        @if (!@empty($getRecord->getFooterPayment()))
                                            <img src="{{ $getRecord->getFooterPayment() }}" class="img-thumbnail"
                                                style="width: 200px; margin-top:10px" alt="">
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="exampleInputName">Адреса</label>
                                        <textarea class="form-control" name="address" cols="30" rows="5" placeholder="Ваша фізична адреса">{{ $getRecord->address }}</textarea>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="exampleInputName">Телефон</label>
                                        <input type="text" name="phone" value="{{ $getRecord->phone }}"
                                            class="form-control" placeholder="Ваш телефон">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Телефон 2</label>
                                        <input type="text" name="phone_two" value="{{ $getRecord->phone_two }}"
                                            class="form-control" placeholder="Додатковий телефон">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Надіслана контактна електронна адреса<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="submit_email" value="{{ $getRecord->submit_email }}"
                                            class="form-control" placeholder="Надіслана контактна електронна адреса">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Електронна адреса<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="email" value="{{ $getRecord->email }}"
                                            class="form-control" placeholder="Електронна адреса">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Електронна адреса 2</label>
                                        <input type="text" name="email_two" value="{{ $getRecord->email_two }}"
                                            class="form-control" placeholder="Додаткова електронна адреса">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Графік роботи</label>
                                        <textarea class="form-control" name="working_hours" cols="30" rows="5" placeholder="Графік роботи">{{ $getRecord->working_hours }}</textarea>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="exampleInputName">Facebook</label>
                                        <input type="text" name="facebook_link"
                                            value="{{ $getRecord->facebook_link }}" class="form-control"
                                            placeholder="Посилання на Facebook-сторінку">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Instagram</label>
                                        <input type="text" name="instagram_link"
                                            value="{{ $getRecord->instagram_link }}" class="form-control""
                                            placeholder="Посилання на Instagram-сторінку">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Youtube</label>
                                        <input type="text" name="youtube_link" value="{{ $getRecord->youtube_link }}"
                                            class="form-control" placeholder="Посилання на Youtube-канал">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">TikTok</label>
                                        <input type="text" name="tiktok_link"
                                            value="{{ $getRecord->tiktok_link }}"class="form-control"
                                            placeholder="Посилання на відео у TikTok">
                                    </div>
                                </div><!--.end-card-body-->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-flat">Підтвердити</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection



@section('script')
@endsection
