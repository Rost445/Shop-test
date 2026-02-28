<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        @font-face {
            font-family: "DejaVu Sans";
            font-style: normal;
            /*font-weight: 400;*/
            src: url("/fonts/dejavu-sans/DejaVuSans.ttf");
            /* IE9 Compat Modes */
            src:
                local("DejaVu Sans"),
                local("DejaVu Sans"),
                url("/fonts/dejavu-sans/DejaVuSans.ttf") format("truetype");

        }

        body {
            font-family: "DejaVu Sans";
            font-size: 12px;
        }
        #first {
            font-size: 10px !important;
        }
    </style>
</head>

<body>
    <h1 style="border-bottom: solid 1px darkgrey">{{ $title }} <small style="font-size:14px; color: darkgrey">від
            {{ $date }}</small></h1>

    <table id="first" style="width:100%; border-collapse:collapse; text-align:left;">
        <thead>
            <tr>
                <th style="text-align: left; padding-bottom:5px; text-decoration: underline;"><b>Постачальник</b></th>
                <th style="text-align: left; padding-bottom:5px;text-decoration: underline;"><b>Покупець</b></th>
                <th style="text-align: left; text-decoration: underline;"><b>Деталі</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <address>
                        <strong>Admin, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (804) 123-5432<br>
                        Email: info@almasaeedstudio.com
                    </address>
                </td>
                <td>
                    <address>
                        <strong>{{ $getRecord->first_name }} {{ $getRecord->last_name }}</strong><br>
                        {{ $getRecord->company_name }}<br>
                        </b>Адреса доставки:</b>{{ $getRecord->delivery_address }} <br>
                        </b>Тел:</b> {{ $getRecord->phone }}<br>
                        </b>Email:</b> {{ $getRecord->email }}
                    </address>
                </td>
                <td>
                    <strong>№ Замовлення:</strong> <span style="border:1px solid darkgrey; padding:3px;">{{$getRecord->order_number}} </span><br><br>
                    <b>Метод оплати:</b> {{ $getRecord->payment_method }}<br>
                    <b>Вартість доставки:</b> {{ $getRecord->shipping_amount }} грн <br>

                </td>
            </tr>
        </tbody>
    </table>
    <br>  <br>
    <table style="border-collapse: collapse; width: 100%; text-align:center;">
        <thead>
            <tr>
                <th style="border: 1px solid darkgrey; padding: 5px;">Назва </th>
                <th style="border: 1px solid darkgrey; padding: 5px;">Кількість</th>
                <th style="border: 1px solid darkgrey; padding: 5px;">Ціна (грн)</th>
                <th style="border: 1px solid darkgrey; padding: 5px;">Розмір</th>
                <th style="border: 1px solid darkgrey; padding: 5px;">Колір</th>
                <th style="border: 1px solid darkgrey; padding: 5px;">Сума розміру (грн)</th>
                <th style="border: 1px solid darkgrey; padding: 5px;">Сума*кількість </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getRecord->getItem as $item)
                <tr>
                    <td style="border: 1px solid darkgrey; padding: 5px;">{{ $item->getProduct->title }}</td>
                    <td style="border: 1px solid darkgrey; padding: 5px;">{{ $item->quantity }}</td>
                    <td style="border: 1px solid darkgrey; padding: 5px;">{{ number_format($item->price, 2) }}</td>
                    @if ($item->size_name == null)
                        <td style="border: 1px solid darkgrey; padding: 5px;">-</td>
                    @else
                    <td style="border: 1px solid darkgrey; padding: 5px;">{{ $item->size_name }}</td>
                    @endif
                    <td style="border: 1px solid darkgrey; padding: 5px;">{{ $item->color_name }}</td>
                    <td style="border: 1px solid darkgrey; padding: 5px;">{{ number_format($item->size_amount, 2) }}</td>
                   <td style="border: 1px solid darkgrey; padding: 5px;"> <strong> {{ number_format($item->total_price, 2) }} грн</strong></td>
                   
            @endforeach
        </tbody>
    </table>
    <h3><strong>Всього до оплати: {{ number_format($getRecord->total_amount, 2) }} грн</strong></h3>
    <br>
    <span><strong>Від постачальника* : ______________________________</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span><strong>Отримав(ла)* : ______________________________</span>


            
</body>

</html>
