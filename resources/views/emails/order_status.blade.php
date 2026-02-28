
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
        }

        .header {
            text-align: center;
            border-radius: 8px;
        }

        .header h2 {
            margin: 0;
            padding: 0 20px;
        }

        .header p {
            padding: 0 20px;
        }

        .order-details {
            margin-top: 20px;
            font-size: 14px;
        }

        .order-details th,
        .order-details td {
            padding: 10px;
            text-align: left;
        }

        .order-details th {
            background-color: #f4f4f4;
        }

        .total {

            font-size: 16px;
            text-align: left;
        }

        .foter {
            margin-top: 30px;
            font-size: 12px;
            text-align: center !important;
        list-style: none !important;
            color: #888888;
        }

        .foter a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h2 style="padding-bottom: 7px;">Статус Вашого замовлення</h2>
            <p>Шановний(а) {{ $order->first_name }} {{ $order->last_name }}, дякуємо за покупку! Нижче наведено cтатус
                вашого замовлення.</p>
        </div>

        Статус замовлення: 
        @if($order->status == 0)
        <span style="color:rgb(255, 230, 0)"><strong>В очікуванні</strong></span>
        @elseif($order->status == 1)
        <span style="color:#007bff"><strong>У процесі</strong></span>
        @elseif($order->status == 2)
        <span style="color:rgb(0, 238, 178)"><strong>Доставлено</strong></span>
        @elseif($order->status == 3)
        <span style="color:forestgreen"><strong>Завершено</strong></span>
        @elseif($order->status == 4)
        <span style="color:crimson"><strong>Скасовано</strong></span>
        @endif

        
        <ul style="list-style: square;">
            <li>Замовлення номер: <strong>{{ $order->order_number }}</strong></li>
            <li>Дата покупки: <strong>{{ $order->created_at }}</strong></li>


        </ul>

        <div class="order-details">
            <table max-width="100%" cellpadding="10" style="border-collapse: collapse; margin-bottom: 20px">
                <thead>
                    <tr>
                        <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Назва</th>
                        <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Ціна</th>
                        <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Кількість</th>
                        <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Всього</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->getItem as $item)
                        <tr>
                            <td style="border-bottom: 1px solid #ddd; padding: 8px;">{{ $item->getProduct->title }}
                                <br>
                                Колір: {{ $item->color_name }}
                                <br>
                                @if (!empty($item->size_name))
                                    Розмір: {{ $item->size_name }}<br>
                                    Вартість розміру: {{ number_format($item->size_amount, 2) }} грн
                                @endif
                            </td>
                            <td style="border-bottom: 1px solid #ddd; padding: 8px; ">
                                {{ number_format($item->total_price, 2) }} грн</td>
                            <td style="border-bottom: 1px solid #ddd; padding: 8px;">{{ $item->quantity }} шт</td>
                            <td style="border-bottom: 1px solid #ddd; padding: 8px;">
                                {{ number_format($item->quantity * $item->total_price, 2) }} грн</td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
            <ul class="total" style="list-style:square;">
                @if (!empty($order->getShipping))
                    <li>Доставка: <strong>{{ $order->getShipping->name }}</strong></li>
                    <li>Вартість Доставки: <strong>{{ number_format($order->shipping_amount, 2) }}</strong> грн</li>
                @endif
                @if (!empty($order->discount_code))
                    <li>Знижка: <strong>{{ $order->discount_code }}</li>
                    <li>Сума Знижки: <strong>{{ number_format($order->discount_amount, 2) }}</strong> грн</li>
                @endif
                <li>До Оплати: <strong>{{ number_format($order->total_amount, 2) }} </strong>грн</li>
                <li>Метод Оплати: <strong>{{ $order->payment_method }}</strong></li>
            </ul>
            @if ($order->payment_method == 'Платіжна картка')
            @php
            $getSettingCard = App\Models\CardSettingModel::getSingle();
            @endphp
            <ul style="list-style: square; text-align: left; line-height: 24px;">
                <li>Платіжна карта № <strong>{{ $getSettingCard->card_number }}</strong></li>
                <li>Отримувач: <strong>{{ $getSettingCard->name_owner }} {{ $getSettingCard->surname
                        }}</strong></li>
                <li>Банк: <strong>{{ $getSettingCard->bank }}</strong></li>
            </ul>
            @endif
        </div>
        @php
            $getSetting = App\Models\SystemSettingModel::getSingle();
        @endphp
        <ul class="foter">
            <li>Якщо у вас виникли запитання, <a href="{{ $getSetting->submit_email }}">зв’яжіться з нами</a>.</li>
            <li>Відвідайте наш веб-сайт за адресою: <a href="{{ url('') }}"
                    target="_blank">{{ $getSetting->website_name }}</a>
            </li>

            <li>{{date('Y')}} {{ $getSetting->website_name }}. Усі права захищені.</li>
        </ul>
    </div>

</body>

</html>













