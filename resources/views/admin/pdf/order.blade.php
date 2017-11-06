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
            <H4 style="text-align: left;">Email: guitarshoppkh@gmail.com</h4>
        </div>
        <div style="clear: both;">

        </div>
        <div>
            <h2 style="text-align: center;">DON HANG NHAN DUOC</h2>
            <table class="table table-bordered" id="mytable" border="1" style="width: 90%; margin: auto;">
                <tr>
                    <th class="myth" style="text-align: center; width: 15%;">Ma don hang</th>
                    <th class="myth" style="text-align: center; width: 25%;">Ngay</th>
                    <th class="myth" style="text-align: center; width: 25%;">Tong</th>
                    <th class="myth" style="text-align: center; width: 25%;">Dia chi giao hang</th>
                </tr>
                <tr>
                    <td style="text-align: center; width: 15%;">#{{$bill ->id}}</td>
                    <td style="text-align: center; width: 25%;">{{$bill ->date_order}}</td>
                    <td style="text-align: center; width: 25%;">{{number_format($bill ->total)}}</td>
                    <td style="text-align: center; width: 25%;">{{$bill ->order_address}}</td>
                </tr>
            </table>

            <h3 style="text-align: center;">CHI TIET DON HANG #{{$id}}</h3>

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

             <h3 style="text-align: center; margin: auto;">Chi tiet khach hang</h3><br><br>
             <table class="table table-bordered" id="mytable" border="1" style="width: 60%; margin: auto;">
                 <tr>
                     <th>Ten</th>
                     <td>{{$user->name}}</td>
                 </tr>
                 <tr>
                     <th>So dien thoai</th>
                     <td>{{$user->phone_number}}</td>
                 </tr>
                 <tr>
                     <th>Email</th>
                     <td>{{$user->email}}</td>
                 </tr>
                 <tr>
                     <th>Dia chi</th>
                     <td>{{$user->address}}</td>
                 </tr>
             </table><br>
        </div>
    </body>
</html>
