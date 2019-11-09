<?php include "sessionLogin.php";?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>关于 - 小账本</title>
    <link rel="stylesheet" href="../css/main_both.css">
    <link rel="stylesheet" href="../css/about.css">
    <link rel="shortcut icon" href="../img/logo.ico">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_1311816_oy57tkqxrn.css">
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
                    <li><a href="account.php">账户</a></li>
                    <li  id="bom"><a href="#">关于</a></li>
                </ul>
            </div>
            <div class="user">
                <ul>
                    <li>
                        <a href="#">
                            <div></div>
                            <span>
                                <?php echo $_SESSION["username"]; echo $_SESSION["telephone"]?>
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
                <div class="footer-add">蜀ICP备19010669号-1 | Copyright © 2019 小账本</div>
            </div>
        </footer>
    </div> 
</body>
</html>