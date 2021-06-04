<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>

  <!-- Favicons -->
  <link href="{{ asset('travel-alam/assets/img/favicon.ico') }}" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('travel-alam/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('travel-alam/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('travel-alam/assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

  <!-- Feather Icons -->
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="{{ asset('travel-alam/assets/css/style.css') }}" rel="stylesheet">

  <!-- JQuery -->
  <script src="{{ asset('travel-alam/assets/vendor/jquery/jquery-3.6.0.min.js') }}"></script>
  
  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>

  @include('travel-alam.partials.header')

  @yield('content')

  @include('travel-alam.partials.footer')

  @include('travel-alam.partials.script')
  
  @include('sweetalert::alert')

</body>

</html>