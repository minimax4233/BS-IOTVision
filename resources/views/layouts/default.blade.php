<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'IOT-Vision') - IOT-Vision</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">物联网可视化</a>
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item"><a class="nav-link" href="/show">展示</a></li>
            <li class="nav-item"><a class="nav-link" href="/signup">注冊</a></li>
          <li class="nav-item" ><a class="nav-link" href="#">登录</a></li>
        </ul>
      </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
  </body>
</html>