@extends('layouts.default')
@section('title', $client->clientName)

@section('content')
<div class="row">
    <div class="offset-md-2 col-md-8">
        <div class="col-md-12">
            <div class="offset-md-2 col-md-8">
                <section class="user_info">
                    @include('clients._client_info', ['client' => $client])
                </section>
                <a class="btn btn-lg btn-outline-success" href="{{ route('clients.edit', $client) }}" role="button">修改</a>
            </div>
        </div>
    </div>
</div>
@stop