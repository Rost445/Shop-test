@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h1>Замовлення #{{ $getRecord->id ?? '' }}</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right mx-2">
                            <li class="breadcrumb-item">
                                {{ Breadcrumbs::render('orders.detail') }}
                            </li>
                        </ol>
                    </div>

                </div>
            </div>
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    @if (!empty($getRecord))
                        <div class="col-md-12">

                            <div class="card px-3">

                                <div class="card-header">

                                    <h3 class="card-title text-primary py-3">Деталі замовлення</h3>

                                    <div class="card-tools mt-2">

                                        <span class="align-middle">

                                            <a href="{{ url('admin/generate-pdf/' . $getRecord->id) }}"
                                                class="btn bg-maroon margin btn-flat float-right">

                                                <i class="fas fa-file-pdf"></i>
                                                Завантажити PDF

                                            </a>

                                        </span>

                                    </div>
                                </div>


                                <div class="card-body table-responsive p-0 pb-3">

                                    <table class="table table-striped text-nowrap">

                                        <tbody>

                                            <tr>
                                                <th>ID</th>
                                                <td>{{ $getRecord->id ?? '' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Номер замовлення</th>
                                                <td>{{ $getRecord->order_number ?? '' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Ім'я</th>
                                                <td>{{ $getRecord->first_name ?? '' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Прізвище</th>
                                                <td>{{ $getRecord->last_name ?? '' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Назва Компанії</th>
                                                <td>{{ $getRecord->company_name ?? '—' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Телефон</th>
                                                <td class="font-weight-bold">{{ $getRecord->phone ?? '' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Електронна Пошта</th>
                                                <td>{{ $getRecord->email ?? '' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Адреса Доставки</th>
                                                <td>{{ $getRecord->delivery_address ?? '' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Назва доставки</th>
                                                <td>
                                                    {{ $getRecord->getShipping->name ?? '' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Сума Доставки (грн)</th>
                                                <td>
                                                    {{ number_format($getRecord->shipping_amount ?? 0, 2) }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Код Знижки</th>
                                                <td>{{ $getRecord->discount_code ?? '—' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Сума Знижки (грн)</th>
                                                <td>
                                                    {{ number_format($getRecord->discount_amount ?? 0, 2) }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Загальна Сума (грн)</th>
                                                <td class="font-weight-bold">
                                                    {{ number_format($getRecord->total_amount ?? 0, 2) }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Спосіб Оплати</th>
                                                <td class="font-weight-bold">
                                                    {{ $getRecord->payment_method ?? '' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Нотатки</th>
                                                <td>{{ $getRecord->note ?? '—' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Статус</th>
                                                <td class="font-weight-bold">

                                                    @if (($getRecord->status ?? 0) == 0)
                                                        <span class="badge badge-success">Активний</span>
                                                    @else
                                                        <span class="badge badge-danger">Неактивний</span>
                                                    @endif

                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Створено</th>
                                                <td>
                                                    {{ $getRecord->created_at ? $getRecord->created_at->format('d-m-Y H:i:s') : '' }}
                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>

                                </div>
                            </div>

                        </div>



                        <div class="col-md-12">

                            @include('admin.layouts._message')

                            <div class="card px-3">

                                <div class="card-header">
                                    <h3 class="card-title text-primary py-3">
                                        Список продукції у замовленні
                                    </h3>
                                </div>

                                <div class="card-body p-0 overflow-auto">

                                    <div class="table-responsive table-bordered">

                                        <table class="table table-striped text-center">

                                            <thead>

                                                <tr>

                                                    <th>Зображення</th>
                                                    <th>Назва продукції</th>
                                                    <th>Кількість</th>
                                                    <th>Ціна (грн)</th>
                                                    <th>Розмір</th>
                                                    <th>Колір</th>
                                                    <th>Сума розміру (грн)</th>
                                                    <th>Загальна сума (грн)</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                @foreach ($getRecord->getItem ?? [] as $item)
                                                    @php
                                                        $getProductImage = $item->getProduct?->getImageSingle(
                                                            $item->getProduct->id ?? 0,
                                                        );
                                                    @endphp

                                                    <tr>

                                                        <td>

                                                            @if ($getProductImage)
                                                                <img src="{{ $getProductImage->getLogo() }}"
                                                                    height="100">
                                                            @endif

                                                        </td>

                                                        <td>

                                                            @if (!empty($item->getProduct))
                                                                <a href="{{ url($item->getProduct->slug) }}"
                                                                    target="_blank">
                                                                    {{ $item->getProduct->title }}
                                                                </a>
                                                            @endif

                                                        </td>

                                                        <td>{{ $item->quantity ?? 0 }}</td>

                                                        <td>{{ number_format($item->price ?? 0, 2) }}</td>

                                                        <td>{{ $item->size_name ?? '' }}</td>

                                                        <td>{{ $item->color_name ?? '' }}</td>

                                                        <td>{{ number_format($item->size_amount ?? 0, 2) }}</td>

                                                        <td>{{ number_format($item->total_price ?? 0, 2) }}</td>

                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>
                    @else
                        <div class="col-md-12">

                            <div class="alert alert-danger">
                                Замовлення не знайдено
                            </div>

                        </div>
                    @endif

                </div>
            </div>
        </section>

    </div>

@endsection


@section('script')
@endsection
