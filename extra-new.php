<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~sd/keiji1.html" );
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $tmrrwtweet = date("n月j日",strtotime("+1 day"));
  $sunday = date("w");
  $tweetfilepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/extra-new.txt";
  $oldatfilepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/extra-all.txt";

$itmnum = $html->find("body table",0)->innertext;
$itmnum = str_replace("<br>", "", $itmnum);
preg_match_all("</tr>",$itmnum,$cmnum);
$cmcn = count($cmnum[0])-1;
echo "すべての補講データ数: ".$cmcn."<br>";

     for ($cm = 0; $cm < $cmcn; $cm++) {
       $icm0 = $html->find("table",0)->find("td",0+$cm+($cm*5))->innertext;
       $icm1 = $html->find("table",0)->find("td",0+$cm+($cm*5))->innertext;
       $icm1 = str_replace("年0", "年", $icm1);
       $icm1 = str_replace("</tt>", "", $icm1);
       $icm1 = substr_replace($icm1,"", 0,6);
       $icm1 = str_replace("月", "/", $icm1);
       $icm1 = str_replace("/0", "/", $icm1);
       $icm1 = str_replace("日", " ", $icm1);
       $icm1 = str_replace("(日)", "", $icm1);
       $icm1 = str_replace("(/)", "", $icm1);
       $icm1 = str_replace("(火)", "", $icm1);
       $icm1 = str_replace("(水)", "", $icm1);
       $icm1 = str_replace("(木)", "", $icm1);
       $icm1 = str_replace("(金)", "", $icm1);
       $icm1 = str_replace("(土)", "", $icm1);
       $icm1day = str_replace(" ", "", $icm1);
         $icm2 = $html->find("table",0)->find("td",1+$cm+($cm*5))->innertext;
         $icm3 = $html->find("table",0)->find("td",2+$cm+($cm*5))->innertext;
             $icm3 =  str_replace("①", "[通信情報処理コース] ", $icm3);
             $icm3 =  str_replace("②", "[先端ナノテクデバイスコース] ", $icm3);
         $icm4 = $html->find("table",0)->find("td",4+$cm+($cm*5))->innertext;
         $icm4 = str_replace("　", "", $icm4);
         $icm5 = $html->find("table",0)->find("td",3+$cm+($cm*5))->innertext;
         $icm6 = $html->find("table",0)->find("td",5+$cm+($cm*5))->innertext;
             $ism6 =  str_replace("<br>", "", $icm6);
         ${"lcm".$cm} = "[新着]【補講】".$icm1.$icm2."限　".$icm3."（".$icm4."　".$icm5."）"."\n";

${"lcm".$cm} = str_replace("<tt>", "", ${"lcm".$cm});
${"lcm".$cm} = str_replace("</tt>", "", ${"lcm".$cm});

         ${"lcm".$cm} = mb_convert_kana(${"lcm".$cm},"a","SJIS");
         ${"lcm".$cm} = mb_convert_encoding(${"lcm".$cm}, "UTF-8", "SJIS");
     }

//新休講情報を全件取得
$fruit = array($lcm0,$lcm1,$lcm2,$lcm3,$lcm4,$lcm5,$lcm6,$lcm7,$lcm8,$lcm9,$lcm10,$lcm11,$lcm12,$lcm13,$lcm14,$lcm15,$lcm16,$lcm17,$lcm18,$lcm19,$lcm20,$lcm21,$lcm22,$lcm23,$lcm24,$lcm25,$lcm26,$lcm27,$lcm28,$lcm29,$lcm30,$lcm31,$lcm32,$lcm33,$lcm34,$lcm35,$lcm36,$lcm37,$lcm38,$lcm39,$lcm40,$lcm41,$lcm42,$lcm43,$lcm44,$lcm45,$lcm46,$lcm47,$lcm48,$lcm49,$lcm50);
echo $fruit;

//旧休講情報を全件取得
$array = file($oldatfilepath);

//デバッグ表示用
print_r($fruit);
echo "<br>";
print_r($array);
echo "<br>";

$diff = array_diff($fruit,$array);
    while(list($key,$val) = each($diff)) {
    print $val. "<br>\n";
   }

//差分データの書き込み
$fpctm = fopen($tweetfilepath, "w");
stream_set_write_buffer($fpctm,0);
 {
  foreach ($diff as $a){
  fputs($fpctm, $a);
  }}
fclose($fpctm);

//データ格納
$fpctm = fopen($oldatfilepath, "w");
stream_set_write_buffer($fpctm,0);
 {
  foreach ($fruit as $a){
  fputs($fpctm, $a);
  }}
fclose($fpctm);

?>