<?php 
    include "sql-conn.php";

    //接收表单输入的数据
    $username = $_POST["username"];
    $username = strip_tags($username);  //禁止输入标签
    $password = $_POST["password"];

    //当点击登录时执行以下操作
    if(isset($_POST["login"])) {
        //验证用户数输入的数据是否有效
        if(strlen($username) < 1){
            $err = "请输入用户名";
            $i = "&#xe605;";
        } else if(strlen($password) < 1) {
            $err = "请输入密码";
            $i = "&#xe605;";
        } else {
            $err = "用户名或密码不正确";
            $i = "&#xe605;";
        }

         //当输入的值都不为空时
        if(!empty($username) && !empty($password)) {
            /**
             * 查询用户名和密码
             * sql防御操作(将输入的值与验证的值进行隔离，安全)
             */          
            $pre_stmt = $mysqli->prepare("select * from user where username = ? and password = ?");  //准备sql语句，外部接收到的值先以?替代
            $pre_stmt->bind_param("ss",$username,$password); //给上面的语句进行绑定参数，有几个参数，前面就有几个s 
            $pre_stmt->execute();   //执行sql语句
            $rs = $pre_stmt->get_result();  //将执行后拿到的结果赋给一个变量，在下面进行判断和判断

            //从结果集中读取数据，返回关联数组，以数据库中的字段作为数组的键名
            if($row = mysqli_fetch_assoc($rs)) {
                //若能提取到数据，就将数据存储在session服务器中
                session_start();    
                $_SESSION["username"] = $row["username"];
                $_SESSION["password"] = $row["password"];                
                header("Location: main.php");   //若验证成功，就跳转页面             
            }
            $pre_stmt->close(); //关闭sql查询
            $mysqli->close();   //关闭数据库
        }
    }  
?>
