<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,900'
          rel='stylesheet'
          type='text/css'>
    <link href="{{ mix("css/app.css") }}" rel="stylesheet"/>
    <meta name="google" value="notranslate">
    <meta name="google-signin-client_id" content="445477923626-erv9s62l16fdntqllt66f9kk7osaqmsv.apps.googleusercontent.com.apps.googleusercontent.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    @yield('content')

    @if(usingNodeServer())
        <script src="{{ config('app.url') }}:6001/socket.io/socket.io.js"></script>
    @endif
    <script src="{{ mix("js/app.js") }}"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>

</body>
</html>
