<a href="{{ route('users.show', $user->id) }}">
  <img src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar"/>
</a>
<h1>名称：{{ $user->name }}</h1>
<h1>邮箱：{{ $user->email }}</h1>
<h1>注冊时间：{{ $user->created_at }}</h1>