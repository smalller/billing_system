<?php
    include "sql-conn.php";

    $userName = $_SESSION["username"];  //获取当前用户



    // 查询当天支出总金额
    $sql5         = "select round(sum(expend),2) from expend where username = '$userName' and to_days(date) = to_days(now());";
    $result5      = $mysqli->query($sql5);
    $row5         = mysqli_fetch_assoc($result5);
    $today_expend = $row5["round(sum(expend),2)"];

    //将查询到的总金额插入到user表中，让前端页面进行调用
    if(strlen($today_expend) > 1) {
        $sq1 = "update user set today_expend = '$today_expend' where username = '$userName'";
        $rs1 = $mysqli->query($sq1);
    }


    // 查询本周支出总金额
    $sql6        = "select round(sum(expend),2) from expend where username = '$userName' and yearweek(date_format(date,'%Y-%m-%d'),1) = yearweek(now(),1);";
    $result6     = $mysqli->query($sql6);
    $row6        = mysqli_fetch_assoc($result6);
    $week_expend = $row6["round(sum(expend),2)"];

    //将查询到的总金额插入到user表中，让前端页面进行调用
    if(strlen($week_expend) > 1) {
        $sq2 = "update user set week_expend = '$week_expend' where username = '$userName'";
        $rs2 = $mysqli->query($sq2);
    }


    // 查询本月支出总金额
    $sql7         = "select round(sum(expend),2) from expend where username = '$userName' and date_format(date,'%Y%m') = date_format(curdate(),'%Y%m');";
    $result7      = $mysqli->query($sql7);
    $row7         = mysqli_fetch_assoc($result7);
    $month_expend = $row7["round(sum(expend),2)"];

    //将查询到的总金额插入到user表中，让前端页面进行调用
    if(strlen($month_expend) > 1) {
        $sq3 = "update user set month_expend = '$month_expend' where username = '$userName'";
        $rs3 = $mysqli->query($sq3);
    }


    // 查询本年支出总金额
    $sql8        = "select round(sum(expend),2) from expend where username = '$userName' and year(date) = year(now());";
    $result8     = $mysqli->query($sql8);
    $row8        = mysqli_fetch_assoc($result8);
    $year_expend = $row8["round(sum(expend),2)"];

    //将查询到的总金额插入到user表中，让前端页面进行调用
    if(strlen($year_expend) > 1) {
        $sq4 = "update user set year_expend = '$year_expend' where username = '$userName'";
        $rs4 = $mysqli->query($sq4);
    }




    // 查询当天收入总金额
    $sql9         = "select round(sum(income),2) from income where username = '$userName' and to_days(date) = to_days(now());";
    $result9      = $mysqli->query($sql9);
    $row9         = mysqli_fetch_assoc($result9);
    $today_income = $row9["round(sum(income),2)"];

    //将查询到的总金额插入到user表中，让前端页面进行调用
    if(strlen($today_income) > 1) {
        $sq5 = "update user set today_income = '$today_income' where username = '$userName'";
        $rs5 = $mysqli->query($sq5);
    }


    // 查询本周收入总金额
    $sql10        = "select round(sum(income),2) from income where username = '$userName' and yearweek(date_format(date,'%Y-%m-%d'),1) = yearweek(now(),1);";
    $result10     = $mysqli->query($sql10);
    $row10        = mysqli_fetch_assoc($result10);
    $week_income  = $row10["round(sum(income),2)"];

    //将查询到的总金额插入到user表中，让前端页面进行调用
    if(strlen($week_income) > 1) {
        $sq6 = "update user set week_income = '$week_income' where username = '$userName'";
        $rs6 = $mysqli->query($sq6);
    }


    // 查询本月收入总金额
    $sql11         = "select round(sum(income),2) from income where username = '$userName' and date_format(date,'%Y%m') = date_format(curdate(),'%Y%m');";
    $result11      = $mysqli->query($sql11);
    $row11         = mysqli_fetch_assoc($result11);
    $month_income  = $row11["round(sum(income),2)"];

    //将查询到的总金额插入到user表中，让前端页面进行调用
    if(strlen($month_income) > 1) {
        $sq7 = "update user set month_income = '$month_income' where username = '$userName'";
        $rs7 = $mysqli->query($sq7);
    }


    // 查询本年收入总金额
    $sql12        = "select round(sum(income),2) from income where username = '$userName' and year(date) = year(now());";
    $result12     = $mysqli->query($sql12);
    $row12        = mysqli_fetch_assoc($result12);
    $year_income  = $row12["round(sum(income),2)"];

    //将查询到的总金额插入到user表中，让前端页面进行调用
    if(strlen($year_income) > 1) {
        $sq8 = "update user set year_income = '$year_income' where username = '$userName'";
        $rs8 = $mysqli->query($sq8);
    }


    
    
    //查询当前用户的收支表数据（今天、本周、本月、本年）
    $sql = "select * from user where username = '$userName';";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_assoc($result);

    //获取支出部分
    $t_e = $row["today_expend"];
    $w_e = $row["week_expend"];
    $m_e = $row["month_expend"];
    $y_e = $row["year_expend"];
    //获取收入部分
    $t_i = $row["today_income"];
    $w_i = $row["week_income"];
    $m_i = $row["month_income"];
    $y_i = $row["year_income"];



    //判断本月收支是否平衡
    $balance_m = "";
    if($m_e > $m_i) {
        $balance_m = "，本月收支不平衡。";
    } else if($m_e < $m_i) {
        $balance_m = "，本月收支平衡。";
    } else {
        $balance_m = "";
    }



    // 查询本月支出总笔数
    $sql13         = "select count(expend) from expend where username = '$userName' and date_format(date,'%Y%m') = date_format(curdate(),'%Y%m');";
    $result13      = $mysqli->query($sql13);
    $row13         = mysqli_fetch_assoc($result13);
    $expend_count  = $row13["count(expend)"];

    // 查询本月收入总笔数
    $sql14         = "select count(income) from income where username = '$userName' and date_format(date,'%Y%m') = date_format(curdate(),'%Y%m');";
    $result14      = $mysqli->query($sql14);
    $row14         = mysqli_fetch_assoc($result14);
    $income_count  = $row14["count(income)"];

    //收入与支出笔数和
    $count = $expend_count + $income_count;



    
    /**
     * 查询本月分类支出
     * 创建构造函数，下面进行实例化（$GLOBALS['']表示将变量转换成超全局变量）
     */
    class Sort_expend {
        public function __construct($sort,$r) {   //构造函数必带的 __construct()
            $sql         = "select round(sum(expend),2) from expend where username = '$GLOBALS[userName]' and date_format(date,'%Y%m') = date_format(curdate(),'%Y%m') and sort = '$sort';";
            $result      = $GLOBALS['mysqli']->query($sql);
            $row         = mysqli_fetch_assoc($result);
            $GLOBALS[$r] = round((($row["round(sum(expend),2)"]) / $GLOBALS['m_e']),2);  //四舍五入取整，保留两位小数，并且将其赋给一个超全局变量
        }
    }
    
    //构造实例化对象
    $sort_expend1 = new Sort_expend('日常购物','r1');
    $Sort_expend2 = new Sort_expend('日常餐费','r2');
    $Sort_expend3 = new Sort_expend('衣服饰品','r3');
    $Sort_expend4 = new Sort_expend('居家物业','r4');
    $Sort_expend5 = new Sort_expend('行车交通','r5');
    $Sort_expend6 = new Sort_expend('休闲娱乐','r6');
    $Sort_expend7 = new Sort_expend('医疗保健','r7');
    $Sort_expend8 = new Sort_expend('其他杂项','r8');



    /**
     * 查询本月分类收入
     * 创建构造函数，下面进行实例化（$GLOBALS['']表示将变量转换成超全局变量）
     */
    class Sort_income {
        public function __construct($sort,$r) {   //构造函数必带的 __construct()
            $sql         = "select round(sum(income),2) from income where username = '$GLOBALS[userName]' and date_format(date,'%Y%m') = date_format(curdate(),'%Y%m') and sort = '$sort';";
            $result      = $GLOBALS['mysqli']->query($sql);
            $row         = mysqli_fetch_assoc($result);
            $GLOBALS[$r] = round((($row["round(sum(income),2)"]) / $GLOBALS['m_i']),2);  //四舍五入取整，保留两位小数，并且将其赋给一个超全局变量
        }
    }
    
    //构造实例化对象
    $Sort_income1 = new Sort_income('工资收入','r9');
    $Sort_income2 = new Sort_income('投资收入','r10');
    $Sort_income3 = new Sort_income('兼职收入','r11');
    $Sort_income4 = new Sort_income('经营收入','r12');
    $Sort_income5 = new Sort_income('礼金收入','r13');
    $Sort_income6 = new Sort_income('奖金收入','r14');
    $Sort_income7 = new Sort_income('利息收入','r15');
    $Sort_income8 = new Sort_income('其他收入','r16');

?>