<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <img src="images/logo.png" alt="">
        <h2>User</h2>
        <table class="table table-bordered" id="mytable" border="0">
            <tr class="mytr">
                <th class="myth">Name</th>
                <th class="myth">Gender</th>
                <th class="myth">Email</th>
                <th class="myth">phone number</th>
                <th class="myth">address</th>
            </tr>
            @foreach($users as $user)
            <tr class="mytr">
                <td class="myth">{{$user->name}}</td>
                <td class="myth">
                                @if(($user->gender) ==1)
                                    Male
                                 @else
                                    Female
                                 @endif
                </td>
                <td class="myth">{{$user->email}}</td>
                <td class="myth">{{$user->phone_number}}</td>
                <td class="myth">{{$user->address}}</td>

            </tr>
            @endforeach
        </table>
    </body>
</html>
