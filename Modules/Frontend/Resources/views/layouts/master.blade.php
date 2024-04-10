<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SkyZone</title>
        <link rel=icon href="assets/img/favicon.png" sizes="20x20" type="image/png">
    
        <!-- Stylesheet -->
        
        <link rel="stylesheet" href="{{ asset('website/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}" />
  </head>


    <body>
        <!-- BEGIN: NAVBAR  -->
            @yield('header')
        <!-- END: NAVBAR  -->
            @yield('content')

        <!-- BEGIN: FOOTER  -->
            @include('frontend::layouts.footer')
        <!-- END: FOOTER  -->
    </body>
 
    <script src="{{ asset('website/js/vendor.js') }}"></script>
    <script src="{{ asset('website/js/main.js') }}"></script>
</html>
