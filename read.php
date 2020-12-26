<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
// ファイルを開く
$openFile = fopen('./text/text.txt', 'r');
// ファイル内容を1行ずつ読み込んで出力
while ($line = fgets($openFile)) {
  echo nl2br($line);
}
// ファイルを閉じる
fclose($openFile);
?>
  <a href="index.php">カレンダーに戻る</a>
</body>
</html>