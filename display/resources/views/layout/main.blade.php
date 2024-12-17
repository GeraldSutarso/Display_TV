<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    
    <title>AKTI | Learning</title>
    <link rel="icon" type="image/png" href="{{ asset('img/Favicon akti.png') }}">
    <!-- Yield styles -->
    @yield('styles')
  </head>
  <body style="background-color: rgb(255, 255, 255)">
    @include('partial/navbar')
    <div class="container mt-4">
      @yield('content')
    </div>
    <!-- Yield scripts -->
    @yield('scripts')
  </body>
</html>
