<?php
include 'ChromePhp.php';
error_reporting(E_ALL); //E_STRICTレベル以外のエラーを警告する
ini_set('display_errors','On');//画面にエラーを表示させるか

//1.ファイルが送信されていた場合
if(!empty($_FILES)){
  //フォームから送信されたファイルを受信
  $file = $_FILES['image'];

  //メッセージ表示用と画像表示用変数を用意
  $msg = '';
  $img_path = '';

  //画像アップロードプログラム（外部ファイル）を読み込む
  include('upload.php');
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
      .img_area, .img_area img{
        width: 100%;
      }
    </style>
  </head>
  <body>
    <p><?php if(!empty($msg)) echo $msg; ?></p>
    <h1>Fileupload</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="image">
      <input type="submit" value="Upload">
    </form>
    <?php if(!empty($img_path)){ ?>
      <div class="img_area">
        <p>Uploaded Image</p>
        <img src="<?php echo $img_path; ?>" >
      </div>
    <?php } ?>
  </body>
</html>
