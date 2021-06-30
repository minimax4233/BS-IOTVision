<tr>
  <th scope="row"> <a href="{{ route('clients.show', $client) }}">
      {{ $client->clientID }}
    </a></th>
  <td> {{ $client->clientName }}</td>
  <td>
    <a class="btn btn-sm btn-outline-success float-left" href="{{ route('clients.edit', $client) }}" style="margin-right:0px" role="button">修改</a>

    <form action="{{ route('clients.destroy', [$user, $client]) }}" method="post" class="float-left" onsubmit="return confirm('你确定要删除此客户端吗？')">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-outline-danger delete-btn">删除</button>

    </form>
  </td>
</tr>
@can('destroy', $user, $client)
@endcan