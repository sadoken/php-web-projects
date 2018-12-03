<?php
include 'ChromePhp.php';
error_reporting(E_ALL); //E_STRICTレベル以外のエラーを警告する
ini_set('display_errors','On');//画面にエラーを表示させるか

//1.post送信されていた場合
if(!empty($_POST)){
  //本来は最初にバリデーションを行うが、今回は省略
  // define('MSG01','入力必須です');
  // define('MSG02','Emailの形式で入力してください');
  // define('MSG03','passwordがあっていません');
  // define('MSG04','半角英数字のみご利用いただけます');
  // define('MSG05','6文字以上で入力してください');

  // // $err_flg = false;
  // $err_msg = array();
  //
  // //2.フォームが入力されていない場合
  // if (empty($_POST['email'])) {
  //   $err_msg['email'] = MSG01;
  // }
  // if (empty($_POST['pass'])) {
  //   $err_msg['pass'] = MSG01;
  // }
  // if (empty($_POST['pass_retype'])) {
  //   $err_msg['pass_retype'] = MSG01;
  // }
  //
  // if (empty($err_msg)) {
  //   //変数にユーザー情報を代入
  //   $email = $_POST['email'];
  //   $pass = $_POST['pass'];
  //   $pass_re = $_POST['pass_retype'];
  //
  //   //3.emailの形式でない場合
  //   if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)){
  //     $err_msg['email'] = MSG02;
  //   }
  //   //4.パスワードとパスワード再入力があっていない場合
  //   if ($pass !== $pass_re) {
  //     $err_msg['pass'] = MSG03;
  //   }
  //   if (empty($err_msg['pass'])) {
  //     //5.パスワードとパスワード再入力が半角英数字でない場合
  //     if (!preg_match("/^[a-zA-Z0-9]+$/", $pass)) {
  //       $err_msg['pass'] = MSG04;
  //     }elseif(mb_strlen($pass) < 6){
  //       //6.パスワードとパスワード再入力が6文字以上ではない場合
  //       $err_msg['pass'] = MSG05;
  //     }
  //     if(empty($err_msg)){
  //       //DBへの接続準備
  //       $dsn = 'mysql:dbname=php_user_registration; host=localhost; charset=utf8';
  //       $user = 'root';
  //       $password = 'root';
  //       $options = array(
  //         //SQL実行時に例外をスロー
  //         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  //         //デフォルトフェッチモードを連想配列形式に設定
  //         PDO::ATTR_ERRMODE => PDO::FETCH_ASSOC,
  //         //バッファードクエリを使う（一度に結果セットをすべて取得し、サーバー負荷を軽減）
  //         //SERECTで得た結果に対してもrawCountメソッドを使えるようにする
  //         PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
  //       );
  //       //PDOオブジェクト生成（DBへ接続）
  //       $dbh = new PDO($dsn, $user, $password, $options);
  //       //SQL文(クエリ作成)
  //       $stmt = $dbh->prepare('INSERT INTO users (email, pass, login_time) VALUES (:email, :pass, :login_time)');
  //       //プレースホルダに値をセットし、SQL文を実行
  //       $stmt->execute(array(':email' => $email, ':pass' => $pass, ':login_time' => date('Y-m-d H:i:s')));
  //
  //       header("Location:mypage.php");
  //     }
  //   }
  // }

  //変数にユーザー情報を代入
  $to = $_POST['email'];
  $subject = $_POST['subject'];
  $comment = $_POST['comment'];

  //メッセージ表示用の変数を用意
  $msg = '';

  //メール送信プログラム（外部phpファイル）を読みこむ
  include('mail.php');
}
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <style>
      body{
        margin:0 auto;
        padding: 150px;
        width: 25%;
        background: #fbfbfa;
      }
      h1{
        color: #545454;
        font-size: 20px;
      }
      form{
        overflow: hidden;
      }
      textarea{
      color: #EF0D0D;
      height: 200px;
      width: 100%;
      padding: 5px 10px;
      font-size: 16px;
      display: block;
      margin-bottom: 10px;
      box-sizing: border-box;
      }
      input[type="text"]{
        color: #545454;
        height: 60px;
        width: 100%;
        padding: 5px 10px;
        font-size: 16px;
        display: block;
        margin-bottom: 10px;
        box-sizing: border-box;
      }
      input[type="password"]{
        color: #545454;
        height: 60px;
        width: 100%;
        padding: 5px 10px;
        font-size: 16px;
        display: block;
        margin-bottom: 10px;
        box-sizing: border-box;
      }
      input[type="submit"]{
        border: none;
        padding: 15px 30px;
        margin-bottom: 15px;
        background: #3d3938;
        color: white;
        float: right;
      }
      input[type="submit"]:hover{
        background: #111;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <p><?php if(!empty($msg)) echo $msg; ?></p>
    <h1>Contact</h1>
    <form action="" method="post">
      <input type="text" name="email" placeholder="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>">
      <input type="text" name="subject" placeholder="subject" value="<?php if(!empty($_POST['subject'])) echo $_POST['subject']; ?>">
      <textarea name="comment" placeholder="comment" value="<?php if(!empty($_POST['comment'])) echo $_POST['comment']; ?>"></textarea>
      <input type="submit" value="Go">
    </form>
  </body>
</html>
