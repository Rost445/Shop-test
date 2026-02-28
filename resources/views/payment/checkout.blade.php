@extends('layouts.app')
@section('style')
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Оплата<span>Магазин</span></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ Breadcrumbs::render('checkout') }}</li>
                </ol>
            </div>
        </nav>
        < <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <form action="" id="SubmitForm" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title"><b>Платіжні реквізити</b></h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Ваше ім'я <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" class="form-control" required
                                            value="{{ !empty(Auth::user()->name) ? Auth::user()->name : '' }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Ваше призвище <span class="text-danger">*</span></label>
                                        <input type="text" name="last_name" class="form-control" required
                                            value="{{ !empty(Auth::user()->last_name) ? Auth::user()->last_name : '' }}">
                                    </div>
                                </div>
                                <label>Назва компанії (Опціонально)</label>
                                <input type="text" name="company_name" class="form-control"
                                    value="{{ !empty(Auth::user()->company_name) ? Auth::user()->company_name : '' }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Телефон <span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" class="form-control" required
                                            value="{{ !empty(Auth::user()->phone) ? Auth::user()->phone : '' }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Електронна адреса<span class="text-danger"> <span
                                                    class="text-danger">*</span></span></label>
                                        <input type="email" name="email" class="form-control" required
                                            value="{{ !empty(Auth::user()->email) ? Auth::user()->email : '' }}">

                                    </div>
                                    <div class="col-sm-12">
                                        <label>Адреса доставки <span class="text-danger">*</span></label>
                                        <input type="text" name="delivery_address" class="form-control"
                                            placeholder="Місто, вулиця, назва перевізника та № відділення." required
                                            value="{{ !empty(Auth::user()->delivery_address) ? Auth::user()->delivery_address : '' }}">
                                    </div>
                                </div>
                                @if (empty(Auth::check()))
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="is_create" class="custom-control-input createAccount"
                                            id="checkout-create-acc">
                                        <label class="custom-control-label" for="checkout-create-acc">Створити
                                            акаунт?</label>
                                    </div>

                                    <div id="showPassword" style="display: none">
                                        <label>Пароль <span class="text-danger">*</span></label>
                                        <input type="text" id="inputPassword" name="password" class="form-control">
                                    </div>
                                @endif
                                <label>Примітки до замовлення (необов'язково)</label>
                                <textarea class="form-control" name="notes" cols="30" rows="4"
                                    placeholder="Примітки щодо вашого замовлення, напр. спеціальні примітки для доставки"></textarea>
                            </div>
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title"><b>Разом</b></h3><!-- End .summary-title -->
                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Продукція</th>
                                                <th>Вартість</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::getContent() as $key => $cart)
                                                @php
                                                    $getCartProduct = App\Models\ProductModel::getSingle($cart->id);
                                                @endphp
                                                <tr>
                                                    <td><a href="{{ url($getCartProduct->slug) }}">{{ $getCartProduct->title }}
                                                        </a></td>
                                                    <td>{{ number_format($cart->price * $cart->quantity, 2) }} грн</td>
                                                </tr>
                                            @endforeach

                                            <tr class="summary-subtotal">
                                                <td><b>Проміжний підсумок:</b> </td>
                                                <td>{{ number_format(Cart::getSubTotal(), 2) }} грн</td>
                                            </tr>
                                            <!-- start shipping -->
                                            <tr class="summary-shipping">
                                                <td>Доставка:</td>
                                                <td>&nbsp;</td>
                                            </tr>

                                            @foreach ($getShipping as $shipping)
                                                <tr class="summary-shipping-row">
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" value="{{ $shipping->id }}"
                                                                id="free-shipping{{ $shipping->id }}" name="shipping"
                                                                required
                                                                data-price="{{ !empty($shipping->price) ? $shipping->price : 0 }}"
                                                                class="custom-control-input getShippingCharge">
                                                            <label class="custom-control-label"
                                                                for="free-shipping{{ $shipping->id }}">{{ $shipping->name }}</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if (!empty($shipping->price))
                                                            {{ number_format($shipping->price, 2) }}грн
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <!-- end shipping -->
                                            <!-- start tr discount -->
                                            <tr>
                                                <td colspan="2">
                                                    <div class="cart-discount">
                                                        <div class="input-group">
                                                            <input type="text" name="discount_code" class="form-control"
                                                                id="getDiscountCode" placeholder="Код знижки">
                                                            <div class="input-group-append">
                                                                <button id="ApplyDiscount" style="height:38px"
                                                                    type="button"
                                                                    class="btn btn-sm btn-outline-primary-2"
                                                                    type="submit"><i
                                                                        class="icon-long-arrow-right"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Знижка:</b></td>
                                                <td><span id="getDiscountAmount"> </span> грн</td>
                                            </tr>
                                            <!-- end tr discount -->
                                            <tr class="summary-total">
                                                <td><b>Всього:</b></td>
                                                <td> <span
                                                        id="getPayableTotal">{{ number_format(Cart::getSubTotal(), 2) }}</span>
                                                    грн</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->
                                    <input type="hidden" id="getShippingChargeTotal" value="0">
                                    <input type="hidden" id="PayableTotal" value="{{ Cart::getSubTotal() }}">
                                    <div class="accordion-summary" id="accordion-payment">

                                        {{-- Післяплата --}}
                                        <div class="custom-control custom-radio">
                                            <input type="radio" value="Післяплата" id="Cashonedelivery"
                                                name="payment_method" required class="custom-control-input">
                                            <label class="custom-control-label" for="Cashonedelivery">
                                                Післяплата</label>
                                        </div>
                                        {{-- PayPal --}}
                                        {{-- <div class="custom-control custom-radio mt-0">
                                            <input type="radio" value="paypal" id="PayPal" name="payment_method"
                                                required class="custom-control-input">
                                            <label class="custom-control-label" for="PayPal">
                                                PayPal</label>
                                        </div> --}}
                                        {{-- Платіжна картка --}}
                                        <div class="custom-control custom-radio mt-0">
                                            <input type="radio" value="Платіжна картка" id="CreditCard"
                                                name="payment_method" required class="custom-control-input">
                                            <label class="custom-control-label" for="CreditCard">
                                                Платіжна картка</label>
                                        </div>
                                    </div>
                                    @if (!empty($cart))
                                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                            <span class="btn-text">Підтвердити</span>
                                            <span class="btn-hover-text">Підтвердити</span>
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block"
                                            disabled>
                                            <span class="btn-text">Підтвердити</span>
                                            <span class="btn-hover-text">Підтвердити</span>
                                        </button>
                                    @endif
                                    <div class="mt-3"><img class="mx-auto d-block"
                                            src="{{ url('assets/images/payments-summary.png') }}" alt="Платіжна картка">
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </form>
                </div>
            </div>
            </div>
    </main>
