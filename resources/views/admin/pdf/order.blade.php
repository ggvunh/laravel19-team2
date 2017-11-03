<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div style="float: left;"><img src="images/logo.png" ></div>
        <div style="float: right;">
            <h3>TRUNG TAM MUA SAM NHAC CU PKH</h3>
            <H4 style="text-align: left;">Dia chi: Tp Da Nang</h4>
            <H4 style="text-align: left;">Hotline: 0934.83.83.81</h4>
        </div>
        <div style="clear: both;">

        </div>
        <div>
            <h2 style="text-align: center;">CHI TIET DON HANG #{{$id}}</h2>

             <table class="table table-bordered" id="mytable" border="1" style="width: 90%; margin: auto;">
                 <tr>
                     <th class="myth" style="text-align: center; width: 50%;">San pham</th>
                     <th class="myth" style="text-align: center; width: 15%;">So luong</th>
                     <th class="myth" style="text-align: center; width: 25%;">Thanh tien</th>
                 </tr>
                 @foreach($exportdetails as $billdetail)
                 <tr>
                     <td style="width: 30%;">{{ $billdetail->product->name }}</td>
                     <td style="text-align: center; width: 30%;">{{ $billdetail->quantity }}</td>
                     <td style="text-align: center; width: 30%;">{{ number_format($billdetail->unit_price) }}vnd</td>
                 </tr>
                 @endforeach
             </table><br>
        </div>
    </body>
</html>
