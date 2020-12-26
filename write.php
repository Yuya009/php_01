<?php
function h($value) {
  return htmlspecialchars($value,ENT_QUOTES);
}
// 入力チェック
if(!isset($_POST["name"]) || $_POST["name"]=="") {
  exit("ParameError!name!");
}
if(!isset($_POST["email"]) || $_POST["email"]=="") {
  exit("ParameError!email!");
}
// POSTの受け取り
$name   = $_POST["name"];
$email  = $_POST["email"];
$day  = $_POST["day"];
//ファイルに書き込み
$time = date('Y年m月d日 H:i:s');
$file = fopen('./text/text.txt', 'a');
fwrite($file, $time.' / '.$name.' / '.$email.' / '.$day."（予約日）". "\n");
fclose($file);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File書き込み</title>
</head>
<body>
  <h1><?= $day ?>に予約しました。</h1>
  <a href="index.php">カレンダーに戻る</a>
  <a href="read.php">予約一覧</a>
</body>
</html>