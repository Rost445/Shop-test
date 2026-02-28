@extends('layouts.app')
@section('style')
@endsection
@section('content')
    <main class="main">
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Редагувати профіль</h1>
            </div>
        </div>


        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                   
                    <br />
                     @include('layouts._message')
                     
                    <form action="" method="post">
                        {{ csrf_field() }}
                    <div class="row">
                        @include('user._sidebar')
                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Ваше ім'я <span class="text-secondary">*</span></label>
                                        <input type="text" name="first_name" class="form-control" value="{{ $getRecord->name}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Ваше призвище <span class="text-secondary">*</span></label>
                                        <input type="text" name="last_name" class="form-control" value="{{ $getRecord->last_name}}">
                                    </div>
                                </div>
                                <label>Назва компанії (Опціонально)</label>
                                <input type="text" name="company_name" class="form-control" value="{{ $getRecord->company_name}}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Телефон <span class="text-secondary">*</span></label>
                                        <input type="tel" name="phone" class="form-control" value="{{ $getRecord->phone}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Електронна адреса<span class="text-secondary"> <span
                                                    class="text-secondary">*</span></span></label>
                                        <input type="email" name="email" class="form-control" value="{{ $getRecord->email}}" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Адреса доставки <span class="text-secondary">*</span></label>
                                        <input type="text" name="delivery_address" class="form-control"
                                            placeholder="Місто, вулиця, назва перевізника та № відділення." value="{{ $getRecord->delivery_address}}">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-outline-primary-2 btn-order">
                                        Підтвердити
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
@endsection
