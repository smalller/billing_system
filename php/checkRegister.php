<?php 
    include "sql-conn.php";
    $err = "";

    //验证接收输入的用户名
    function checkUsername($inputText) {
        $inputText = strip_tags($inputText);  //禁止输入标签
        return $inputText;
    }
    //验证接收输入的电话
    function checkPhoneno($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);    //替换输入的空格，第一个参数表示要替换的内容，第二个表示替换成什么，第三个表示要替换的对象 
        return $inputText;
    }
    //验证接收输入的密码
    function checkPassword($inputText) {
        $inputText = str_replace(" ","",$inputText);
        return $inputText;
    }

    //接收表单数据
    $username = htmlspecialchars(checkUsername($_POST["username"]));
    $phoneno = htmlspecialchars(checkPhoneno($_POST["phoneno"]));
    $password = htmlspecialchars(checkPassword($_POST["password"]));
    $password2 = htmlspecialchars(checkPassword($_POST["password2"]));

    
    //当点击注册时执行以下操作
    if(isset($_POST["register"])) {
        //验证用户数输入的数据是否有效
        if(strlen($username) < 1) {
            $err = "请输入用户名";
            $color = "red";
            $i = "&#xe605;";
        } else if(strlen($username) > 50 || strlen($username) < 5) {
            $err = "用户名长度应在5~20位之间";
            $color = "red";
            $i = "&#xe605;";
        } else if(!(strlen($phoneno) == 11) || preg_match("/[^0-9]/",$phoneno)) {
            $err = "请输入正确的手机号";
            $color = "red";
            $i = "&#xe605;";
        } else if($password != $password2) {
            $err = "两次输入的密码不一致";
            $color = "red";
            $i = "&#xe605;";
        } else if(preg_match("/[^A-Za-z0-9]/",$password)) {  //正则表达式限定规则
            $err = "密码只能由数字或字母组成";
            $color = "red";
            $i = "&#xe605;";
        } else if(strlen($password) > 20 || strlen($password) < 6) {
            $err = "密码的长度应在5~20位之间";
            $color = "red";
            $i = "&#xe605;";
        } else if(!empty($username) && !empty($phoneno) && !empty($password) && !empty($password2)) {  //当输入的值都不为空时      

            //查询用户名
            $pre_stmt = $mysqli->prepare("select * from user where username = ?");  //准备sql语句，外部接收到的值先以?替代
            $pre_stmt->bind_param("s",$username); //给上面的语句进行绑定参数
            $pre_stmt->execute();   //执行sql语句
            $rs = $pre_stmt->get_result();  //将执行后拿到的结果赋给一个变量，在下面进行相关判断

            //查询号码
            $pre_stmt2 = $mysqli->prepare("select * from user where telephone = ?");
            $pre_stmt2->bind_param("i",$phoneno); 
            $pre_stmt2->execute();
            $rs2 = $pre_stmt2->get_result();

            //如果查询到，就进行以下判断
            if((mysqli_num_rows($rs) >= 1)) {
                $err = "该用户已存在，请重新注册";
                $color = "red";
                $i = "&#xe605;";
            } else if((mysqli_num_rows($rs2) >= 1)) {
                $err = "该手机号已被注册，请换一个吧";
                $color = "red";
                $i = "&#xe605;";
            } else {
                //将输入的值插入到数据库中
                $pre_stmt = $mysqli->prepare("insert into user (username,password,telephone,today_expend,today_income,week_expend,week_income,month_expend,month_income,year_expend,year_income) values(?,?,?,'0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00')");  //准备sql语句，外部接收到的值先以?替代
                $pre_stmt->bind_param("ssi",$username,$password,$phoneno); //给上面的语句进行绑定参数

                //执行sql语句并进行判断
                if($pre_stmt->execute()) {
                    $err = "恭喜您，注册成功，页面即将跳转...";
                    $color = "#08e008";
                    $i = "&#xe612;";
                    header("Refresh:1.5;url=login.php");
                }else {
                    $err = "信息输入有误，请重新输入";
                    $i = "&#xe605;";
                }
               
                $pre_stmt->close(); //关闭数据库操作语句
                $mysqli->close();   //关闭数据库
            }   
        }    
    }
?>