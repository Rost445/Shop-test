@extends('layouts.app')
@section('style')
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Замовлення</h1>
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
                                <div class="table-responsive">
                                    <table class="table table-striped text-center">
                                        <thead>
                                            <tr>

                                                <th style="vertical-align: middle">№ замовлення</th>
                                                <th style="vertical-align: middle">Загальна<br> Сума (грн)</th>
                                                <th style="vertical-align: middle">Спосіб<br>Оплати</th>
                                                <th style="vertical-align: middle">Статус</th>
                                                <th style="vertical-align: middle">Створено</th>
                                                <th style="vertical-align: middle">Дія</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getRecord as $value)
                                                <tr class="text-center">

                                                    <td style="vertical-align: middle">{{ $value->order_number }} </td>
                                                    <td style="vertical-align: middle">
                                                        {{ number_format($value->total_amount, 2) }} </td>
                                                    <td style="vertical-align: middle">{{ $value->payment_method }} </td>

                                                    <td style="vertical-align: middle">
                                                        @if ($value->status == 0)
                                                            <span class="mx-3">В очікуванні</span>
                                                        @elseif($value->status == 1)
                                                            <span class="mx-3">У процесі</span>
                                                        @elseif($value->status == 2)
                                                            <span class="mx-3">Доставлено</span>
                                                        @elseif($value->status == 3)
                                                            <span class="mx-3">Завершено</span>
                                                        @elseif($value->status == 4)
                                                            <span class="mx-3">Скасовано</span>
                                                        @endif
                                                    </td>
                                                    <td style="vertical-align: middle">
                                                        {{ date('d-m-Y G:i:s', strtotime($value->created_at)) }}</td>

                                                    <td style="vertical-align: middle"> <a
                                                            href="{{ url('user/orders/detail/' . $value->id) }}"
                                                            class="btn btn-sm btn-primary mx-5">Деталі</a></td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div style="padding: 10px; float: right;">
                                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
