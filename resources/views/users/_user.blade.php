<div class="list-group-item">
    <img class="mr-3" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" width=32>
    <a href="{{ route('users.show', $user) }}">
        {{ $user->name }}
    </a>
    @can('destroy', $user)
    <form action="{{ route('users.destroy', $user->id) }}" method="post" class="float-right" onsubmit="return confirm('你确定要删除此用户吗？')">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-outline-danger delete-btn">删除</button>

    </form>
    @endcan
</div>