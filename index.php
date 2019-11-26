<!DOCTYPE html>
<html lang="zh">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>小账本 - 开启记账新生活</title>
  <link rel="shortcut icon" href="img/logo.ico">
  <link rel="stylesheet" href="css/subtle-slideshow.css">
  <style>
    body,
    ul,
    li,
    p {
      padding: 0;
      margin: 0;
      font: 14px/1.5 "Helvetica Neue", Helvetica, Arial, "Microsoft Yahei", "Hiragino Sans GB", "Heiti SC", "WenQuanYi Micro Hei", sans-serif;
    }

    a {
      text-decoration: none;
      color: #000;
    }

    ul,
    li {
      list-style: none;
    }

    .header {
      position: absolute;
      left: 0;
      top: 0;
      z-index: 2;
      height: 120px;
      width: 100%;
    }

    .header .container {
      height: 120px;
      width: 80%;
      margin: 0 auto
    }

    .header .logo {
      float: left;
      height: 120px;
      width: 100px;
      background: url(img/1.svg) no-repeat 50% 50%;
      background-size: 230%;
    }

    .static-content {
      padding: 20px;
    }

    h1.title {
      font-family: sans-serif;
      margin: 0;
      position: absolute;
      bottom: 20px;
      color: white;
      text-shadow: 0 2px 4px rgba(0, 0, 0, .4);
    }

    .slide {
      cursor: auto;
    }

    .wrapper {
      position: absolute;
      left: 0;
      top: 20%;
      width: 100%;
      text-align: center;
      z-index: 2;
    }

    .wrapper .word {
      width: 600px;
      height: 200px;
      background: url(img/word.jpg) no-repeat 0 0;
      background-size: auto;
      display: inline-block;
      text-align: center;
      background-size: 600px;
    }

    .wrapper a {
      display: block;
      height: 60px;
      width: 250px;
      font-size: 24px;
      color: #fff;
      margin: 30px auto 0;
      line-height: 60px;
      text-align: center;
      background-color: transparent;
      border: 2px solid #fff;
      border-radius: 5px;
      transition: all 0.4s;
    }

    .wrapper a:hover {
      background: #fff;
      color: #00b6fe;
    }

    .container .box {
      height: 120px;
      width: 300px;
      float: right;
      line-height: 120px;

    }

    .box a {
      display: block;
      float: right;
      width: 90px;
      height: 35px;
      line-height: 35px;
      text-align: center;
      font-size: 18px;
      color: #fff;
      border: 1px solid black;
      background-color: transparent;
      border: 2px solid #fff;
      border-radius: 5px;
      transition: all 0.4s;
      margin: 48px 20px 0 0;
    }

    .box a:hover {
      background: #fff;
      color: #00b6fe;
    }

    footer {
      position: absolute;
      bottom: 0;
      color: #fff;
      height: 40px;
      width: 100%;
      min-width: 1226px;
      text-align: center;
    }
  </style>
</head>

<body>

  <div id="slides">
    <a class="slide" href="#">
      <span class="animate down" style="background-image: url(img/index_1.png)"></span>
    </a>
    <a class="slide" href="#">
      <span class="animate in" style="background-image: url(img/index_1.jpg)"></span>
    </a>
    <a class="slide" href="#">
      <span class="animate down" style="background-image: url(img/index_3.png)"></span>
    </a>
  </div>
  <div class="wrapper">
    <div class="word"></div>
    <a href="php/login.php">开启记账新生活</a>
  </div>

  <div class="header">
    <div class="container">
      <div class="logo"></div>
      <div class="box">
        <a href="php/login.php">登录</a>
        <a href="php/register.php">注册</a>
      </div>
    </div>
  </div>
  <footer>
    蜀ICP备19010669号 | Copyright © 2019 小账本
  </footer>

  <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
  <script src="js/jquery.subtle-slideshow.js"></script>
  <script>
    // These are te default settings.
    $('#slides').slideshow({
      randomize: true, // Randomize the play order of the slides.
      slideDuration: 4500, // Duration of each induvidual slide.
      fadeDuration: 1000, // Duration of the fading transition. Should be shorter than slideDuration.
      animate: true, // Turn css animations on or off.
      pauseOnTabBlur: true, // Pause the slideshow when the tab is out of focus. This prevents glitches with setTimeout().
      enableLog: false // Enable log messages to the console. Useful for debugging.
    });
  </script>
</body>

</html>