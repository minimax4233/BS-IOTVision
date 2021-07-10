@extends('layouts.default')
@section('title', '创建客户端')

@section('content')


<div class="offset-md-2 col-md-8">
    <div class="card ">
        <div class="card-header">
            <h5>创建客户端</h5>
        </div>
        <div class="card-body">
            @include('shared._errors')
            <form method="POST" action="{{ route('clients.store', Auth::user()) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="clientID">客户端编号：</label>
                    <input type="text" name="clientID" class="form-control" value="{{ old('clientID') }}">
                </div>

                <div class="form-group">
                    <label for="clientName">客户端名称：</label>
                    <input type="text" name="clientName" class="form-control" value="{{ old('clientName') }}">
                </div>

                <button type="submit" class="btn btn-outline-primary">创建</button>
            </form>
        </div>
    </div>
</div>


@stop