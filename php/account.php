<?php
    include "sessionLogin.php";
    include "checkAccount.php";
?>

<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <title>账户 - 小账本</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main_both.css">
    <link rel="stylesheet" href="../css/account.css">
    <link rel="shortcut icon" href="../img/logo.ico">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_1311816_m57e5qcro3j.css">
</head>

<body>
    <header>
        <!-- 头部导航条 -->
        <div class="head-nav">
            <div class="logo"></div>
            <div class="nav">
                <ul>
                    <li><a href="main.php">概览</a></li>
                    <li><a href="bookkeep.php">记账</a></li>
                    <li id="bom"><a href="#" id="account">账户</a></li>
                    <!-- <li><a href="about.php">关于</a></li> -->
                </ul>
            </div>
            <div class="user">
                <ul>
                    <li>
                        <a href="#">
                            <div></div>
                            <span>
                                <?php echo $_SESSION["username"];
                                echo $_SESSION["telephone"] ?>
                            </span>
                            <span id="shu">|</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" title="退出">
                            <i class="iconfont icon-tuichu"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- 主体部分 -->
    <div class="main-box">
        <div class="bg"></div>
        <div class="main" id="main">
            <!-- 上边部分 -->
            <h2>账单详情</h2>
            <div class="top-box">
            <ul>
                    <li>
                        <p class="p-name">资产</p>
                        <p class="p-num"><?php echo $balance == '' ? '0.00' : ('￥'.$balance); ?></p>
                    </li>
                    <li>
                        <p class="p-name">流入</p>
                        <p class="p-num p-income"><?php echo $sum_income == '' ? '0.00' : '￥'.$sum_income; ?></p>
                    </li>
                    <li class="li-expend">
                        <p class="p-name">流出</p>
                        <p class="p-num p-expend"><?php echo $sum_expend == '' ? '0.00': '￥'.$sum_expend; ?></p>
                    </li>
                </ul>
            </div>

            <!-- 支出表格部分 -->
            <div class="expend-container">
                <h4><i class="iconfont icon-ico-jrcwsf"></i> 支出账单</h4>
                <table class="table table-hover">
                    <tr>
                        <th>序号</th>
                        <th>金额</th>
                        <th>分类</th>
                        <th>账户</th>
                        <th>备注</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>

                    <!-- 将数据库中的支出数据遍历到页面上 -->
                    <?php while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                        <?php
                            $expend = $row1["expend"];
                            $sort = $row1["sort"];
                            $account = $row1["account"];
                            $PS = mb_substr($row1["PS"],0,20,'utf-8');  //截取字符集，只显示20个字符
                            $date = $row1["date"];
                            $del = $row1["id"];                          
                        ?>
                        <?php echo "<tr>
                                        <td>$num</td>
                                        <td>{$expend}元</td>
                                        <td>$sort</td>
                                        <td>$account</td>
                                        <td title = '{$row1['PS']}'>$PS</td>
                                        <td>$date</td>
                                        <td><a href='delete.php?id1=$del'><i class='iconfont icon-shanchu' title='删除'></i></a></td>
                                    </tr>";
                            $num++;
                            mysqli_free_result($row1);  //清空结果集缓存
                        ?>
                    <?php } ?>
                </table>
                <a href="outputExce_expend.php" id='out'><i class="iconfont icon-daochuzhangdan"></i> 导出账单</a>
            </div>

            <!-- 收入表格部分 -->
            <div class="income-container">
                <h4><i class="iconfont icon-ico-jrcwss"></i> 收入账单</h4>
                <table class="table table-hover">
                    <tr>
                        <th>序号</th>
                        <th>金额</th>
                        <th>分类</th>
                        <th>账户</th>
                        <th>备注</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>

                    <!-- 将数据库中的收入数据遍历到页面上 -->
                    <?php while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                        <?php                      
                            $income = $row2["income"];
                            $sort2 = $row2["sort"];
                            $account2 = $row2["account"];
                            $PS2 = mb_substr($row2["PS"],0,20,'utf-8');   //截取字符集，只显示20个字符
                            $date2 = $row2["date"];
                            $del2 = $row2["id"];
                        ?>
                        <?php echo "<tr>
                                        <td>$num2</td>
                                        <td>{$income}元</td>
                                        <td>$sort2</td>
                                        <td>$account2</td>
                                        <td title = '{$row2['PS']}'>$PS2</td>
                                        <td>$date2</td>
                                        <td><a href='delete.php?id2=$del2'><i class='iconfont icon-shanchu' title='删除'></i></a></td>
                                    </tr>";
                            $num2++;
                            mysqli_free_result($row2);  //清空结果集缓存
                        ?>
                    <?php } ?>
                </table>
                <a href="outputExce_income.php" id='out'><i class="iconfont icon-daochuzhangdan"></i> 导出账单</a>
            </div>

        </div>

        <!-- 底部部分 -->
        <footer>
            <div class="container">
                <div class="footer-nav">
                    <div class="nav-left">
                        <ul class="first">
                            <li>产品</li>
                            <li>了解我们</li>
                            <li>关注我们</li>
                        </ul>
                        <ul class="second">
                            <li><a href="#">小账本ios</a></li>
                            <li><a href="#">小账本Android</a></li>
                        </ul>
                        <ul class="third">
                            <li><a href="#">关于我们</a></li>
                            <li><a href="#">联系我们</a></li>
                            <li><a href="#">加入我们</a></li>
                        </ul>
                        <ul class="fourth">
                            <li><a href="#">新浪微博</a></li>
                            <li><a href="#">百度贴吧</a></li>
                            <li><a href="#">微信公众号</a></li>
                        </ul>
                    </div>
                    <div class="nav-right">
                        <a href="tel:14781828227" class="tel"><i class="iconfont icon-dianhua"></i> 14781828227</a>
                        <ul>
                            <li><i class="iconfont icon-qq-copy"></i> 1203755476</li>
                            <li><i class="iconfont icon-weixin"></i> 14781828227</li>
                            <li><i class="iconfont icon-youxiang"></i> 1203755476@qq.com</li>
                        </ul>
                    </div>
                </div>
                <div class="footer-add">蜀ICP备19010669号 | Copyright © 2019 小账本</div>
            </div>
        </footer>
    </div>
</body>

</html>