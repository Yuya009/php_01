<?php
// POSTの受け取り
$day = $_POST["day"];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post" action="write.php">
    <p>名前：<input type="text" name="name"></p>
    <p>Email：<input type="text" name="email"></p>
    <p>予約日：<input type="hidden" name="day" value="<?= $day ?>"><?= $day ?></p>
    <p><input type="submit" value="予約する"></p>
  </form>
  <a href="index.php">カレンダーに戻る</a>
  <a href="read.php">予約一覧</a>
</body>
</html>