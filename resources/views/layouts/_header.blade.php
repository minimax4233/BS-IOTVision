<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">IOT-Vision</a>
        <ul class="navbar-nav justify-content-end">
            @if (Auth::check())
            <li class="nav-item"><a class="nav-link" href="{{ route('chartjs.map') }}">地图</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('chartjs.index') }}">统计信息</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('clients.create', Auth::user()) }}">创建客户端</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('clients.index', Auth::user()) }}">客户端列表</a></li>
            @can('adminOnly', Auth::user())
            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">用户列表</a></li>
            @endcan
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">个人中心</a>
                    <a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">编辑资料</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" id="logout" href="#">
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-outline-primary btn-outline-danger" type="submit" name="button">登出</button>
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

