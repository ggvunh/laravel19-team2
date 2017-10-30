<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <img src="images/logo.png" >
        <h2 style="text-align: center;">CHI TIET DON HANG #{{$id}}</h2>

         <table class="table table-bordered" id="mytable" border="1" style="width: 90%; margin: auto;">
             <tr>
                 <th class="myth" style=" width: 30%;">San pham</th>
                 <th class="myth" style="text-align: center; width: 30%;">So luong</th>
                 <th class="myth" style="text-align: center; width: 30%;">Thanh tien</th>
             </tr>
             @foreach($exportdetails as $billdetail)
             <tr>
                 <td style="width: 30%;">{{ $billdetail->product->name }}</td>
                 <td style="text-align: center; width: 30%;">{{ $billdetail->quantity }}</td>
                 <td style="text-align: center; width: 30%;">{{ $billdetail->unit_price }}</td>
             </tr>
             @endforeach
         </table><br>
    </body>
</html>
