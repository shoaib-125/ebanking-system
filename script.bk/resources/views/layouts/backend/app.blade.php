<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ env('APP_NAME') }}</title>
     <link rel="icon" href="{{ asset('uploads/favicon.ico') }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/all.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/components.css') }}">
    @stack('css')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <!--- Header Section ---->
      @include('layouts.backend.partials.header')

      <!--- Sidebar Section --->
      @include('layouts.backend.partials.sidebar')

      <!--- Main Content --->
      <div class="main-content">
        <section class="section">
         @yield('head')
       </section>
      @yield('content')
      </div>

     <!--- Footer Section --->
     @include('layouts.backend.partials.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('backend/admin/assets/js/jquery-3.5.1.min.js') }}" ></script>
  <script src="{{ asset('backend/admin/assets/js/popper.min.js') }}" ></script>
  <script src="{{ asset('backend/admin/assets/js/bootstrap.min.js') }}" ></script>
  <script src="{{ asset('backend/admin/assets/js/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('backend/admin/assets/js/moment.min.js') }}"></script>
  <script src="{{ asset('backend/admin/assets/js/sweetalert2.all.min.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('backend/admin/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('backend/admin/assets/js/form.js') }}"></script>
  <!-- Page Specific JS File -->
  @stack('js')
  <script src="{{ asset('backend/admin/assets/js/custom.js') }}"></script>
</body>
</html>
