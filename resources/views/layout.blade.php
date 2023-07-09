<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<!-- Css Styles -->
<link rel="stylesheet" href="{{ asset('/') }}assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="{{ asset('/') }}assets/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="{{ asset('/') }}assets/css/themify-icons.css" type="text/css">
<link rel="stylesheet" href="{{ asset('/') }}assets/css/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="{{ asset('/') }}assets/css/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="{{ asset('/') }}assets/css/nice-select.css" type="text/css">
<link rel="stylesheet" href="{{ asset('/') }}assets/css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="{{ asset('/') }}assets/css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="{{ asset('/') }}assets/css/style.css" type="text/css">
<!-- Js Plugins -->
<script src="{{ asset('/') }}assets/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('/') }}assets/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}assets/js/jquery-ui.min.js"></script>
<script src="{{ asset('/') }}assets/js/jquery.countdown.min.js"></script>
<script src="{{ asset('/') }}assets/js/jquery.nice-select.min.js"></script>
<script src="{{ asset('/') }}assets/js/jquery.zoom.min.js"></script>
<script src="{{ asset('/') }}assets/js/jquery.dd.min.js"></script>
<script src="{{ asset('/') }}assets/js/jquery.slicknav.js"></script>
<script src="{{ asset('/') }}assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('/') }}assets/js/main.js"></script>
</style>

<body>
    @include('header')

    @yield('content')


    <footer class="footer-section" style="padding-bottom: 40px">
        <div class="container ">
            <div class="w-full align-items-center mx-auto">
                <div class="text-center">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="/">GALAKSI</a>
                        </div>
                        <ul>
                            <li>Address: Jalan Raya Banjarsari 105, Desa Sindurejo, Kecamatan Gedangan, Kabupaten Malang
                                65178</li>
                            <li>Phone: 081555482414
                            <li>
                            <li>Email: galaksi@gmail.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>