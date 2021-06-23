<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">物联网可视化</a>
        <ul class="navbar-nav justify-content-end">
            @if (Auth::check())
            <li class="nav-item"><a class="nav-link" href="{{ route('vision') }}">展示</a></li>
            <li class="nav-item"><a class="nav-link" href="#">用户列表</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">个人中心</a>
                    <a class="dropdown-item" href="#">编辑资料</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" id="logout" href="#">
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-block btn-danger" type="submit" name="button">登出</button>
                        </form>
                    </a>
                </div>
            </li>
            @else
            
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('signup') }}">注冊</a></li>
            @endif
        </ul>
    </div>
</nav>