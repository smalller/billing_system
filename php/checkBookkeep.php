<?php
    include "sql-conn.php";
    
    $username = $_SESSION["username"];

    //验证接收输入的金额函数
    function checkMoney($inputText) {
        $inputText = strip_tags($inputText);  //禁止输入标签
        $inputText = str_replace(" ","",$inputText);    //替换输入的空格，第一个参数表示要替换的内容，第二个表示替换成什么，第三个表示要替换的对象 
        return $inputText;
    }


    //接收表单数据（支出页）
    $expend        = htmlspecialchars(checkMoney($_POST["expend"]));
    $expendSort    = $_POST["expendSort"];
    $expendAccount = $_POST["expendAccount"];
    $expendDate    = $_POST["expendDate"];
    $expendPS      = $_POST["expendPS"];
  
    //当点击保存时，执行以下操作
    if(isset($_POST["saveExpend"])) {
        //验证用户数输入的数据是否有效
        if(strlen($expend) < 1){
            $err = "请输入金额";
            $i   = "&#xe605;";
        } else if(empty($expendDate)) {
            $err = "请选择时间";
            $i   = "&#xe605;";
        } else {
            //将输入的值插入到数据库中
            $pre_stmt = $mysqli->prepare("insert into expend (username,expend,sort,account,date,PS) values(?,?,?,?,?,?)");  //准备sql语句，外部接收到的值先以?替代
            $pre_stmt->bind_param("ssssss",$username,intval($expend),$expendSort,$expendAccount,$expendDate,$expendPS); //给上面的语句进行绑定参数，有几个参数，前面就有几个s 

            if($pre_stmt->execute()) {
                $err   = "保存成功";
                $color = "#08e008";
                $i     = "&#xe612;";
            } else {
                $err   = "保存失败，请重新尝试";
                $i     = "&#xe605;";
            }
        }
       
    }
  

    //接收表单数据（收入页）
    $income        = htmlspecialchars(checkMoney($_POST["income"]));
    $incomeSort    = $_POST["incomeSort"];
    $incomeAccount = $_POST["incomeAccount"];
    $incomeDate    = $_POST["incomeDate"];
    $incomePS      = $_POST["incomePS"];
  
    //当点击保存时，执行以下操作
    if(isset($_POST["saveIncome"])) {
        //JS实现防止收入页面被刷新掉
        echo "<script>
            window.onload = function() {
                let tab      = document.getElementById('tab');
                let tops     = tab.getElementsByTagName('li');
                let show_box = document.getElementById('show-box');
                let bots     = show_box.getElementsByTagName('li');

                bots[0].style.display = 'none';
                bots[1].style.display = 'block';
                tops[0].className     = 'none';
                tops[1].className     = 'show';
            }
        </script>";

        //验证用户数输入的数据是否有效
        if(strlen($income) < 1){
            $err1 = "请输入金额";
            $i1   = "&#xe605;";
        } else if(empty($incomeDate)) {
            $err1 = "请选择时间";
            $i1   = "&#xe605;";
        } else {
            //将输入的值插入到数据库中
            $pre_stmt1 = $mysqli->prepare("insert into income (username,income,sort,account,date,PS) values(?,?,?,?,?,?)");  //准备sql语句，外部接收到的值先以?替代
            $pre_stmt1->bind_param("ssssss",$username,intval($income),$incomeSort,$incomeAccount,$incomeDate,$incomePS); //给上面的语句进行绑定参数，有几个参数，前面就有几个s 

            if($pre_stmt1->execute()) {
                $err1   = "保存成功";
                $color1 = "#08e008";
                $i1     = "&#xe612;";
            } else {
                $err1   = "保存失败，请重新尝试";
                $i1     = "&#xe605;";
            }
        }
    }


?>