<?php include "checkLogin.php"?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>小账本 - 账本虽小，五账俱全！</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/iconfont.css">
    <link rel="shortcut icon" href="../img/logo.ico">
</head>
<body>
    <!-- 头部 -->
    <header>
        <!-- 头部导航条 -->
        <div class="head-nav">
            <a href="../index.php" class="logo" title="首页"></a>
        </div>
    </header>

    <!-- 主体 -->
    <div class="container">
        <div class="bg">
            <div class="main">
                <div class="loginForm">
                    <!-- 登录表单 -->
                    <form action="login.php" method="POST">
                        <div class="form-top">
                            <a href="#" class="login">登录</a>
                            <a href="register.php" class="register">注册</a>
                        </div>
                        <div class="input-text">
                            <input type="text" name="username" id="username" placeholder="用户名" value="<?php echo isset($_POST["username"]) ? $username : ''; ?>">
                            <input type="password" name="password" id="password" placeholder="密码" value="<?php echo isset($_POST["password"]) ? $password : ''; ?>">
                        </div>
                        <div class="findPasswd">
                            <span>
                                <i class="iconfont"><?php echo $i;?></i>
                                <?php echo $err;?>
                            </span>                     
                            <!-- <a href="">忘记密码</a> -->
                        </div>
                        <button type="submit" class="submit" name="login">登 录</button>
                    </form>
                </div>
            </div>           
        </div>      
    </div>

    <!-- 备案信息 -->
    <footer>
        蜀ICP备19010669号-1 | Copyright © 2019 小账本
    </footer>
    
</body>
</html>