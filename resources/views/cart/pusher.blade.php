@extends('master')
@section('content')
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('d39395df272cbcb9870d', {
      cluster: 'ap1',
      encrypted: true
    });

    var channel = pusher.subscribe('GuitarShop');
    channel.bind('chekout', function(data) {
        $.notify({
          	icon: 'glyphicon glyphicon-star',
          	message: "Everyone loves font icons! Use them in your notification!"
          });
    });
  </script>
</head>
@stop
