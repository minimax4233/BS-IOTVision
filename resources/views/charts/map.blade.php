<!DOCTYPE html>
<html>

<head>
    <title>地图 - IOT-Vision</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="https://api.map.baidu.com/api?v=1.0&&type=webgl&ak=nLCubKp7gXTPDG81rLp9B23cnwz7z7t3"></script>
    <style type="text/css">
        html {
            height: 100%
        }

        body {
            height: 100%;
            margin: 0px;
            padding: 0px
        }

        #mapcontainer {
            height: 100%
        }
    </style>
</head>

<body>
    @include('layouts._header')
    <div id="mapcontainer"></div>
    <script type="text/javascript">
        var map = new BMapGL.Map("mapcontainer");
        // 创建地图实例 
        map.centerAndZoom(new BMapGL.Point(120.140771, 30.297433), 13); // 初始化地图，设置中心点坐标和地图级别 
        map.enableScrollWheelZoom(true); //开启鼠标滚轮缩放


        var x = 119.96154621839524;
        var y = 30.280080199241638;
        var point = new BMapGL.Point(x, y);
        var marker = new BMapGL.Marker(point); // 创建标注
        map.addOverlay(marker); // 将标注添加到地图中
        var opts = {
            width: 200, // 信息窗口宽度
            height: 100, // 信息窗口高度
            title: "故宫博物院", // 信息窗口标题
            message: "这里是故宫"
        }
        var infoWindow = new BMapGL.InfoWindow("地址：北京市东城区王府井大街88号乐天银泰百货八层", opts); // 创建信息窗口对象 
        marker.addEventListener("click", function() {
            map.openInfoWindow(infoWindow, point); //开启信息窗口
        });
    </script>
</body>