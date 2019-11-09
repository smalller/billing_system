<?php    
    error_reporting(0); //隐藏连接数据库失败的相关语句，避免泄露信息（必须放在连接数据库之前）
    //连接远程数据库
    $mysqli = new mysqli("127.0.0.1","root","","demo1"); //第一个参数表示主机名，第二个参数表示用户名，第三个参数表示登录密码，第四个参数表示数据库名

    //判断数据库是否连接成功
    if($mysqli->connect_errno) {
        // die($mysqli->connect_error);     //如果连接失败就打印出错误信息
        die("网站正在维护中......");
    }

    $mysqli->query("set names utf8");   //设定编码格式，要插入数据就要设置
?>