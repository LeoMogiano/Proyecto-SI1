<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Reporte de Venta</title>

    <style>
        @media print {
            .invoice-box {
                max-width: unset;
                box-shadow: none;
                border: 0px;
            }
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="img/SmarHome.jpeg" style="width: 50%; max-width: 100px" />
                            </td>
                              
                            <td  style="padding-right: 0rem">
                                ReporteVenta #: {{ $venta->id }}<br />
                                {{ $venta->created_at }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                                Smartplusshouse, Inc.<br />
                                3415 3er Anillo, Radial 26<br />
                                Andres Ibáñez, SC 3415
                            </td>
                            <td></td>
                            <td></td>
                            <td align="right" >
                                {{-- Acme Corp.<br /> --}}
                                @foreach ($users as $user)
                                    @if ($venta->Id_us == $user->id)
                                        {{ $user->id }}<br />
                                        {{ $user->name }}<br />
                                        {{ $user->email }}
                                    @endif
                                @endforeach


                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Metodo de Pago</td>
                <td></td>
                <td></td>
                <td align="right">Moneda # &nbsp;</td>
            </tr>

            <tr class="details">
                <td>Efectivo</td>
                <td></td>
                <td></td>
                <td align="right">Bs &nbsp; &nbsp; &nbsp;</td>
            </tr>

            <tr class="heading">
                <td>Item</td>
                <td align="right" >Cantidad</td>
                <td align="right">Descuento</td>
                <td align="right" style="padding-left: 0rem">Precio &nbsp;</td>
            </tr>
            @foreach ($dventas as $dventa)
              @foreach ($productos as $producto)
                @if ($producto->id == $dventa->producto_id)
                <tr class="item" >
                  <td>{{$producto->nombre}}</td>
                  <td align="right" >{{$dventa->cantidad}} &nbsp;</td>
                  <td align="right"> %{{$dventa->descuento}} &nbsp;</td>
                  
                  <td align="right">  Bs{{$producto->precio-($producto->precio*$producto->descuento/100)}} &nbsp;</td>
              
                @endif
              @endforeach
            @endforeach

            @foreach ($dservicios as $dservicio)
              @foreach ($servicios as $servicio)
                @if ($servicio->id == $dservicio->servicio_id)
                <tr class="item" >
                  @foreach ($tservicios as $tservicio)
                  @if ($servicio->Id_tp == $tservicio->id)
                  <td>{{$tservicio->nombre}}</td>
                  @endif
                  @endforeach
                  
                  <td align="right" >{{$dservicio->cantidad}} &nbsp;</td>
                  <td align="right"> NO APLICA &nbsp;</td>
                  
                  <td align="right">  Bs{{$servicio->precio}} &nbsp;</td>
              
                @endif
              @endforeach
            @endforeach
          </tr>

            {{-- <tr class="item">
                <td>Hosting (3 months)</td>

                <td>$75.00</td>
            </tr>

            <tr class="item last">
                <td>Domain name (1 year)</td>

                <td>$10.00</td>
            </tr> --}}

            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td align="right"> <b>Total :</b> Bs{{$subtotal}} &nbsp;</td>
            </tr>
        </table>
    </div>
</body>

</html>
