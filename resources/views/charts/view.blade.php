@extends('layouts.default')
@section('title', '展示')

@section('headContext')
<script src="{{ asset('chart.js/chart.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@stop

@section('content')

<div class="allChartContainer">
    <div class="chartContainer" style="position: relative; height: 50vh; width: 50vh; display: inline-block;">
        <canvas id="selfCientStatChart"></canvas>
    </div>
    <div class="chartContainer" style="position: relative; height: 50vh; width: 50vh; display: inline-block;">
        <canvas id="allCientStatChart"></canvas>
    </div>
    <div class="chartContainer">
        <canvas id="clientStatChart"></canvas>
    </div>
    <div class="chartContainer" >
        <canvas id="dataStat"></canvas>
    </div>
</div>


<script>


    window.chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(201, 203, 207)'
    };

    $.get('/selfCientStat', function(data, status) {
        var ctx = document.getElementById("selfCientStatChart").getContext("2d");
        var parseData = JSON.parse(data);
        //console.log(data);
        var my_chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    "在线客户端",
                    "离线客户端"
                ],
                datasets: [{
                    data: parseData,
                    backgroundColor: [
                        window.chartColors.blue,
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.green,
                        window.chartColors.grey
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: '您的客户端在线情況'
                    }
                }
            }
        });
    });

    $.get('/allCientStat', function(data, status) {
        var ctx = document.getElementById("allCientStatChart").getContext("2d");
        var parseData = JSON.parse(data);
        //console.log(data);
        var my_chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    "在线客户端",
                    "离线客户端"
                ],
                datasets: [{
                    data: parseData,
                    backgroundColor: [
                        window.chartColors.blue,
                        window.chartColors.red
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: '全网客户端在线情況'
                    }
                }
            }
        });
    });

    $.get('/clientStat', function(data, status) {
        var ctx = document.getElementById("clientStatChart").getContext("2d");
        var parseData = JSON.parse(data);
        var my_chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    "个人在线客户端",
                    "个人离线客户端",
                    "全网在线客户端",
                    "全网离线客户端",
                    "全网所有客户端"
                ],
                datasets: [{
                    label: '数量',
                    data: parseData,
                    backgroundColor: [
                        window.chartColors.blue,
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.green,
                        window.chartColors.purple
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: '客户端在线情況'
                    }
                }
            }
        });
    });


    $.get('/dataStat', function(data, status) {
        var ctx = document.getElementById("dataStat").getContext("2d");
        var parseData = JSON.parse(data);
        console.log(parseData);
        var my_chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: parseData[0],
                datasets: [{
                    label: '数量',
                    data: parseData[1],
                    backgroundColor: [
                        window.chartColors.purple,
                        window.chartColors.green,
                        window.chartColors.orange,
                        window.chartColors.red,
                        window.chartColors.blue,
                        window.chartColors.yellow
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: '客户端接收数据量'
                    }
                }
            }
        });
    });
</script>





@stop