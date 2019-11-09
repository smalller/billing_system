<?php
    include "sql-conn.php";

    $num      = 1;   //支出序号
    $num2     = 1;   //收入序号
    $userName = $_SESSION["username"];  //获取当前用户

    
    //查询支出相关数据
    $sql1    = "select expend,sort,account,PS,date from expend where username = '$userName';";
    $result1 = $mysqli->query($sql1);

    // 查询收入相关数据
    $sql2    = "select income,sort,account,PS,date from income where username = '$userName';";
    $result2 = $mysqli->query($sql2);

    //查询支出金额总和
    $sql3       = "select round(sum(expend),2) from expend where username = '$userName';";
    $result3    = $mysqli->query($sql3);
    $row3       = mysqli_fetch_assoc($result3);
    $sum_expend = $row3["round(sum(expend),2)"];

    //查询收入金额总和
    $sql4       = "select round(sum(income),2) from income where username = '$userName';";
    $result4    = $mysqli->query($sql4);
    $row4       = mysqli_fetch_assoc($result4);
    $sum_income = $row4["round(sum(income),2)"];

    $balance = $sum_income - $sum_expend;   //剩余余额


?>