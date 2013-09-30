<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~sd/keiji1.html" );
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $todaytweet = date("n月j日");
  $year = date("Y年");
  $sunday = date("w");
  $time = date("H:i");
  $filepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/extra.txt";

$seitem = $html->find("body table",0)->innertext;
$seitem = str_replace("<br>", "", $seitem);
preg_match_all("</tr>",$seitem,$sennum);
$senitm = count($sennum[0])-2;
echo "すべての補講データ数: ".$senitm."<br>";

     for ($sen = 0; $sen < $senitm; $sen++) {
       $isen1 = $html->find("table",0)->find("td",0+$sen+($sen*5))->innertext;
       $isen1 = str_replace("年0", "年", $isen1);
       $isen1 = substr_replace($isen1,"", 0,6);
       $isen1 = str_replace("月", "/", $isen1);
       $isen1 = str_replace("/0", "/", $isen1);
       $isen1 = str_replace("日", " ", $isen1);
       $isen1 = str_replace("(日)", "", $isen1);
       $isen1 = str_replace("(/)", "", $isen1);
       $isen1 = str_replace("(火)", "", $isen1);
       $isen1 = str_replace("(水)", "", $isen1);
       $isen1 = str_replace("(木)", "", $isen1);
       $isen1 = str_replace("(金)", "", $isen1);
       $isen1 = str_replace("(土)", "", $isen1);
       $isen1day = str_replace(" ", "", $isen1);
//今日で実行を絞る
       if (!strcmp($isen1day,$today)) {
//2限で実行を絞る
           if (!strcmp("10:35",$time)) {
               echo "2限の補講情報を取得します";
               $isen2 = $html->find("table",0)->find("td",1+$sen+($sen*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($isen2,"2")) {
                   $isen3 = $html->find("table",0)->find("td",2+$sen+($sen*5))->innertext;
                       $isen3 =  str_replace("①", "[通信情報処理コース] ", $isen3);
                       $isen3 =  str_replace("②", "[先端ナノテクデバイスコース] ", $isen3);
                   $isen4 = $html->find("table",0)->find("td",4+$sen+($sen*5))->innertext;
                   $isen4 = str_replace("　", "", $isen4);
                   $isen5 = $html->find("table",0)->find("td",3+$sen+($sen*5))->innertext;
                   $isen6 = $html->find("table",0)->find("td",5+$sen+($sen*5))->innertext;
                       $isen6 =  str_replace("<br>", "", $isen6);
                   ${"lsen".$sen} = "【補講】つぎ >> ".$isen2."限　".$isen3."（".$isen4."　".$isen5."）".$isen6."\n";
                       ${"lsen".$sen} =  str_replace("　<br>", "", ${"lsen".$sen});
                   ${"lsen".$sen} = mb_convert_kana(${"lsen".$sen},"a","SJIS");
                 echo ("${'lsen'.$sen}<br />\n");
               } else {}
            } else {}

//3限で実行を絞る
           if (!strcmp("12:55",$time)) {
               echo "3限の補講情報を取得します";
               $isen2 = $html->find("table",0)->find("td",1+$sen+($sen*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($isen2,"3")) {
                   $isen3 = $html->find("table",0)->find("td",2+$sen+($sen*5))->innertext;
                       $isen3 =  str_replace("①", "[通信情報処理コース] ", $isen3);
                       $isen3 =  str_replace("②", "[先端ナノテクデバイスコース] ", $isen3);
                   $isen4 = $html->find("table",0)->find("td",4+$sen+($sen*5))->innertext;
                   $isen4 = str_replace("　", "", $isen4);
                   $isen5 = $html->find("table",0)->find("td",3+$sen+($sen*5))->innertext;
                   $isen6 = $html->find("table",0)->find("td",5+$sen+($sen*5))->innertext;
                       $isen6 =  str_replace("<br>", "", $isen6);
                   ${"lsen".$sen} = "【補講】つぎ >> ".$isen2."限　".$isen3."（".$isen4."　".$isen5."）".$isen6."\n";
                   ${"lsen".$sen} = mb_convert_kana(${"lsen".$sen},"a","SJIS");
                 echo ("${'lsen'.$sen}<br />\n");
               } else {}
            } else {}

//4限で実行を絞る
           if (!strcmp("14:40",$time)) {
               echo "4限の補講情報を取得します";
                $isen2 = $html->find("table",0)->find("td",1+$sen+($sen*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($isen2,"4")) {
                   $isen3 = $html->find("table",0)->find("td",2+$sen+($sen*5))->innertext;
                       $isen3 =  str_replace("①", "[通信情報処理コース] ", $isen3);
                       $isen3 =  str_replace("②", "[先端ナノテクデバイスコース] ", $isen3);
                   $isen4 = $html->find("table",0)->find("td",4+$sen+($sen*5))->innertext;
                   $isen4 = str_replace("　", "", $isen4);
                   $isen5 = $html->find("table",0)->find("td",3+$sen+($sen*5))->innertext;
                   $isen6 = $html->find("table",0)->find("td",5+$sen+($sen*5))->innertext;
                       $isen6 =  str_replace("<br>", "", $isen6);
                   ${"lsen".$sen} = "【補講】つぎ >> ".$isen2."限　".$isen3."（".$isen4."　".$isen5."）".$isen6."\n";
                   ${"lsen".$sen} = mb_convert_kana(${"lsen".$sen},"a","SJIS");
                 echo ("${'lsen'.$sen}<br />\n");
               } else {}
            } else {}

//5限で実行を絞る
           if (!strcmp("16:25",$time)) {
               echo "5限の補講情報を取得します";
                $isen2 = $html->find("table",0)->find("td",1+$sen+($sen*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($isen2,"5")) {
                   $isen3 = $html->find("table",0)->find("td",2+$sen+($sen*5))->innertext;
                       $isen3 =  str_replace("①", "[通信情報処理コース] ", $isen3);
                       $isen3 =  str_replace("②", "[先端ナノテクデバイスコース] ", $isen3);
                   $isen4 = $html->find("table",0)->find("td",4+$sen+($sen*5))->innertext;
                   $isen4 = str_replace("　", "", $isen4);
                   $isen5 = $html->find("table",0)->find("td",3+$sen+($sen*5))->innertext;
                   $isen6 = $html->find("table",0)->find("td",5+$sen+($sen*5))->innertext;
                       $isen6 =  str_replace("<br>", "", $isen6);
                   ${"lsen".$sen} = "【補講】つぎ >> ".$isen2."限　".$isen3."（".$isen4."　".$isen5."）".$isen6."\n";
                   ${"lsen".$sen} = mb_convert_kana(${"lsen".$sen},"a","SJIS");
                 echo ("${'lsen'.$sen}<br />\n");
               } else {}
            } else {}

//6限で実行を絞る
           if (!strcmp("18:10",$time)) {
               echo "6限の補講情報を取得します";
                $isen2 = $html->find("table",0)->find("td",1+$sen+($sen*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($isen2,"6")) {
                   $isen3 = $html->find("table",0)->find("td",2+$sen+($sen*5))->innertext;
                       $isen3 =  str_replace("①", "[通信情報処理コース] ", $isen3);
                       $isen3 =  str_replace("②", "[先端ナノテクデバイスコース] ", $isen3);
                   $isen4 = $html->find("table",0)->find("td",4+$sen+($sen*5))->innertext;
                   $isen4 = str_replace("　", "", $isen4);
                   $isen5 = $html->find("table",0)->find("td",3+$sen+($sen*5))->innertext;
                   $isen6 = $html->find("table",0)->find("td",5+$sen+($sen*5))->innertext;
                       $isen6 =  str_replace("<br>", "", $isen6);
                   ${"lsen".$sen} = "【補講】つぎ >> ".$isen2."限　".$isen3."（".$isen4."　".$isen5."）".$isen6."\n";
                   ${"lsen".$sen} = mb_convert_kana(${"lsen".$sen},"a","SJIS");
                 echo ("${'lsen'.$sen}<br />\n");
               } else {}
            } else {}

       } else {}
     }

for ($sen = 0; $sen < $senitm; $sen++) {
${"tsen".$sen} = mb_convert_encoding(${"lsen".$sen}, "UTF-8", "SJIS");
}

$fpctm = fopen($filepath, "w");
stream_set_write_buffer($fpctm,0);
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, $tsen0.$tsen1.$tsen2.$tsen3.$tsen4.$tsen5.$tsen6.$tsen7.$tsen8.$tsen9.$tsen10.$tsen11.$tsen12.$tsen13.$tsen14.$tsen15.$tsen16.$tsen17.$tsen18.$tsen19.$tsen20.$tsen21.$tsen22.$tsen23.$tsen24.$tsen25.$tsen26.$tsen27.$tsen28.$tsen29.$tsen30.$tsen31.$tsen32.$tsen33.$tsen34.$tsen35.$tsen36.$tsen37.$tsen38.$tsen39.$tsen40.$tsen41.$tsen42.$tsen43.$tsen44.$tsen45.$tsen46.$tsen47.$tsen48.$tsen49.$tsen50);
fclose($fpctm);
?>