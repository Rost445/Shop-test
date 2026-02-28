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
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Список замовлень ( Всього : {{ $getRecord->total() }} )</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right mx-2 mx-2mx-2">
                          <li class="breadcrumb-item">{{ Breadcrumbs::render('orders.list') }}</li>
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
                        <form action="" method="get">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Пошук замовлень</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="">ID</label>
                                                <input type="text" name="id" class="form-control"
                                                    value="{{ Request::get('id') }}" placeholder="ID">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Ім'я</label>
                                                <input type="text" name="first_name" class="form-control"
                                                    value="{{ Request::get('first_name') }}" placeholder="Ім'я">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Призвище</label>
                                                <input type="text" name="last_name" class="form-control"
                                                    value="{{ Request::get('last_name') }}" placeholder="Призвище">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Телефон</label>
                                                <input type="text" name="phone" class="form-control"
                                                    value="{{ Request::get('phone') }}" placeholder="Телефон">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Електронна пошта</label>
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ Request::get('email') }}" placeholder="Електронна пошта">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">По даті (від)</label>
                                                <input style="padding: 6px" type="date" name="from_date"
                                                    class="form-control" value="{{ Request::get('from_date') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">По даті (до)</label>
                                                <input style="padding: 6px" type="date" name="to_date"
                                                    class="form-control" value="{{ Request::get('to_date') }}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-flat"><i class="fas fa-search"></i> Пошук</button>
                                            <a name="" id="" class="btn btn-danger btn-flat"
                                                href="{{ url('admin/orders/list') }}"role="button"><i class="fas fa-redo-alt"></i> Скинути</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список замовлень</h3>
                            </div>
                            <div class="card-body p-0 overflow-auto">
                                <div class="table-responsive table-bordered">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Номер замовлення</th>
                                                <th>Ім'я </th>
                                                <th>Прізвище </th>
                                              {{--   <th>Назва<br> Компанії </th> --}}
                                                <th>Телефон</th>
                                                <th>Електронна<br> Пошта</th>
                                                <th>Адреса<br> Доставки</th>
                                                <th>Сума<br> Доставки (грн)</th>
                                                <th>Код<br> Знижки</th>
                                                <th>Сума<br> Знижки (грн)</th>
                                                <th>Загальна<br> Сума (грн)</th>
                                                <th>Спосіб<br>Оплати</th>
                                                {{-- <th>Платіжні Дані</th> --}}
                                                <th>Статус</th>
                                                <th>Створено</th>
                                                <th>Дія</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getRecord as $value)
                                                <tr class="text-center">
                                                    <td>{{ $value->id }} </td>
                                                    <td>{{ $value->order_number }} </td>
                                                    <td>{{ $value->first_name }} </td>
                                                    <td>{{ $value->last_name }} </td>
                                                    <td>{{ $value->phone }} </td>
                                                    <td>{{ $value->email }} </td>
                                                    <td>{{ $value->delivery_address }}
                                                    </td>
                                                    <td>
                                                        {{ number_format($value->shipping_amount, 2) }} </td>
                                                    @if (!empty($value->discount_code))
                                                        <td>{{ $value->discount_code }}
                                                        </td>
                                                    @else
                                                        <td> <span
                                                                class="text-secondary font-weight-bold"> — </span> </td>
                                                    @endif
                                                    <td>
                                                        {{ number_format($value->discount_amount, 2) }} </td>
                                                    <td>
                                                        {{ number_format($value->total_amount, 2) }} </td>
                                                    <td>{{ $value->payment_method }} </td>

                                                    <td>
                                                        <select class="form-control ChangeStatus"
                                                            id="{{ $value->id }}" style="width: 120px">
                                                            <option {{ ($value->status == 0) ? 'selected' : '' }}
                                                                value = "0">В очікуванні</option>
                                                            <option {{ ($value->status == 1) ? 'selected' : '' }}
                                                                value = "1">У процесі</option>
                                                            <option {{ ($value->status == 2) ? 'selected' : '' }}
                                                                value = "2">Доставлено</option>
                                                            <option {{ ($value->status == 3) ? 'selected' : '' }}
                                                                value = "3">Завершено</option>
                                                            <option {{ ($value->status == 4) ? 'selected' : '' }}
                                                                value = "4">Скасовано</option>

                                                        </select>
                                                    </td>
                                                    <td>
                                                        {{ date('d-m-Y G:i:s', strtotime($value->created_at)) }}</td>

                                                    <td> <a
                                                            href="{{ url('admin/orders/detail/' . $value->id) }}"
                                                            class="btn  btn-primary btn-flat"><i class="fas fa-eye"></i></a></td>

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
        </section>
    </div>
@endsection



@section('script')
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
