//tt消去
//西暦→和暦

<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~sd/keiji.html");
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $todaytweet = date("n月j日");
  $year = date("Y年");
  $sunday = date("w");
  $filepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel.txt";

$scancelitm = $html->find("body table",0)->innertext;
$scancelitm = str_replace("<br>", "", $scancelitm);
preg_match_all("</tr>",$scancelitm,$sconum);
$scoitm = count($sconum[0])-2;

echo "すべての休講データ数: ".$scoitm."<br>";

     for ($sco = 0; $sco < $scoitm; $sco++) {
       $isco1 = $html->find("table",0)->find("td",0+$sco+($sco*5))->innertext;
       $isco1 = str_replace("年0", "年", $isco1);
// ttタグ消去用
       $isco1 = str_replace("</tt>", "", $isco1);
       $isco1 = substr_replace($isco1,"", 0,6);
       $isco1 = str_replace("月", "/", $isco1);
       $isco1 = str_replace("/0", "/", $isco1);
       $isco1 = str_replace("日", " ", $isco1);
       $isco1 = str_replace("(日)", "", $isco1);
       $isco1 = str_replace("(/)", "", $isco1);
       $isco1 = str_replace("(火)", "", $isco1);
       $isco1 = str_replace("(水)", "", $isco1);
       $isco1 = str_replace("(木)", "", $isco1);
       $isco1 = str_replace("(金)", "", $isco1);
       $isco1 = str_replace("(土)", "", $isco1);
       $isco1day = str_replace(" ", "", $isco1);
       if (!strcmp($isco1day,$today)) {
         $isco2 = $html->find("table",0)->find("td",1+$sco+($sco*5))->innertext;
         $isco3 = $html->find("table",0)->find("td",2+$sco+($sco*5))->innertext;
             $isco3 =  str_replace("①", "[通信情報処理コース] ", $isco3);
             $isco3 =  str_replace("②", "[先端ナノテクデバイスコース] ", $isco3);
         $isco4 = $html->find("table",0)->find("td",4+$sco+($sco*5))->innertext;
         $isco4 = str_replace("　", "", $isco4);
         $isco5 = $html->find("table",0)->find("td",3+$sco+($sco*5))->innertext;
         $isco6 = $html->find("table",0)->find("td",5+$sco+($sco*5))->innertext;
             $isco6 =  str_replace("<br>", "", $isco6);
         ${"lsco".$sco} = "【休講】今日 >> ".$isco2."限　".$isco3."（".$isco4."　".$isco5."） ".$isco6."\n";
             ${"lsco".$sco} =  str_replace("　<br>", "", ${"lsco".$sco});
// ttタグ消去用
             ${"lsco".$sco} =  str_replace("<tt>", "", ${"lsco".$sco});
             ${"lsco".$sco} =  str_replace("</tt>", "", ${"lsco".$sco});

         ${"lsco".$sco} = mb_convert_kana(${"lsco".$sco},"a","SJIS");
       echo ("${'lsco'.$sco}<br />\n");
       } else {}
     }

$lscohead = "今日、".$todaytweet."の休講情報（最新の情報は http://bit.ly/tcusclctr で確認してください。）";
$lenth_l1 = strlen($lsco0) + strlen($lsco1) + strlen($lsco2) + strlen($lsco3) + strlen($lsco4) + strlen($lsco5) + strlen($lsco6) + strlen($lsco7) + strlen($lsco8) + strlen($lsco9) + strlen($lsco10) + strlen($lsco11) + strlen($lsco11) + strlen($lsco12) + strlen($lsco13) + strlen($lsco14);
//// 10→15（2013/9/24）

 if ($lenth_l1 == 0) {
  $lsco0 = "今日の休講情報はありません。（".$todaytweet."）";
  echo $lsco0."<br/>\n";
 } else {
 }

$tscohead = mb_convert_encoding($lscohead, "UTF-8", "SJIS");
for ($sco = 0; $sco < $scoitm; $sco++) {
${"tsco".$sco} = mb_convert_encoding(${"lsco".$sco}, "UTF-8", "SJIS");
}

$fpctm = fopen($filepath, "w");
stream_set_write_buffer($fpctm,0);
 $suncheck = strpos("0", $sunday);
  if ($suncheck !== false) {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, "");
  } else {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, $tscohead."\n".$tsco0.$tsco1.$tsco2.$tsco3.$tsco4.$tsco5.$tsco6.$tsco7.$tsco8.$tsco9.$tsco10.$tsco11.$tsco12.$tsco13.$tsco14.$tsco15.$tsco16.$tsco17.$tsco18.$tsco19.$tsco20.$tsco21.$tsco22.$tsco23.$tsco24.$tsco25.$tsco26.$tsco27.$tsco28.$tsco29.$tsco30.$tsco31.$tsco32.$tsco33.$tsco34.$tsco35.$tsco36.$tsco37.$tsco38.$tsco39.$tsco40.$tsco41.$tsco42.$tsco43.$tsco44.$tsco45.$tsco46.$tsco47.$tsco48.$tsco49.$tsco50);
  }
fclose($fpctm);
?>