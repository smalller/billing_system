<?php
    include "sessionLogin.php";
    include "checkAccount.php";
    include "checkMain.php";
?>

<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <title>概览 - 小账本</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main_both.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/logo.ico">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_1311816_g1xexjudwin.css">
</head>

<body>
    <header>
        <!-- 头部导航条 -->
        <div class="head-nav">
            <div class="logo"></div>
            <div class="nav">
                <ul>
                    <li id="bom"><a href="#">概览</a></li>
                    <li><a href="bookkeep.php">记账</a></li>
                    <li><a href="account.php">账户</a></li>
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
        <div class="main">
            <!-- 上边部分 -->
            <h2>资产概况</h2>
            <div class="top-box">
                <ul>
                    <li>
                        <p class="p-name">余额</p>
                        <p class="p-num"><?php echo $balance == '' ? '0.00' : ('￥'.$balance); ?></p>
                    </li>
                    <li>
                        <p class="p-name">收入</p>
                        <p class="p-num p-income"><?php echo $sum_income == '' ? '0.00' : ('￥'.$sum_income); ?></p>
                    </li>
                    <li class="li-expend">
                        <p class="p-name">支出</p>
                        <p class="p-num p-expend"><?php echo $sum_expend == '' ? '0.00' : ('￥'.$sum_expend); ?></p>
                    </li>
                </ul>
            </div>

            <!-- 支出表格部分 -->
            <div class="expend-container">
                <h4><i class="iconfont icon-shouzhibiao"></i> 收支表</h4>
                <table class="table table-hover">
                    <tr>
                        <th>类型</th>
                        <th>今天</th>
                        <th>本周</th>
                        <th>本月</th>
                        <th>本年</th>
                    </tr>

                    <!-- 将数据库中的流入流出数据显示到页面上 -->
                    <?php echo
                        "<tr class='red'>
                            <td><i class='iconfont icon-ico-jrcwsf'></i> 支出</td><td>￥$t_e</td><td>￥$w_e</td><td>￥$m_e</td><td>￥$y_e</td>
                        </tr>
                        <tr class='green'>
                            <td><i class='iconfont icon-ico-jrcwss'></i> 收入</td><td>￥$t_i</td><td>￥$w_i</td><td>￥$m_i</td><td>￥$y_i</td>
                        </tr>";
                    ?>
                </table>
            </div>

            <!-- 简报部分 -->
            <div class="report">
                <h4><i class="iconfont icon-jianbao"></i> <?php echo date('20y年m月财务简报',time());?></h4>
                <p><i class="iconfont icon-shouzhi"></i> 本月收入 <span class="p-income"><?php echo $m_i?></span> 元，支出 <span class="p-expend"><?php echo $m_e?></span> 元 <span><?php echo $balance_m?></span></p>
                <p><i class="iconfont icon-jilu"></i> 本月您共记录 <span class="count"><?php echo $count?></span> 笔流水，其中收入 <span class="p-income"><?php echo $income_count?></span> 笔，支出 <span class="p-expend"><?php echo $expend_count?></span> 笔。</p>
            </div>

            <!-- 图表部分 -->
            <div class="chart">
                <div class="left-chart">
                    <h4><i class="iconfont icon-ico-jrcwsf"></i> 本月分类支出</h4>
                    <ul>
                        <li>
                            <label>日常购物</label>
                            <progress value="<?php echo $r1;?>" max="1" title="占本月总支出的<?php echo (($r1*100).'%')  == 'NAN%' ? '0%' : (($r1*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>日常餐费</label>
                            <progress value="<?php echo $r2;?>" max="1" title="占本月总支出的<?php echo (($r2*100).'%')  == 'NAN%' ? '0%' : (($r2*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>衣服饰品</label>
                            <progress value="<?php echo $r3;?>" max="1" title="占本月总支出的<?php echo (($r3*100).'%')  == 'NAN%' ? '0%' : (($r3*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>居家物业</label>
                            <progress value="<?php echo $r4;?>" max="1" title="占本月总支出的<?php echo (($r4*100).'%')  == 'NAN%' ? '0%' : (($r4*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>行车交通</label>
                            <progress value="<?php echo $r5;?>" max="1" title="占本月总支出的<?php echo (($r5*100).'%')  == 'NAN%' ? '0%' : (($r5*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>休闲娱乐</label>
                            <progress value="<?php echo $r6;?>" max="1" title="占本月总支出的<?php echo (($r6*100).'%')  == 'NAN%' ? '0%' : (($r6*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>医疗保健</label>
                            <progress value="<?php echo $r7;?>" max="1" title="占本月总支出的<?php echo (($r7*100).'%')  == 'NAN%' ? '0%' : (($r7*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>其他杂项</label>
                            <progress value="<?php echo $r8;?>" max="1" title="占本月总支出的<?php echo (($r8*100).'%')  == 'NAN%' ? '0%' : (($r8*100).'%');?>"></progress>
                        </li>
                    </ul>
                </div>
                <div class="right-chart">
                    <h4><i class="iconfont icon-ico-jrcwss"></i> 本月分类收入</h4>
                    <ul>
                        <li>
                            <label>工资收入</label>
                            <progress value="<?php echo $r9;?>" max="1" title="占本月总收入的<?php echo (($r9*100).'%')  == 'NAN%' ? '0%' : (($r9*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>投资收入</label>
                            <progress value="<?php echo $r10;?>" max="1" title="占本月总收入的<?php echo (($r10*100).'%')  == 'NAN%' ? '0%' : (($r10*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>兼职收入</label>
                            <progress value="<?php echo $r11;?>" max="1" title="占本月总收入的<?php echo (($r11*100).'%')  == 'NAN%' ? '0%' : (($r11*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>经营收入</label>
                            <progress value="<?php echo $r12;?>" max="1" title="占本月总收入的<?php echo (($r12*100).'%')  == 'NAN%' ? '0%' : (($r12*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>礼金收入</label>
                            <progress value="<?php echo $r13;?>" max="1" title="占本月总收入的<?php echo (($r13*100).'%')  == 'NAN%' ? '0%' : (($r13*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>奖金收入</label>
                            <progress value="<?php echo $r14;?>" max="1" title="占本月总收入的<?php echo (($r14*100).'%')  == 'NAN%' ? '0%' : (($r14*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>利息收入</label>
                            <progress value="<?php echo $r15;?>" max="1" title="占本月总收入的<?php echo (($r15*100).'%')  == 'NAN%' ? '0%' : (($r15*100).'%');?>"></progress>
                        </li>
                        <li>
                            <label>其他收入</label>
                            <progress value="<?php echo $r16;?>" max="1" title="占本月总收入的<?php echo (($r16*100).'%')  == 'NAN%' ? '0%' : (($r16*100).'%');?>"></progress>
                        </li>
                    </ul>
                </div>
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