@extends('layouts.default')
@section('title', '更新客户端资料')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>更新客户端资料</h5>
    </div>
      <div class="card-body">

        @include('shared._errors')

        <form method="POST" action="{{ route('clients.update', $client->id )}}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            <div class="form-group">
              <label for="clientName">客户端名称：</label>
              <input type="text" name="clientName" class="form-control" value="{{ $client->clientName }}">
            </div>

            <div class="form-group">
              <label for="clientID">客户端ID：</label>
              <input type="text" name="clientID" class="form-control" value="{{ $client->clientID }}">
            </div>


            <button type="submit" class="btn btn-outline-primary">更新</button>
        </form>
    </div>
  </div>
</div>
@stop