@extends('layouts.app')
@section('style')
    <style type="text/css">
        .info-box {
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            border-radius: .75rem;
            background-color: #fff;
            display: -ms-flexbox;
            display: flex;

            min-height: 80px;
            padding: .5rem;
            position: relative;
            width: 100%;
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }

        

        .bg-info,
        .bg-info>a {
            color: #fff !important;
        }

        .info-box .info-box-content {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            line-height: 1.8;
            -ms-flex: 1;
            flex: 1;
            padding: 0 10px;
            overflow: hidden;
        }
    </style>
@endsection
@section('content')
    <main class="main">
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Панель користувача</h1>
            </div>
        </div>


        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <br />

                    <div class="row">
                        @include('user._sidebar')
                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="row mt-2">
                                    <div class="col-md-3 mb-2">
                                        <div class="info-box">
                                          
                                            <div class="info-box-content text-center ">
                                                <span class="info-box-text">Всі замовлення</span>
                                                <span class="info-box-number font-weight-bold">{{ $TotalOrder }}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="info-box">
                                          
                                            <div class="info-box-content text-center ">
                                                <span class="info-box-text">Замовлення сьогодні</span>
                                                <span class="info-box-number font-weight-bold">{{ $TotalTodayOrder }}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="info-box">
                                          
                                            <div class="info-box-content text-center ">
                                                <span class="info-box-text">Загальна сума</span>
                                                <span class="info-box-number font-weight-bold">{{ number_format($TotalAmount, 2) }}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="info-box">
                                          
                                            <div class="info-box-content text-center ">
                                                <span class="info-box-text">Оплачено сьогодні</span>
                                                <span class="info-box-number font-weight-bold">{{ $TotalTodayAmount }}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="info-box">
                                          
                                            <div class="info-box-content text-center ">
                                                <span class="info-box-text">В очікуванні</span>
                                                <span class="info-box-number font-weight-bold">{{ $TotalPending}}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="info-box">
                                          
                                            <div class="info-box-content text-center ">
                                                <span class="info-box-text">У процесі</span>
                                                <span class="info-box-number font-weight-bold">{{ $TotalInprogress }}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="info-box">
                                          
                                            <div class="info-box-content text-center ">
                                                <span class="info-box-text">Завершено</span>
                                                <span class="info-box-number font-weight-bold">{{ $TotalCompleted }}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="info-box">
                                          
                                            <div class="info-box-content text-center ">
                                                <span class="info-box-text">Скасовано</span>
                                                <span class="info-box-number font-weight-bold">{{ $TotalCancelled }}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection

@section('script')
@endsection
