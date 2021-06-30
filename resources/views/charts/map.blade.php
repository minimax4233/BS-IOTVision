<!DOCTYPE html>
<html>

<head>
    <title>地图 - IOT-Vision</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="https://api.map.baidu.com/api?v=1.0&&type=webgl&ak=nLCubKp7gXTPDG81rLp9B23cnwz7z7t3"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        map.centerAndZoom(new BMapGL.Point(120.140771, 30.297433), 11); // 初始化地图，设置中心点坐标和地图级别 
        map.enableScrollWheelZoom(true); //开启鼠标滚轮缩放

        function addpoint(x, y, title, info) {


            //var x = parseData[0];
            //var y = parseData[1];
            //var x = 119.96154621839524;
            //var y = 30.280080199241638;
            var point = new BMapGL.Point(x, y);
            var marker = new BMapGL.Marker(point); // 创建标注
            map.addOverlay(marker); // 将标注添加到地图中
            var opts = {
                width: 200, // 信息窗口宽度
                height: 100, // 信息窗口高度
                title: (title ? "客户端：" + title : "No Title"), // 信息窗口标题
                message: "msg"
            }
            var infoWindow = new BMapGL.InfoWindow((info ? info : "No Info"), opts); // 创建信息窗口对象 
            marker.addEventListener("click", function() {
                map.openInfoWindow(infoWindow, point); //开启信息窗口
            });
        }

        $.get('/clientData', function(data, status) {
            var parseData = JSON.parse(data);
            
            for( var i in parseData ){
                console.log(i);
                var clientID = parseData[i][0];
                var points = parseData[i][1];
                console.log(clientID);
                for(var j in points){
                    point = points[j];
                    var info = "信息：" + point[2] +"<br>发送值："　+ point[4]  + "<br>状态："+(point[5]?"告警":"正常");

                    addpoint(point[0], point[1],clientID, info);
                    console.log(point[0], point[1],clientID, info);
                }
            }
            
            
            //console.log(parseData[0][1]);
            
        });

    </script>
</body>