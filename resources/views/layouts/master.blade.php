<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>    
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/stickyfooter.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/pdf.css') }}">
</head>
<body>
    @include('includes.header')
    <div id="wrap">
    <div class="container">
        @yield('content')
    </div>        
    </div>
    @include('includes.footer')
    <script src="{{ URL::to('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
    @include('includes.divisionajax')
</body>
</html>
