@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Замовлення #{{ $getRecord->id }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right mx-2 mx-2mx-2">
                          <li class="breadcrumb-item">{{ Breadcrumbs::render('orders.detail') }}</li>
                        </ol>
                      </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card px-3">
                            <div class="card-header">
                                <h3 class="card-title text-primary py-3">Деталі замовлення</h3>  
                                <div class="card-tools mt-2">
                                  <span class="align-middle"><a href="{{ url('admin/generate-pdf/'.$getRecord->id) }}" class="btn bg-maroon margin btn-flat  float-right"><i class="fas fa-file-pdf"></i> Завантажити PDF </a> 

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0 pb-3">
                                <table class="table table-striped text-nowrap">

                                    <tbody>
                                        <tr>
                                            <th style="vertical-align: middle">ID</th>
                                            <td style="vertical-align: middle">{{ $getRecord->id }} </td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle">Номер замовлення</th>
                                            <td style="vertical-align: middle">{{ $getRecord->order_number }} </td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle">Ім'я </th>
                                            <td style="vertical-align: middle">{{ $getRecord->first_name }} </td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle">Прізвище </th>
                                            <td style="vertical-align: middle">{{ $getRecord->last_name }} </td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle">Назва Компанії </th>
                                            @if(!empty($getRecord->company_name))
                                            <td style="vertical-align: middle">{{ $getRecord->company_name }} </td>
                                            @else
                                            <td style="vertical-align: middle"> — </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle" >Телефон</th>
                                            <td style="vertical-align: middle"class="font-weight-bold">{{ $getRecord->phone }} </td>


                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle">Електронна Пошта</td>
                                            <td style="vertical-align: middle">{{ $getRecord->email }} </td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle">Адреса Доставки</td>
                                            <td style="vertical-align: middle">{{ $getRecord->delivery_address }} </td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle">Назва доставки</td>
                                            <td style="vertical-align: middle">
                                                @if(!empty($getRecord->getShipping->name))
                                                {{ $getRecord->getShipping->name }}
                                                @endif
                                             </td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle">Сума Доставки (грн)</td>
                                            <td style="vertical-align: middle">
                                                {{ number_format($getRecord->shipping_amount, 2) }} </td>
                                        </tr>
                                        </tr>
                                         <tr>
                                            <th style="vertical-align: middle">Код Знижки</td>
                                                @if(!empty($getRecord->discount_code))
                                            <td style="vertical-align: middle">{{ $getRecord->discount_code }} </td>
                                                @else
                                                <td style="vertical-align: middle"> — </td>
                                                @endif

                                        </tr> 

                                        <tr>
                                            <th style="vertical-align: middle">Сума Знижки (грн)</td>
                                            <td style="vertical-align: middle">
                                                {{ number_format($getRecord->discount_amount, 2) }} </td>
                                        </tr> 

                                        <tr>
                                            <th style="vertical-align: middle">Загальна Сума (грн)</td>
                                            <td style="vertical-align: middle" class="font-weight-bold">
                                                {{ number_format($getRecord->total_amount, 2) }} </td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle">Спосіб Оплати</td>
                                            <td style="vertical-align: middle" class=" font-weight-bold">{{ $getRecord->payment_method }} </td>
                                        </tr>

                                        <tr>
                                            <th style="vertical-align: middle">Нотатки</th>
                                            @if(!empty($getRecord->note))
                                            <td style="vertical-align: middle">{{ $getRecord->note }} </td>
                                            @else
                                            <td style="vertical-align: middle"> — </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle">Статус</th>
                                            <td style="vertical-align: middle" class="font-weight-bold">
                                                {{ $getRecord->status == 0 ? 'Активний' : 'Неактивний' }}</td>
                                        </tr>

                                        <tr>
                                            <th style="vertical-align: middle">Створено</th>
                                            <td style="vertical-align: middle">
                                                {{ date('d-m-Y G:i:s', strtotime($getRecord->created_at)) }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        @include('admin.layouts._message')

                        <div class="card px-3">
                            <div class="card-header">
                                <h3 class="card-title text-primary py-3">Список продукції у замовленні</h3>
                            </div>
                            <div class="card-body p-0 overflow-auto">
                                <div class="table-responsive table-bordered">
                                    <table class="table table-striped text-center">
                                        <thead>
                                            <tr>

                                                <th style="vertical-align: middle">Зображення</th>
                                                <th style="vertical-align: middle">Назва продукції</th>
                                                <th style="vertical-align: middle">Кількість</th>
                                                <th style="vertical-align: middle">Ціна (грн)</th>
                                                <th style="vertical-align: middle">Розмір</th>
                                                <th style="vertical-align: middle">Колір</th>
                                                <th style="vertical-align: middle">Сума розміру (грн)</th>
                                                <th style="vertical-align: middle">Загальна сума (грн)</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getRecord->getItem as $item)
                                                @php
                                                    $getProductImage = $item->getProduct->getImageSingle(
                                                        $item->getProduct->id,
                                                    );
                                                @endphp
                                                <tr >
                                                    <td  style="vertical-align: middle"><img src="{{ $getProductImage->getLogo() }}" height="100"></td>
                                                    <td  style="vertical-align: middle">
                                                        <a href="{{ url( $item->getProduct->slug) }}" target="_blank" >{{ $item->getProduct->title }}</a>
                                                    </td>
                                                    <td  style="vertical-align: middle">{{ $item->quantity }}</td>
                                                    <td  style="vertical-align: middle">{{ number_format($item->price, 2) }}</td>
                                                    <td  style="vertical-align: middle">{{ $item->size_name }}</td>
                                                    <td  style="vertical-align: middle">{{ $item->color_name }}</td>
                                                    <td  style="vertical-align: middle">{{ number_format($item->size_amount, 2) }}</td>
                                                    <td  style="vertical-align: middle">{{ number_format($item->total_price, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection



@section('script')
@endsection
