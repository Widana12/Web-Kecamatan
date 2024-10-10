<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Kecamatan Payangan - Login Web Administrator</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('upload/favicon.ico') }}">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/feather-font/css/iconfont.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/backend.css') }}">

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
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">
                <div class="row w-100 auth-page mx-0">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="auth-side-wrapper">
                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="{{ url('/') }}" class="noble-ui-logo d-block mb-2">KECAMATAN PAYANGAN</a>
                                        <h4 class="fw-bolder mb-4">LOGIN WEB ADMINISTRATOR</h4>
                                        <hr>
                                        <form action="{{ route('authenticate') }}" method="POST" class="forms-sample">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password" id="password" autocomplete="current-password" placeholder="Password" required>
                                            </div>
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-icon-text mb-md-0 me-2 btn-block fw-bolder">
                                                    <i class="btn-icon-prepend" data-feather="log-in"></i>
                                                    LOGIN
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <!-- Font JS -->
    <script src="{{ asset('vendor/feather-icons/feather.min.js') }}"></script>

    <!-- Template JS -->
    <script src="{{ asset('asset/js/backend.js') }}"></script>

    @include('backend.layouts.messages')
</body>

</html>
