<!DOCTYPE html>
<html lang="en">

<head>
    <title>Carwash</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('customer-template.css')

</head>

<body>

    @include('customer-template.navbar')
    <!-- END nav -->

    @yield('content')

  

    @include('customer-template.footer')



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


@include('customer-template.js')

</body>

</html>