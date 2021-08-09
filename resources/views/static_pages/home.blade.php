@extends('layouts.default')

@section('content')
<div class="jumbotron">
    <h1>HI, </h1>
    <p class="lead">
        欢迎使用 IOT-Vision 系统！
    </p>
    <p>
        这是一个展示物联网数据的可视化平台。
    </p>
    <hr class="my-4">
    <p>
        <a class="btn btn-lg btn-outline-primary" href="{{ route('signup') }}" role="button">马上注册</a>&#12288;
        <a class="btn btn-lg btn-outline-success" href="{{ route('login') }}" role="button">登录系统</a>
    </p>
</div>
@stop