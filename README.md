# B/S - IOT-Vision
ZJU - 2020/2021 B/S 软件体系技术 大作业

## 目的
任选Web开发技术实现一个物联网应用的网站

## 要求
需要实现的基本功能如下：
1. 搭建一个mqtt服务器，能够接收指定的物联网终端模拟器发送的数据。
2. 实现用户注册、登录功能，用户注册时需要填写必要的信息并验证，如用户名、密码要求在6字节以上，email的格式验证，并保证用户名和email在系统中唯一，用户登录后可以进行以下操作。
3. 提供设备配置界面，可以创建或修改设备信息，包含必要信息，如设备ID、设备名称等
4. 提供设备上报数据的查询统计界面
5. 提供地图界面展示设备信息，区分正常和告警信息，并可以展示历史轨迹
6. 首页提供统计信息（设备总量、在线总量、接收的数据量等），以图表方式展示（柱状体、折线图等）

增强功能：

7.	样式适配手机端，能够在手机浏览器/微信等应用内置的浏览器中友好显示。
为了提交作业方便，项目使用的数据库，建议使用mysql或mangodb，提交作业时同时附带建库建表脚本文件。

# 使用

## MqttToMySQL

复制 `config.yaml.example` 成 `config.yaml`，按照实际环境修改。

## WEB

按照环境修改`.env`配置。
网站使用了Laravel 8, Bootstrap, vue.js, chart.js。

* PHP >= 7.3
* BCMath PHP 拓展
* Ctype PHP 拓展
* Fileinfo PHP 拓展
* JSON PHP 拓展
* Mbstring PHP 拓展
* OpenSSL PHP 拓展
* PDO PHP 拓展
* Tokenizer PHP 拓展
* XML PHP 拓展

我的使用环境具体如下：
* Lrarvel 8
* MySQL 8.0.19
* nginx 1.20.0 
* PHP 7.4.19
* npm 6.4.13
* yarn 1.22.10
