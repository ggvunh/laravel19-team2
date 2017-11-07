<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div style="float: left;"><img src="images/logo.png" ></div>
        <div style="float: right;">
            <h3>PKH MUSICAL INSTRUMENTS STORE</h3>
            <H4 style="text-align: left;">Address: Da Nang City</h4>
            <H4 style="text-align: left;">Hotline: 0934.83.83.81</h4>
            <H4 style="text-align: left;">Email: guitarshoppkh@gmail.com</h4>
        </div>
        <div style="clear: both;">

        </div>
        <div>
            <h2 style="text-align: center;">INVOICE</h2>
            <table class="table table-bordered" id="mytable" border="0" style="width: 90%; margin: auto;">
                <tr>
                    <th>Name:</th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>phone number:</th>
                    <td>{{$user->phone_number}}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td>{{$user->address}}</td>
                </tr>
            </table><br>

            <table class="table table-bordered" id="mytable" border="1" style="width: 90%; margin: auto;">
                <tr>
                    <th class="myth" style="text-align: center; width: 15%;">Order code</th>
                    <th class="myth" style="text-align: center; width: 25%;">Date</th>
                    <th class="myth" style="text-align: center; width: 25%;">Total</th>
                    <th class="myth" style="text-align: center; width: 25%;">Shipping address</th>
                </tr>
                <tr>
                    <td style="text-align: center; width: 15%;">#{{$bill ->id}}</td>
                    <td style="text-align: center; width: 25%;">{{$bill ->date_order}}</td>
                    <td style="text-align: center; width: 25%;">{{number_format($bill ->total)}}</td>
                    <td style="text-align: center; width: 25%;">{{$bill ->order_address}}</td>
                </tr>
            </table>

            <h3 style="text-align: center;">Details</h3>

             <table class="table table-bordered" id="mytable" border="1" style="width: 90%; margin: auto;">
                 <tr>
                     <th class="myth" style="text-align: center; width: 50%;">Products</th>
                     <th class="myth" style="text-align: center; width: 15%;">Quantity</th>
                     <th class="myth" style="text-align: center; width: 25%;">Price</th>
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
