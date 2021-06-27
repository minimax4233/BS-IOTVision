
<div class="list-group-item">
    <a href="{{ route('clients.show', $client) }}">
        {{ $client->clientID }}
    </a>
    
        {{ $client->clientName }}
    
    
    <form action="{{ route('clients.destroy', $client->id, $user->id) }}" method="post" class="float-right" onsubmit="return confirm('你确定要删除此客户端吗？')">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-outline-danger delete-btn">删除</button>

    </form>
    @can('destroy', $user, $client)
    @endcan
</div>