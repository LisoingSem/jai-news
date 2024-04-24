<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Jai News</title>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/desktop.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/mobile.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/tablet.css') }}">
</head>

<body>
      <!-- top -->
      @include('layouts.header')

      <!-- menu -->
      @include('layouts.navbar')
      <!-- end menu -->

      <!-- news features -->
      @yield('content')

      <!-- footer -->
      @include('layouts.footer')

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      @yield('custom-js')
</body>

</html>