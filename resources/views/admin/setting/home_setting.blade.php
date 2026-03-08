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
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('admin.home_setting') }}
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
                                        <label for="exampleInputName">Трендові продукти <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="trendy_product_title"
                                            value="{{ $getRecord->trendy_product_title }}" class="form-control"
                                            placeholder="Трендові продукти" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Купуйте за категоріями <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="shop_category_title"
                                            value="{{ $getRecord->shop_category_title }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Останні надходження <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="recent_arival_title"
                                            value="{{ $getRecord->recent_arival_title }}" class="form-control" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="exampleInputName">Назва блогу <span class="text-danger">*</span></label>
                                        <input type="text" name="blog_title" value="{{ $getRecord->blog_title }}"
                                            class="form-control" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="exampleInputName">Заголовок Оплата та Доставка <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="payment_delivery_title"
                                            value="{{ $getRecord->payment_delivery_title }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Опис Оплата та Доставка <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="payment_delivery_description"
                                            value="{{ $getRecord->payment_delivery_description }}" class="form-control"
                                            required>
                                    </div>
                                    <x-image-upload label="Зображення Оплата та Доставка" name="payment_delivery_image"
                                        :image="$getRecord->getPaymentImage()" />



                                    <hr>
                                    <div class="form-group">
                                        <label for="exampleInputName">Заголовок Повернення та відшкодування <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="refind_delivery_title"
                                            value="{{ $getRecord->refind_delivery_title }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Опис Повернення та відшкодування <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="refind_description"
                                            value="{{ $getRecord->refind_description }}" class="form-control" required>
                                    </div>
                                    <x-image-upload label="Зображення Повернення та відшкодування" name="refind_image"
                                        :image="$getRecord->getRefindImage()" />

                                    <hr>
                                    <div class="form-group">
                                        <label for="exampleInputName">Заголовок Підтримка якості <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="support_title" value="{{ $getRecord->support_title }}"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Опис Підтримка якості <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="support_description"
                                            value="{{ $getRecord->support_description }}" class="form-control" required>
                                    </div>
                                    <x-image-upload label="Зображення Підтримка якості" name="support_image"
                                        :image="$getRecord->getSupportImage()" />


                                    <hr>
                                    <div class="form-group">
                                        <label for="exampleInputName">Заголовок Зареєструйтесь <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="signup_title" value="{{ $getRecord->signup_title }}"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Опис Зареєструйтесь <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="signup_description"
                                            value="{{ $getRecord->signup_description }}" class="form-control" required>
                                    </div>
                                    <x-image-upload label="Зображення Зареєструйтесь " name="signup_image"
                                        :image="$getRecord->getSignupImage()" />


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
