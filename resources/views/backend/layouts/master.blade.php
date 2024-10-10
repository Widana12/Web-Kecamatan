<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Kecamatan Payangan - {{ $title }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('upload/favicon.ico') }}">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">

    <!-- Plugin CSS -->
    @stack('plugin-css')

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/feather-font/css/iconfont.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/backend.css') }}">

    <!-- Custom CSS -->
    @stack('custom-css')

    <script type="text/javascript">
        var titleText = document.title + " - ";

        function titleMarquee() {
            titleText = titleText.substring(1, titleText.length) + titleText.substring(0, 1);
            document.title = titleText;
            setTimeout("titleMarquee()", 500);
        }
    </script>
</head>

<body onload="titleMarquee()">
    <div class="main-wrapper">
        @include('backend.layouts.sidebar')
        <div class="page-wrapper">
            @include('backend.layouts.navbar')
            <div class="page-content">
                @yield('content')
            </div>
            @include('backend.layouts.footer')
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <!-- Plugin JS -->
    @stack('plugin-js')

    <!-- Font JS -->
    <script src="{{ asset('vendor/feather-icons/feather.min.js') }}"></script>

    <!-- Template JS -->
    <script src="{{ asset('asset/js/backend.js') }}"></script>
    @include('backend.layouts.messages')

    <!-- Custom JS -->
    @stack('custom-js')
</body>

</html>
