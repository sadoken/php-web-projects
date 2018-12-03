<?php
//メール送信用プログラム
// ===========================

//フォームがすべて入力されていた場合
if(!empty($to) && !empty($subject) && !empty($comment)){

  //文字化けしないように設定
  mb_language("Japanese");//現在使っている言語を設定する
  mb_internal_encoding("UTF-8");//内部の日本語をどうエンコーディング(機械がわかる言語へ変換)するかを設定

  //メール送信準備
  $form = 'info@webukatu.com';

  //メールを送信（送信結果はtrueかfalseで帰ってくる）
  $result = mb_send_mail($to, $subject, $comment, 'From: '.$form);

  //送信結果を判定
  if($result){
    unset($_POST);
    $msg = 'メールが送信されました';
  }else{
    $msg = 'メールの送信に失敗しました';
  }
}else{
  $msg = 'すべて入力必須です';
}
?>
