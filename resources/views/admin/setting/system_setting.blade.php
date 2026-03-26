@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $header_title ?? 'Налаштування сайту' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mx-2">
                        <li class="breadcrumb-item"> {{ Breadcrumbs::render('admin.system_setting') }}</li>
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

<<<<<<< HEAD
                                   <x-image-upload label="Лого" name="logo" :image="$getRecord->getLogo()" />

                                   <x-image-upload label="Фавікон" name="favicon" :image="$getRecord->getFavicon()" />
                                    <div class="form-group">
                                        <label>Текст у футері</label>
                                        <textarea class="form-control" cols="30" rows="5" name="footer_description"
                                            placeholder="Короткий опис вашої діяльності">{{ $getRecord->footer_description }}</textarea>
                                    </div>

                                  <x-image-upload label="Значки оплати" name="footer_payment_icon" :image="$getRecord->getFooterPayment()" />
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
=======
                    <div class="card card-primary">
                        <form action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Вебсайт</label>
                                    <input type="text" name="website_name"
                                        value="{{ $getSetting?->website_name ?? 'Мій сайт' }}"
                                        class="form-control" placeholder="Назва сайту (інтернет магазину)">
>>>>>>> 6e38144 (export/import exel)
                                </div>

                                <x-image-upload label="Лого" name="logo" :image="$getRecord?->getLogo() ?? url('public/default-logo.png')" />
                                <x-image-upload label="Фавікон" name="favicon" :image="$getRecord?->getFavicon() ?? url('public/default-favicon.ico')" />

                                <div class="form-group">
                                    <label>Текст у футері</label>
                                    <textarea class="form-control" cols="30" rows="5" name="footer_description"
                                        placeholder="Короткий опис вашої діяльності">{{ $getRecord?->footer_description ?? '' }}</textarea>
                                </div>

                                <x-image-upload label="Значки оплати" name="footer_payment_icon" :image="$getRecord?->getFooterPayment() ?? url('public/default-payments.png')" />

                                <hr>
                                <div class="form-group">
                                    <label>Адреса</label>
                                    <textarea class="form-control" name="address" cols="30" rows="5"
                                        placeholder="Ваша фізична адреса">{{ $getRecord?->address ?? '' }}</textarea>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <label>Телефон</label>
                                    <input type="text" name="phone" value="{{ $getRecord?->phone ?? '' }}"
                                        class="form-control" placeholder="Ваш телефон">
                                </div>

                                <div class="form-group">
                                    <label>Телефон 2</label>
                                    <input type="text" name="phone_two" value="{{ $getRecord?->phone_two ?? '' }}"
                                        class="form-control" placeholder="Додатковий телефон">
                                </div>

                                <div class="form-group">
                                    <label>Надіслана контактна електронна адреса<span class="text-danger">*</span></label>
                                    <input type="text" name="submit_email" value="{{ $getRecord?->submit_email ?? '' }}"
                                        class="form-control" placeholder="Надіслана контактна електронна адреса">
                                </div>

                                <div class="form-group">
                                    <label>Електронна адреса<span class="text-danger">*</span></label>
                                    <input type="text" name="email" value="{{ $getRecord?->email ?? '' }}"
                                        class="form-control" placeholder="Електронна адреса">
                                </div>

                                <div class="form-group">
                                    <label>Електронна адреса 2</label>
                                    <input type="text" name="email_two" value="{{ $getRecord?->email_two ?? '' }}"
                                        class="form-control" placeholder="Додаткова електронна адреса">
                                </div>

                                <div class="form-group">
                                    <label>Графік роботи</label>
                                    <textarea class="form-control" name="working_hours" cols="30" rows="5"
                                        placeholder="Графік роботи">{{ $getRecord?->working_hours ?? '' }}</textarea>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" name="facebook_link" value="{{ $getRecord?->facebook_link ?? '' }}"
                                        class="form-control" placeholder="Посилання на Facebook-сторінку">
                                </div>

                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" name="instagram_link" value="{{ $getRecord?->instagram_link ?? '' }}"
                                        class="form-control" placeholder="Посилання на Instagram-сторінку">
                                </div>

                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" name="youtube_link" value="{{ $getRecord?->youtube_link ?? '' }}"
                                        class="form-control" placeholder="Посилання на Youtube-канал">
                                </div>

                                <div class="form-group">
                                    <label>TikTok</label>
                                    <input type="text" name="tiktok_link" value="{{ $getRecord?->tiktok_link ?? '' }}"
                                        class="form-control" placeholder="Посилання на відео у TikTok">
                                </div>

                            </div><!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-flat">Підтвердити</button>
                            </div>
                        </form>
                    </div><!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<<<<<<< HEAD
    <script>
        document.querySelectorAll('.custom-file-input').forEach(function(input) {

            input.addEventListener('change', function(e) {

                if (e.target.files.length > 0) {
                    let fileName = e.target.files[0].name;
                    let label = e.target.nextElementSibling;
                    label.innerText = fileName;
                }

            });

        });
    </script>
   
@endsection
=======
<script>
    document.querySelectorAll('.custom-file-input').forEach(function(input) {
        input.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                let fileName = e.target.files[0].name;
                let label = e.target.nextElementSibling;
                label.innerText = fileName;
            }
        });
    });
</script>
@endsection
>>>>>>> 6e38144 (export/import exel)
