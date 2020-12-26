<?php
// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

//表示させる年月を設定（現在の月）
$year = date('Y');
$month = date('m');

//月末日を取得
$end_month = date('t',strtotime($year.$month.'01'));
//1日の曜日を取得
$first_week = date('w',strtotime($year.$month.'01'));
//月末日の曜日を取得
$last_week = date('w',strtotime($year.$month.$end_month));

$aryCalendar = [];
$j = 0;

//1日開始曜日までの穴埋め
for($i = 0; $i < $first_week; $i++) {
  $aryCalendar[$j][] = '';
}

//1日から月末日までループ
for($i = 1; $i <= $end_month; $i++) {
  //日曜日まで進んだら改行
  if(isset($aryCalendar[$j]) && count($aryCalendar[$j]) === 7) {
    $j++;
  }
  $aryCalendar[$j][] = $i;
}

//月末曜日の穴埋め
for($i = count($aryCalendar[$j]); $i < 7; $i++) {
  $aryCalendar[$j][] = '';
}

$aryWeek = ['日','月','火','水','木','金','土'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css?v=2">
  <link rel="stylesheet" href="./css/reset.css">
  <title>予約システム</title>
</head>
<body>
  <table class="calendar">
    <?= $year."年".$month."月" ?>
    <!-- 曜日の表示 -->
    <tr>
      <?php foreach($aryWeek as $week) { ?>
        <th><?= $week ?></th>
        <?php } ?>
    </tr>
    <!-- 日数の表示 -->
    <?php foreach($aryCalendar as $tr){ ?>
    <tr>
      <?php foreach($tr as $td){ ?>
        <?php if($td != date('j')){ ?>
          <?php if($td <= date('j')) { ?>
            <td>
              <?= $td ?>
            </td>
            <?php }else{ ?>
            <td>
              <?= $td?>
              <form method="post" action="post.php">
                <input type="submit" value="予約する">
                <input type="hidden" name="day" value="<?= $year."年".$month."月".$td."日" ?>">
              </form>
            </td>
          <?php } ?>
        <?php }else{ ?>
          <!-- 今日の日付 -->
          <td class="today">
            <?= $td?>
          </td>
        <?php } ?>
      <?php } ?>
    </tr>
    <?php } ?>
  </table>
  <a href="read.php">予約一覧</a>
</body>
</html>