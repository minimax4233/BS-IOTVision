@extends('layouts.default')
@section('title', '所有客户端')

@section('content')
<div class="offset-md-2 col-md-8">
    <h2 class="mb-4 text-center">所有客户端</h2>
    <div class="list-group list-group-flush">
        @foreach ($clients as $client)
        <div class="list-group-item">
            @include('clients._client')
        </div>
        @endforeach
    </div>
    <div class="mt-3">
        {!! $clients->render() !!}
    </div>
</div>
@stop