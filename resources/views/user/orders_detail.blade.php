@extends('layouts.app')
@section('style')
    <style type="text/css">
        .form-group {
            margin-bottom: 2px;

        }
    </style>
@endsection

@section('content')
    <main class="main">
        
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Деталі Замовлення</h1>
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
                                @include('layouts._message')
                                <div class="form-group">
                                    <label>ID : <span style="font-weight: normal;">
                                            {{ $getRecord->id }} </span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>№ замовлення : <span style="font-weight: normal;">
                                            {{ $getRecord->order_number }} </span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Ім'я : <span style="font-weight: normal;">
                                            {{ $getRecord->first_name }} </span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Прізвище : <span style="font-weight: normal;">
                                            {{ $getRecord->last_name }} </span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Назва Компанії : <span style="font-weight: normal;">
                                            {{ $getRecord->company_name }} </span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Телефон : <span style="font-weight: normal;">{{ $getRecord->phone }}
                                        </span></label>
                                </div>
                                <div class="form-group">
                                    <label>Електронна Пошта : <span style="font-weight: normal;">{{ $getRecord->email }}
                                        </span></label>
                                </div>
                                <div class="form-group">
                                    <label>Адреса Доставки : <span
                                            style="font-weight: normal;">{{ $getRecord->delivery_address }}
                                        </span></label>
                                </div>
                                <div class="form-group">
                                    <label>Назва доставки : <span style="font-weight: normal;">
                                            {{ $getRecord->getShipping->name }} </span></label>
                                </div>
                                <div class="form-group">
                                    <label>Сума Доставки (грн) : <span style="font-weight: normal;">
                                            {{ number_format($getRecord->shipping_amount, 2) }} </span></label>
                                </div>
                                <div class="form-group">
                                    <label>Сума Знижки (грн) : <span style="font-weight: normal;">
                                            {{ number_format($getRecord->discount_amount, 2) }} </span></label>
                                </div>
                                <div class="form-group">
                                    <label>Загальна Сума (грн) : <span style="font-weight: normal;">
                                            {{ number_format($getRecord->total_amount, 2) }} </span></label>
                                </div>
                                <div class="form-group">
                                    <label>Спосіб Оплати : <span
                                            style="font-weight: normal;">{{ $getRecord->payment_method }}
                                        </span></label>

                                </div>
                                <div class="form-group">
                                    <label>Нотатки :
                                        <span style="font-weight: normal;">{{ $getRecord->note }} </span></label>
                                </div>
                                <div class="form-group"> <label>Статус :

                                        @if ($getRecord->status == 0)
                                            <span class="font-weight-bold">В очікуванні</span>
                                        @elseif($getRecord->status == 1)
                                            <span class="font-weight-bold">У процесі</span>
                                        @elseif($getRecord->status == 2)
                                            <span class="font-weight-bold">Доставлено</span>
                                        @elseif($getRecord->status == 3)
                                            <span class="font-weight-bold">Завершено</span>
                                        @elseif($getRecord->status == 4)
                                            <span class="font-weight-bold">Скасовано</span>
                                        @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Створено : <span style="font-weight: normal;">
                                            {{ date('d-m-Y G:i:s', strtotime($getRecord->created_at)) }}</span></label>
                                </div>

                                <div class="card px-3">
                                    <div class="card-header " style="margin-top:  20px">
                                        <span class="h5 text-black pt-3">Продукція у замовленні</span>
                                    </div>
                                    <div class="card-body p-0 overflow-auto">
                                        <div class="table-responsive">
                                            <table class="table table-striped text-center align-middle ">
                                                <thead>
                                                    <tr>
                                                        <th style="vertical-align: middle" class="px-3">Зображення</th>
                                                        <th style="vertical-align: middle" class="px-3">Назва продукції
                                                        </th>
                                                        <th style="vertical-align: middle" class="px-3">Кількість</th>
                                                        <th style="vertical-align: middle" class="px-3">Ціна (₴)</th>

                                                        <th style="vertical-align: middle" class="px-3">Сума розміру (₴)
                                                        </th>
                                                        <th style="vertical-align: middle" class="px-3">Загальна сума (₴)
                                                        </th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($getRecord->getItem as $item)
                                                        @php
                                                            $getProductImage = $item->getProduct->getImageSingle(
                                                                $item->getProduct->id,
                                                            );
                                                        @endphp
                                                        <tr>
                                                            <td style="vertical-align: middle ">
                                                                <div class="mx-5"
                                                                    style=" width: 100px; height: 100px; overflow: hidden;">
                                                                    <img src="{{ $getProductImage->getLogo() }}"
                                                                        style=" min-height: 100px; min-width: 100px; vertical-align: middle;">
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                <a href="{{ url($item->getProduct->slug) }}"
                                                                    target="_blank">{{ $item->getProduct->title }}</a>
                                                                <br>
                                                                @if (!empty($item->size_name))
                                                                <span class="font-weight-bold">Розмір : </span>{{ $item->size_name }} <br>
                                                                @endif

                                                                @if (!empty($item->color_name))
                                                                <span class="font-weight-bold">Колір : </span>{{ $item->color_name }}
                                                                @endif
                                                                <br>
                                                                @if ($getRecord->status == 3)
                                                                    @php
                                                                        $getReview = $item->getReview(
                                                                            $item->getProduct->id,
                                                                            $getRecord->id,
                                                                        );
                                                                    @endphp

                                                                    @if (!empty($getReview))
                                                                    <span class="font-weight-bold">Рейтинг :</span> {{ $getReview->rating }} <br>
                                                                    <span class="font-weight-bold"> Відгук :</span>{{Illuminate\Support\Str::limit(strip_tags($getReview->review),20)}}  <br>
                                                                    @else
                                                                        <button class="btn btn-primary my-2 MakeReview"
                                                                            id="{{ $item->getProduct->id }}"
                                                                            data-order="{{ $getRecord->id }}">Залишити
                                                                            відгук</button>
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td style="vertical-align: middle">{{ $item->quantity }}</td>
                                                            <td style="vertical-align: middle">
                                                                {{ number_format($item->price, 2) }} </td>

                                                            <td style="vertical-align: middle">
                                                                {{ number_format($item->size_amount, 2) }} ₴</td>
                                                            <td style="vertical-align: middle">
                                                                {{ number_format($item->total_price * $item->quantity, 2) }}
                                                                ₴
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="MakeReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header pl-5 bg-secondary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Залишити відгук</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('user/make-review') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" required id="getProductID" name="product_id">
                    <input type="hidden" required id="getOrderID" name="order_id">
                    <div class="modal-body p-5 pb-1">
                        <div class="form-group">
                            <label>Рейтинг: <span class="text-danger">*</span></label>
                            <select class="form-control" required name="rating">
                                <option value="">Вибрати</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <div class="form-group">
                                <label class="mt-3 ">Відгук <span class="text-danger">*</span></label>
                                <textarea class="form-control" required name="review"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mb-3 mx-4" style="border-top: 0 !important;">
                        
                        <button type="submit" class="btn btn-secondary">Залишити відгук</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Закрити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('body').delegate('.MakeReview', 'click', function() {
            var product_id = $(this).attr('id');
            var order_id = $(this).attr('data-order');
            $('#getProductID').val(product_id);
            $('#getOrderID').val(order_id);
            $('#MakeReviewModal').modal('show');
        });
    </script>
@endsection
