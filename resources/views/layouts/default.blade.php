<!DOCTYPE html>
<html>

<head>
  <title>@yield('title', 'IOT-Vision') - IOT-Vision</title>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('headContext')
</head>

<body>
  @include('layouts._header')

  <div class="container">
    <div class="offset-md-1 col-md-10">
      @include('shared._messages')
      @yield('content')
      @include('layouts._footer')
    </div>
  </div>
  <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>