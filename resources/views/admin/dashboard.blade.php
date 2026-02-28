@extends('admin.layouts.app')
@section('style')
<style>
    
    .table thead th,.table td{
        margin: auto !important;
        vertical-align: middle;
        text-align: center;

    }
</style>
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $header_title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right mx-2">
                          <li class="breadcrumb-item">{{-- {{ Breadcrumbs::render('dashboard') }} --}}</li>
                         
                        </ol>
                      </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="nav-icon fas fa-list-alt"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Всі замовлення  </span>
                        <span class="info-box-number">{{ $TotalOrder }} <a class=" pl-3 text-secondary font-weight-lighter " href="{{ url('admin/orders/list')}}">Перейти <i class="ion-arrow-right-c"></i></a></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="nav-icon fas fa-list-alt"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"> Замовлення сьогодні</span>
                        <span class="info-box-number">{{ $TotalTodayOrder }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Загальна сума</span>
                        <span class="info-box-number">{{ number_format($TotalAmount, 2) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success bg-gradient elevation-1"><i class="fas fa-hryvnia"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Оплачено сьогодні</span>
                        <span class="info-box-number">{{ number_format($TotalTodayAmount, 2) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary bg-gradient elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Всі замовники</span>
                        <span class="info-box-number">{{ $TotalCustomer }} <a class=" pl-3 text-secondary font-weight-lighter " href="{{ url('admin/customer/list')}}">Перейти <i class="ion-arrow-right-c"></i></a></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary bg-gradient elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Покупців сьогодні</span>
                        <span class="info-box-number">{{ $TotalTodayCustomer }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Продажі</h3>
                                   <select class="form-control ChangeYear" style="width: 100px;">
                                    @for($i=2022; $i<=date('Y'); $i++)
                                    <option {{ ($year == $i) ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                   </select>
                                  
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">{{ number_format($TotalAmount, 2)}} грн</span>
                                        <span>Продажі за весь час</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->

                                <div class="position-relative mb-4">
                                    <canvas id="sales-chart-order" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> Покупець
                                    </span>

                                    <span  class="mr-2">
                                        <i class="fas fa-square text-gray"></i> Замовлення
                                    </span>
                                    <span  class="mr-2">
                                 
                                        <i class="fas fa-square text-danger"></i> Сума
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Останні замовлення</h3>
                            </div>


                            <div class="table-responsive table-bordered">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Номер замовлення</th>
                                            <th>Ім'я </th>
                                            <th>Прізвище </th>
                                           {{--  <th>Назва<br> Компанії </th> --}}
                                            <th>Телефон</th>
                                            <th>Електронна<br> Пошта</th>
                                            <th>Адреса<br> Доставки</th>
                                            {{-- <th>Сума<br> Доставки (грн)</th>
                                            <th>Код<br> Знижки</th>
                                            <th>Сума<br> Знижки (грн)</th> --}}
                                            <th>Загальна<br> Сума (грн)</th>
                                            <th>Спосіб<br>Оплати</th>
                                            {{-- <th>Платіжні Дані</th> --}}
                                            <th>Статус</th>
                                            <th>Створено</th>
                                            <th>Дія</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getLatestOrders as $value)
                                            <tr class="text-center">
                                                <td>{{ $value->id }} </td>
                                                <td>{{ $value->order_number }} </td>
                                                <td>{{ $value->first_name }} </td>
                                                <td>{{ $value->last_name }} </td>
                                              {{--   <td>{{ $value->company_name }} </td> --}}
                                                <td>{{ $value->phone }} </td>
                                                <td>{{ $value->email }} </td>
                                                <td>{{ $value->delivery_address }}
                                                </td>
                                               {{--  <td>
                                                    {{ number_format($value->shipping_amount, 2) }} </td>
                                                @if (!empty($value->discount_code))
                                                    <td>{{ $value->discount_code }}
                                                    </td>
                                                @else
                                                    <td> <span
                                                            class="text-secondary font-weight-bold"> — </span> </td>
                                                @endif --}}
                                               {{--  <td>
                                                    {{ number_format($value->discount_amount, 2) }} </td> --}}
                                                <td>
                                                    {{ number_format($value->total_amount, 2) }} </td>
                                                <td>{{ $value->payment_method }} </td>

                                                <td>
                                                    <select class="form-control ChangeStatus" id="{{ $value->id }}"
                                                        style="width: 120px">
                                                        <option {{ $value->status == 0 ? 'selected' : '' }}
                                                            value = "0">В очікуванні</option>
                                                        <option {{ $value->status == 1 ? 'selected' : '' }}
                                                            value = "1">У процесі</option>
                                                        <option {{ $value->status == 2 ? 'selected' : '' }}
                                                            value = "2">Доставлено</option>
                                                        <option {{ $value->status == 3 ? 'selected' : '' }}
                                                            value = "3">Завершено</option>
                                                        <option {{ $value->status == 4 ? 'selected' : '' }}
                                                            value = "4">Скасовано</option>

                                                    </select>
                                                </td>
                                                <td>
                                                    {{ date('d-m-Y G:i:s', strtotime($value->created_at)) }}</td>

                                                <td> <a
                                                        href="{{ url('admin/orders/detail/' . $value->id) }}"
                                                        class="btn  btn-primary btn-flat" title="Переглянути"><i class="fas fa-eye"></i></a></td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <!-- /.card -->
                    </div>


                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script src="{{ url('public/assets/dist/js/pages/dashboard3.js') }}"></script>

    <script type="text/javascript">

    $('.ChangeYear').change(function(){
        var year = $(this).val();
        window.location.href = "{{ url('admin/dashboard?year=') }}"+year;
    });
    
    var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart-order')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: [{{ $getTotalCustomerMonth }}]
        },
        {
          backgroundColor: '##ced4da',
          borderColor: '##ced4da',
          data: [{{ $getTotalOrderMonth }}]
        },
        {
          backgroundColor: '#dc3545',
          borderColor: '#dc3545',
          data: [{{ $getTotalOrderAmountMonth }}]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return  value + ' ₴ ' 
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })
    
    </script>
     <script type="text/javascript">
  
        $('body').delegate('.ChangeStatus', 'change', function() {
            var status = $(this).val();
            var order_id = $(this).attr('id');
            $.ajax({
                type: "GET",
                url: "{{ url('admin/order_status') }}",
                data: {
                    status: status,
                    order_id: order_id
                },
                dataType: "json",
                success: function(data) {
                    alert(data.message);
                }
            });
        });
    </script>
@endsection
