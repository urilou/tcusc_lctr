<?php
// 全体制御用プログラム
// ヘッダー
date_default_timezone_set("Asia/Tokyo");
$day = date("m-d");
$hour = date("H");
$min = date("i");
$calendar = @file_get_contents("/home/users/1/mods.jp-usi/web/tcusc_lctr/calendar.txt");


//天気情報（5分以下の間隔で実行）
  passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/weather.php");
  passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-weather.php");

//8:00に天気情報
  $hourchecktoday = strpos("08", $hour);
  if ($hourchecktoday !== false) {
    $mincheckcanceltoday = strpos("00", $min);
    if ($mincheckcanceltoday !== false) {

    //天気情報を取得
    passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/weather.php");
    //天気情報をツイート
     for ($i = 0; $i <= 1; $i++) {
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-weather.php");
     }
    } else {}
  } else {}

//大学設定の休校日を判定する
if (preg_match("/$day/", $calendar)) {
    echo "大学設定の休校日です";
} else {

//21:00に明日の休講・補講情報
  $hourchecktmrrw = strpos("20", $hour);
  if ($hourchecktmrrw !== false) {
    $mincheckcanceltoday = strpos("00", $min);
    if ($mincheckcanceltoday !== false) {
      //明日の休講と補講情報を取得し出力する
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/cancel-tmrrw.php");
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/extra-tmrrw.php");

  $filecm="/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel.txt";//明日の休講が保存されたテキストファイル
  $fdcm = file($filecm);
  $cntcm =sizeof($fdcm);//行数を取得

  $fileem="/home/users/1/mods.jp-usi/web/tcusc_lctr/extra.txt"; //明日の補講が保存されたテキストファイル
  $fdem = file($fileem);
  $cntem =sizeof($fdem);//行数を取得

     for ($i = 1; $i <= $cntcm; $i++) {
      echo $cntcm;//休講用
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-cancel.php");
     }

     for ($i = 1; $i <= $cntem; $i++) {
      echo $cntem;//補講用
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-extra.php");
     }
    } else {}
  } else {}

//8:00に今日の休講・補講情報
  $hourchecktoday = strpos("08", $hour);
  if ($hourchecktoday !== false) {
    $mincheckcanceltoday = strpos("00", $min);
    if ($mincheckcanceltoday !== false) {

    //今日の休講と補講情報を取得し出力する
    passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/cancel-today.php");
    passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/extra-today.php");

  $fileco="/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel.txt"; //今日の休講
  $fdco = file($fileco);
  $cntco =sizeof($fdco);
  echo $cntco;

  $fileeo="/home/users/1/mods.jp-usi/web/tcusc_lctr/extra.txt"; //今日の補講
  $fdeo = file($fileeo);
  $cnteo =sizeof($fdeo);
  echo $cnteo;

     for ($i = 1; $i <= $cntco; $i++) {
      echo $cntco;//休講用
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-cancel.php");
     }

     for ($i = 1; $i <= $cnteo; $i++) {
      echo $cnteo;//補講用
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-extra.php");
     }

    } else {}
  } else {}

//2限前の休講補講
  $hourchecktoday = strpos("10", $hour);
  if ($hourchecktoday !== false) {
    $mincheckcanceltoday = strpos("35", $min);
    if ($mincheckcanceltoday !== false) {
      //休講と補講情報を取得し出力する
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/cancel-next.php");
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/extra-next.php");
      //休講
      $filec="/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel.txt";
      $fdc = file($filec);
      $cntc =sizeof($fdc);
       echo $cntc;
      //補講
      $filee="/home/users/1/mods.jp-usi/web/tcusc_lctr/extra.txt";
      $fde = file($filee);
      $cnte =sizeof($fde);
       echo $cnte;
      for ($i = 1; $i <= $cntc; $i++) {
        echo $cntc;//休講用
        passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-cancel.php");}
      for ($i = 1; $i <= $cnte; $i++) {
        echo $cnte;//補講用
        passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-extra.php");}
    } else {}
  } else {}

//3限前の休講補講
  $hourchecktoday = strpos("12", $hour);
  if ($hourchecktoday !== false) {
    $mincheckcanceltoday = strpos("55", $min);
    if ($mincheckcanceltoday !== false) {
      //休講と補講情報を取得し出力する
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/cancel-next.php");
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/extra-next.php");
      //休講
      $filec="/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel.txt";
      $fdc = file($filec);
      $cntc =sizeof($fdc);
       echo $cntc;
      //補講
      $filee="/home/users/1/mods.jp-usi/web/tcusc_lctr/extra.txt";
      $fde = file($filee);
      $cnte =sizeof($fde);
       echo $cnte;
      for ($i = 1; $i <= $cntc; $i++) {
        echo $cntc;//休講用
        passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-cancel.php");}
      for ($i = 1; $i <= $cnte; $i++) {
        echo $cnte;//補講用
        passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-extra.php");}
    } else {}
  } else {}

//4限前の休講補講
  $hourchecktoday = strpos("14", $hour);
  if ($hourchecktoday !== false) {
    $mincheckcanceltoday = strpos("40", $min);
    if ($mincheckcanceltoday !== false) {
      //休講と補講情報を取得し出力する
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/cancel-next.php");
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/extra-next.php");
      //休講
      $filec="/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel.txt";
      $fdc = file($filec);
      $cntc =sizeof($fdc);
       echo $cntc;
      //補講
      $filee="/home/users/1/mods.jp-usi/web/tcusc_lctr/extra.txt";
      $fde = file($filee);
      $cnte =sizeof($fde);
       echo $cnte;
      for ($i = 1; $i <= $cntc; $i++) {
        echo $cntc;//休講用
        passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-cancel.php");}
      for ($i = 1; $i <= $cnte; $i++) {
        echo $cnte;//補講用
        passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-extra.php");}
    } else {}
  } else {}

//5限前の休講補講
  $hourchecktoday = strpos("16", $hour);
  if ($hourchecktoday !== false) {
    $mincheckcanceltoday = strpos("25", $min);
    if ($mincheckcanceltoday !== false) {
      //休講と補講情報を取得し出力する
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/cancel-next.php");
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/extra-next.php");
      //休講
      $filec="/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel.txt";
      $fdc = file($filec);
      $cntc =sizeof($fdc);
       echo $cntc;
      //補講
      $filee="/home/users/1/mods.jp-usi/web/tcusc_lctr/extra.txt";
      $fde = file($filee);
      $cnte =sizeof($fde);
       echo $cnte;
      for ($i = 1; $i <= $cntc; $i++) {
        echo $cntc;//休講用
        passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-cancel.php");}
      for ($i = 1; $i <= $cnte; $i++) {
        echo $cnte;//補講用
        passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-extra.php");}
    } else {}
  } else {}

//6限前の休講補講
  $hourchecktoday = strpos("18", $hour);
  if ($hourchecktoday !== false) {
    $mincheckcanceltoday = strpos("10", $min);
    if ($mincheckcanceltoday !== false) {
      //休講と補講情報を取得し出力する
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/cancel-next.php");
      passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/extra-next.php");
      //休講
      $filec="/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel.txt";
      $fdc = file($filec);
      $cntc =sizeof($fdc);
       echo $cntc;
      //補講
      $filee="/home/users/1/mods.jp-usi/web/tcusc_lctr/extra.txt";
      $fde = file($filee);
      $cnte =sizeof($fde);
       echo $cnte;
      for ($i = 1; $i <= $cntc; $i++) {
        echo $cntc;//休講用
        passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-cancel.php");}
      for ($i = 1; $i <= $cnte; $i++) {
        echo $cnte;//補講用
        passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-extra.php");}
    } else {}
  } else {}
}

//新着休講・新着補講情報（ツイートプログラムはbot-other.php）
  passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/cancel-new.php");
  passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/extra-new.php");
  passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/tcu-new.php");

//bot-other.phpの繰り返し実行
    $fileCancelnew = file("/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel-new.txt");
    $sizeCancelnew =sizeof($fileCancelnew);
    echo "<br>Size of cancel-new.txt: ".$sizeCancelnew;

    $fileExtranew = file("/home/users/1/mods.jp-usi/web/tcusc_lctr/extra-new.txt");
    $sizeExtranew =sizeof($fileExtranew);
    echo "<br>Size of extra-new.txt: ".$sizeExtranew;

    $fileOimachi = file("/home/users/1/mods.jp-usi/web/tcusc_lctr/oimachi.txt");
    $sizeOimachi =sizeof($fileOimachi);
    echo "<br>Size of oimachi.txt: ".$sizeOimachi;

    $fileToyoko = file("/home/users/1/mods.jp-usi/web/tcusc_lctr/toyoko.txt");
    $sizeToyoko =sizeof($fileToyoko);
    echo "<br>Size of toyoko.txt: ".$sizeToyoko;

    $bototherruntime = $sizeCancelnew + $sizeExtranew + $sizeOimachi + $sizeToyoko;
    echo "<br>bot-other run: ".$bototherruntime;

//運行情報やその他の情報
  passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/oimachi.php");
  passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/toyoko.php");
  passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/weather.php");
  passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-weather.php");
//  passthru("/usr/local/php5.3/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/keihintohoku.php");

    for ($i = 0 ; $i < $bototherruntime ; $i++) {
        passthru("/usr/local/php5.4/bin/php /home/users/1/mods.jp-usi/web/tcusc_lctr/bot-other.php");
    }

?>