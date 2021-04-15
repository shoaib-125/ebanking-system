<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- css here -->
    {!! SEO::generate(true) !!}
     <link rel="icon" href="{{ asset('uploads/favicon.ico?v=1') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/hc-offcanvas-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.css') }}">
    @stack('css')
</head>
<body>
    <!--- Header Section ---->
    @include('layouts.frontend.partials.header')
  
    @yield('content')

    <!--- footer Section ---->
    @include('layouts.frontend.partials.footer')
    
    <!-- js here -->
    <script src="{{ asset('frontend/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/iconify.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/hc-offcanvas-nav.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
    @if(Auth::check())
    <script src="{{ asset('backend/admin/assets/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('backend/admin/assets/js/form.js') }}"></script>
    @endif
    <!-- Page Specific JS File -->
    @stack('js')

<script>
    function showImage(input, ele) {
        if (input.files && input.files[0]) {
            $(ele+ "-dropzone-file").val('');
            var reader = new FileReader();
            reader.onload = function (e) {
                img_base_64 = e.target.result;
                $(ele+'-viewer').html('<div class="profile-gallery"><div class="gallery-image" style="background-image: url('+e.target.result+')"></div><span class="reset-image" onclick="resetImage(\''+ele+'\')"><img src="<?php echo asset('template_user/images/close-icon.svg')?>" alt=""></span></div>');
            };
            if(input.files[0].type == 'image/png' || input.files[0].type == 'image/jpg' || input.files[0].type == 'image/jpeg'  || input.files[0].type == 'image/gif'){
                $(ele+'-edit').val('0');
                reader.readAsDataURL(input.files[0]);
            }
        }
    }

</script>
</body>
</html>