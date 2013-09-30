<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~sd/keiji1.html");
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $tmrrwtweet = date("n月j日",strtotime("+1 day"));
  $year = date("Y年");
  $sunday = date("w");
  $filepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/extra.txt";

$seitm = $html->find("body table",0)->innertext;
$seitm = str_replace("<br>", "", $seitm);
preg_match_all("</tr>",$seitm,$semnum);
$semitm = count($semnum[0])-2;

echo "すべての補講データ数: ".$semitm."<br>";

     for ($sem = 0; $sem < $semitm; $sem++) {
       $isem1 = $html->find("table",0)->find("td",0+$sem+($sem*5))->innertext;
       $isem1 = str_replace("年0", "年", $isem1);
       $isem1 = substr_replace($isem1,"", 0,6);
       $isem1 = str_replace("月", "/", $isem1);
       $isem1 = str_replace("/0", "/", $isem1);
       $isem1 = str_replace("日", " ", $isem1);
       $isem1 = str_replace("(日)", "", $isem1);
       $isem1 = str_replace("(/)", "", $isem1);
       $isem1 = str_replace("(火)", "", $isem1);
       $isem1 = str_replace("(水)", "", $isem1);
       $isem1 = str_replace("(木)", "", $isem1);
       $isem1 = str_replace("(金)", "", $isem1);
       $isem1 = str_replace("(土)", "", $isem1);
       $isem1day = str_replace(" ", "", $isem1);
       if (!strcmp($isem1day,$tmrrw)) {
         $isem2 = $html->find("table",0)->find("td",1+$sem+($sem*5))->innertext;
         $isem3 = $html->find("table",0)->find("td",2+$sem+($sem*5))->innertext;
             $isem3 =  str_replace("①", "[通信情報処理コース] ", $isem3);
             $isem3 =  str_replace("②", "[先端ナノテクデバイスコース] ", $isem3);
         $isem4 = $html->find("table",0)->find("td",4+$sem+($sem*5))->innertext;
         $isem4 = str_replace("　", "", $isem4);
         $isem5 = $html->find("table",0)->find("td",3+$sem+($sem*5))->innertext;
         $isem6 = $html->find("table",0)->find("td",5+$sem+($sem*5))->innertext;
             $isem6 =  str_replace("<br>", "", $isem6);
         ${"lsem".$sem} = "【補講】 ".$isem1.$isem2."限　".$isem3."（".$isem4."　".$isem5."）".$isem6."\n";
             ${"lsem".$sem} =  str_replace("　<br>", "", ${"lsem".$sem});
         ${"lsem".$sem} = mb_convert_kana(${"lsem".$sem},"a","SJIS");
       echo ("${'lsem'.$sem}<br />\n");
       } else {}
     }

$lsemhead = "明日、".$tmrrwtweet."の補講情報（最新の情報は http://bit.ly/tcusclctr で確認してください。）";
$lenth_l1 = strlen($lsem0) + strlen($lsem1) + strlen($lsem2) + strlen($lsem3) + strlen($lsem4) + strlen($lsem5) + strlen($lsem6) + strlen($lsem7) + strlen($lsem8) + strlen($lsem9) + strlen($lsem10) + strlen($lsem11) + strlen($lsem12) + strlen($lsem13) + strlen($lsem14);

 if ($lenth_l1 == 0) {
  $lsem0 = "明日の補講情報はありません。（".$tmrrwtweet."）";
  echo $lsem0."<br/>\n";
 } else {
 }

$tsemhead = mb_convert_encoding($lsemhead, "UTF-8", "SJIS");
for ($sem = 0; $sem < $semitm; $sem++) {
${"tsem".$sem} = mb_convert_encoding(${"lsem".$sem}, "UTF-8", "SJIS");
}

$fpctm = fopen($filepath, "w");
stream_set_write_buffer($fpctm,0);
 $suncheck = strpos("6", $sunday);
  if ($suncheck !== false) {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, "");
  } else {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, $tsemhead."\n".$tsem0.$tsem1.$tsem2.$tsem3.$tsem4.$tsem5.$tsem6.$tsem7.$tsem8.$tsem9.$tsem10.$tsem11.$tsem12.$tsem13.$tsem14.$tsem15.$tsem16.$tsem17.$tsem18.$tsem19.$tsem20.$tsem21.$tsem22.$tsem23.$tsem24.$tsem25.$tsem26.$tsem27.$tsem28.$tsem29.$tsem30.$tsem31.$tsem32.$tsem33.$tsem34.$tsem35.$tsem36.$tsem37.$tsem38.$tsem39.$tsem40.$tsem41.$tsem42.$tsem43.$tsem44.$tsem45.$tsem46.$tsem47.$tsem48.$tsem49.$tsem50);
  }
fclose($fpctm);
?>