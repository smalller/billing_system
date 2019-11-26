<?php 
    include "sessionLogin.php"; 
    include "checkBookkeep.php";
?>

<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <title>记账 - 小账本</title>
    <link rel="stylesheet" href="../css/main_both.css">
    <link rel="stylesheet" href="../css/bookkeep.css">
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
                    <li id="bom"><a href="#">记账</a></li>
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
                                <?php echo $_SESSION["username"];?>
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
            <div class="top-nav">
                <ul id="tab">
                    <li class="show">支出</li>
                    <span>丨</span>
                    <li>收入</li>
                </ul>
            </div>

            <!-- 中间表单盒子部分 -->
            <div class="main-container">
                <ul id="show-box">
                    <!-- 支出部分 -->
                    <li id="expend">
                        <h3>支出填报</h3>
                        <div class="main-part">
                            <form action="bookkeep.php" method="POST" name="form1">
                                <table>
                                    <tr>
                                        <td>
                                            <span>金额</span>
                                        </td>
                                        <td>
                                            <input type="text" name="expend" placeholder="单位 / 元" value="<?php echo isset($_POST["expend"]) ? $expend : ''; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>分类</span>
                                        </td>
                                        <td>
                                            <select name="expendSort">
                                                <option selected>日常购物</option>
                                                <option>衣服饰品</option>
                                                <option>日常餐费</option>
                                                <option>居家物业</option>
                                                <option>行车交通</option>
                                                <option>休闲娱乐</option>
                                                <option>医疗保健</option>
                                                <option>其他杂项</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>账户</span>
                                        </td>
                                        <td>
                                            <select name="expendAccount">
                                                <option selected>现金</option>
                                                <option>支付宝</option>
                                                <option>微信</option>
                                                <option>银行卡</option>
                                                <option>信用卡</option>
                                                <option>余额宝</option>
                                                <option>零钱通</option>
                                                <option>基金</option>
                                                <option>股票</option>
                                                <option>其他</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>时间</span>
                                        </td>
                                        <td>
                                            <input type="date" name="expendDate" placeholder="格式如：2019-11-02">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>备注</span>
                                        </td>
                                        <td>
                                            <textarea name="expendPS"><?php echo isset($_POST["expendPS"]) ? $expendPS : ''; ?></textarea>
                                        </td>
                                    </tr>

                                </table>
                                <span class="err" style="color:<?php echo $color;?>">
                                    <i class="iconfont"><?php echo $i;?></i>
                                    <?php echo $err; ?>
                                </span>
                                <button type="submit" name="saveExpend">保 存</button>
                            </form>
                        </div>
                    </li>

                    <!-- 收入部分 -->
                    <li id="income">
                        <h3>收入填报</h3>
                        <div class="main-part">
                            <form action="bookkeep.php" method="POST" name="form2">
                                <table>
                                    <tr>
                                        <td>
                                            <span>金额</span>
                                        </td>
                                        <td>
                                            <input type="text" name="income" placeholder="单位 / 元" value="<?php echo isset($_POST["income"]) ? $income : ''; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>分类</span>
                                        </td>
                                        <td>
                                            <select name="incomeSort">
                                                <option selected>工资收入</option>
                                                <option>投资收入</option>
                                                <option>兼职收入</option>
                                                <option>经营收入</option>
                                                <option>礼金收入</option>
                                                <option>奖金收入</option>
                                                <option>利息收入</option>
                                                <option>其他收入</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>账户</span>
                                        </td>
                                        <td>
                                            <select name="incomeAccount">
                                                <option selected>现金</option>
                                                <option>支付宝</option>
                                                <option>微信</option>
                                                <option>银行卡</option>
                                                <option>信用卡</option>
                                                <option>余额宝</option>
                                                <option>零钱通</option>
                                                <option>基金</option>
                                                <option>股票</option>
                                                <option>其他</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>时间</span>
                                        </td>
                                        <td>
                                            <input type="date" name="incomeDate" placeholder="格式如：2019-11-02">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>备注</span>
                                        </td>
                                        <td>
                                            <textarea name="incomePS"><?php echo isset($_POST["incomePS"]) ? $incomePS : ''; ?></textarea>
                                        </td>
                                    </tr>

                                </table>
                                <span class="err" style="color:<?php echo $color1;?>">
                                    <i class="iconfont"><?php echo $i1;?></i>
                                    <?php echo $err1; ?>
                                </span>
                                <button type="submit" name="saveIncome">保 存</button>
                            </form>
                        </div>
                    </li>
                </ul>
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
    <script src="../js/bookkeep.js"></script>
</body>

</html>