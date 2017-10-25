<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <p>Xin chào: <b>{{ Auth::user()->name }}</b></p>
            <p>Số Điện thoại: <b>{{ Auth::user()->phone_number }}</b></p>
            <p>Email: <b>{{ Auth::user()->email }}</b></p>
            <h3>Thông tin đơn hàng</h3>

            <table class="table table-bordered" id="mytable" border="1px">
                <tr>
                    <th class="myth">Mã đơn hàng</th>
                    <th class="myth">Ngày</th>
                    <th class="myth">Tổng cộng</th>
                    <th class="myth">Địa chỉ giao hàng</th>
                </tr>
                <tr>
                    <td>#1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
            </table>
            <p>Cám ơn bạn đã mua hàng tại Guitar shop, nhân viên sẽ liên hệ với bạn sớm nhất.</p>
            <p>Trân Trọng!!!</p>
        </div>
    </body>
</html>
