<?php include "checkRegister.php"?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>小账本 - 账本虽小，五账俱全！</title>
    <link rel="stylesheet" href="../css/register.css">
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
                    <!-- 注册表单 -->
                    <form action="" method="POST">
                        <div class="form-top">
                            <a href="login.php" class="login">登录</a>
                            <a href="#" class="register">注册</a>
                        </div>
                        <div class="input-text">
                            <input type="text" name="username" placeholder="用户名" value="<?php echo isset($_POST["username"]) ? $username : ''; ?>">
                            <input type="text" name="phoneno" placeholder="手机号" value="<?php echo isset($_POST["phoneno"]) ? $phoneno : ''; ?>">
                            <input type="password" name="password" placeholder="密码" value="<?php echo isset($_POST["password"]) ? $password : ''; ?>">                         
                            <input type="password" name="password2" placeholder="确认密码" value="<?php echo isset($_POST["password2"]) ? $password2 : ''; ?>">
                        </div>
                        <span style="color:<?php echo $color;?>">
                            <i class="iconfont"><?php echo $i;?></i>
                            <?php echo $err;?>
                        </span> 
                        <button type="submit" class="submit" name="register">注 册</button>
                    </form>
                </div>
            </div>           
        </div>      
    </div>

    <!-- 备案信息 -->
    <footer>
        蜀ICP备19010669号 | Copyright © 2019 小账本
    </footer>
</body>
</html>