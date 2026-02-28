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
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('admin.card_setting') }}
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
                                        <label for="exampleInputName">Номер карти<span class="text-danger">*</span></label>
                                        <input type="text" name="card_number" value="{{  $getRecord ? $getRecord->card_number : '' }}"
                                            class="form-control" placeholder="Номер карти" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Ім'я власника карти<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name_owner" value="{{  $getRecord ? $getRecord->name_owner : '' }}"
                                            class="form-control" placeholder="Ім'я власника карти" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Призвище власника карти<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="surname" value="{{ $getRecord ? $getRecord->surname : '' }}"
                                            class="form-control" placeholder="Призвище власника карти" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Назва банку<span class="text-danger">*</span></label>
                                        <input type="text" name="bank" value="{{ $getRecord ? $getRecord->bank : '' }}"
                                            class="form-control" placeholder="Назва банку" required>
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
