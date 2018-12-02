<?php
include 'ChromePhp.php';
error_reporting(E_ALL); //E_STRICTレベル以外のエラーを警告する
ini_set('display_errors','On');//画面にエラーを表示させるか

session_start();
 ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <style media="screen">
      body{
        margin: 0 auto;
        padding: 150px;
        width: 25%;
        background: #fbfbfa;
      }
      h1{
        color: #545454;
        font-size: 20px;
      }
      a{
        color: #545454;
        display: block;
      }
      a:hover{
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <?php if(!empty($_SESSION['login'])){ ?>
    <h1>My Page</h1>
    <section>
      <p>
        Your email address is info@webkatu.com. <br/>
        Your password is password.
      </p>
      <a href="index.php">SignUp</a>
    </section>
  <?php }else{ ?>
    <p>You cant watch this page without Login</p>
  <?php } ?>
  </body>
</html>
