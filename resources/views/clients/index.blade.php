@extends('layouts.default')
@section('title', '所有客户端')

@section('content')
<div class="offset-md-2 col-md-8">
    <h2 class="mb-4 text-center">所有客户端</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">客户端ID</th>
                <th scope="col">客户端名称</th>
                <th scope="col">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                @include('clients._client')
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {!! $clients->render() !!}
    </div>
</div>


@stop