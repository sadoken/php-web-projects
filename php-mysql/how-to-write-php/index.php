<?php
$str = 'html内にこの文字が表示されます！ブラウザで表示してみるとphpプログラムは見えません！';
 ?>
 <!DOCTYPE html>
 <html lang="ja" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>title</title>
   </head>
   <body>
     <h1>Lets make PHP program</h1>
     <p><?php echo $str; ?></p>
   </body>
 </html>