@endsection

@section('script')
    <script type="text/javascript">
        //Create account

        $('body').delegate('.createAccount', 'change', function() {
            if (this.checked) {
                $('#showPassword').show();
                $("inputPassword").prop('required', true);
            } else {
                $('#showPassword').hide();
                $("inputPassword").prop('required', false);
            }
        });

        //#SubbmitForm
        $('body').delegate('#SubmitForm', 'submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('checkout/place_order') }}",
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == false) {
                        alert(data.message);
                    } else {
                        window.location.href = data.redirect;
                    }
                },
                error: function(data) {

                }

            });
        });





        //getShippingCharge
        $('body').delegate('.getShippingCharge', 'change', function() {
            var price = $(this).attr('data-price');
            var total = $('#PayableTotal').val();
            $('#getShippingChargeTotal').val(price);
            var final_total = parseFloat(price) + parseFloat(total);
            $('#getPayableTotal').html(final_total.toFixed(2));

        });



        //ApplyDiscount
        $('body').delegate('#ApplyDiscount', 'click', function() {
            var discount_code = $('#getDiscountCode').val();

            $.ajax({
                type: "POST",
                url: "{{ url('checkout/apply_discount_code') }}",
                data: {
                    discount_code: discount_code,
                    "_token": "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function(data) {
                    $('#getDiscountAmount').html(data.discount_amount);
                    var shipping = $('#getShippingChargeTotal').val()
                    var final_total = parseFloat(shipping) + parseFloat(data.payable_total)
                    $('#getPayableTotal').html(final_total.toFixed(2));
                    $('#PayableTotal').val(data.payble_total);
                    if (data.status == false) {
                        alert(data.message);
                    }

                },
                error: function(data) {

                }

            });

        });
    </script>
@endsection
