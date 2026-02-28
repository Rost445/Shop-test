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
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('admin.smtp_setting') }}
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
                                        <label for="exampleInputName">Назва сайту<span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{ $getRecord->name }}"
                                            class="form-control" placeholder="Назва сайту" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Пошта Листоноша<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="mail_mailer" value="{{ $getRecord->mail_mailer }}"
                                            class="form-control" placeholder="Пошта Листоноша" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Поштовий хост<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_host" value="{{ $getRecord->mail_host }}"
                                            class="form-control" placeholder="Назва хосту" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Поштовий порт<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_port" value="{{ $getRecord->mail_port }}"
                                            class="form-control" placeholder="Поштовий порт" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Ім'я користувача електронної пошти<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_username" value="{{ $getRecord->mail_username  }}"
                                            class="form-control" placeholder="Ім'я користувача електронної пошти" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Пароль електронної пошти<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_password" value="{{ $getRecord->mail_password }}"
                                            class="form-control" placeholder="Пароль електронної пошти" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Шифрування електронної пошти<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_encryption" value="{{ $getRecord->mail_encryption }}"
                                            class="form-control" placeholder="Шифрування електронної пошти" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Пошта з адреси<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_from_address" value="{{ $getRecord->mail_from_address }}"
                                            class="form-control" placeholder="Пошта з адреси" required>
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
