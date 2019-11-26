<?php
    include "sql-conn.php";
    include "account.php";

    // 支出表删除数据
    $del_num1 = intval($_GET["id1"]);
    $sql1 = "delete from expend where id = $del_num1";
    $result1 = $mysqli->query($sql1);    

    // 收入表删除数据
    $del_num2 = intval($_GET["id2"]);
    $sql2 = "delete from income where id = $del_num2";
    $result2 = $mysqli->query($sql2);
    
    //删除成功后显示弹窗
    if($result1 || $result2) {
        loginAlert('删除成功','account.php');   //封装的弹窗函数
    }
?>