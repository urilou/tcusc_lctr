<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~sd/keiji1.html");
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $todaytweet = date("n��j��");
  $year = date("Y�N");
  $sunday = date("w");
  $filepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/extra.txt";

$seitm = $html->find("body table",0)->innertext;
$seitm = str_replace("<br>", "", $seitm);
preg_match_all("</tr>",$seitm,$seonum);
$seoitm = count($seonum[0])-2;

echo "���ׂĂ̕�u�f�[�^��: ".$seoitm."<br>";

     for ($seo = 0; $seo < $seoitm; $seo++) {
       $iseo1 = $html->find("table",0)->find("td",0+$seo+($seo*5))->innertext;
       $iseo1 = str_replace("�N0", "�N", $iseo1);
       $iseo1 = substr_replace($iseo1,"", 0,6);
       $iseo1 = str_replace("��", "/", $iseo1);
       $iseo1 = str_replace("/0", "/", $iseo1);
       $iseo1 = str_replace("��", " ", $iseo1);
       $iseo1 = str_replace("(��)", "", $iseo1);
       $iseo1 = str_replace("(/)", "", $iseo1);
       $iseo1 = str_replace("(��)", "", $iseo1);
       $iseo1 = str_replace("(��)", "", $iseo1);
       $iseo1 = str_replace("(��)", "", $iseo1);
       $iseo1 = str_replace("(��)", "", $iseo1);
       $iseo1 = str_replace("(�y)", "", $iseo1);
       $iseo1day = str_replace(" ", "", $iseo1);

       if (!strcmp($iseo1day,$today)) {
         $iseo2 = $html->find("table",0)->find("td",1+$seo+($seo*5))->innertext;
         $iseo3 = $html->find("table",0)->find("td",2+$seo+($seo*5))->innertext;
             $iseo3 =  str_replace("�@", "[�ʐM��񏈗��R�[�X] ", $iseo3);
             $iseo3 =  str_replace("�A", "[��[�i�m�e�N�f�o�C�X�R�[�X] ", $iseo3);
         $iseo4 = $html->find("table",0)->find("td",4+$seo+($seo*5))->innertext;
         $iseo4 = str_replace("�@", "", $iseo4);
         $iseo5 = $html->find("table",0)->find("td",3+$seo+($seo*5))->innertext;
         $iseo6 = $html->find("table",0)->find("td",5+$seo+($seo*5))->innertext;
             $iseo6 =  str_replace("<br>", "", $iseo6);
         ${"lseo".$seo} = "�y��u�z���� >> ".$iseo2."���@".$iseo3."�i".$iseo4."�@".$iseo5."�j".$iseo6."\n";
             ${"lseo".$seo} =  str_replace("�@<br>", "", ${"lseo".$seo});
         ${"lseo".$seo} = mb_convert_kana(${"lseo".$seo},"a","SJIS");
       echo ("${'lseo'.$seo}<br />\n");
       } else {}
     }

$lseohead = "�����A".$todaytweet."�̕�u���i�ŐV�̏��� http://bit.ly/tcusclctr �Ŋm�F���Ă��������B�j";
$lenth_l1 = strlen($lseo0) + strlen($lseo1) + strlen($lseo2) + strlen($lseo3) + strlen($lseo4) + strlen($lseo5) + strlen($lseo6) + strlen($lseo7) + strlen($lseo8) + strlen($lseo9)
 + strlen($lseo10) + strlen($lseo11) + strlen($lseo12) + strlen($lseo13) + strlen($lseo14) + strlen($lseo15) + strlen($lseo16) + strlen($lseo17) + strlen($lseo18) + strlen($lseo19);

 if ($lenth_l1 == 0) {
  $lseo0 = "�����̕�u���͂���܂���B�i".$todaytweet."�j";
  echo $lseo0."<br/>\n";
 } else {
 }

$tseohead = mb_convert_encoding($lseohead, "UTF-8", "SJIS");
for ($seo = 0; $seo < $seoitm; $seo++) {
${"tseo".$seo} = mb_convert_encoding(${"lseo".$seo}, "UTF-8", "SJIS");
}

$fpctm = fopen($filepath, "w");
stream_set_write_buffer($fpctm,0);
 $suncheck = strpos("0", $sunday);
  if ($suncheck !== false) {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, "");
  } else {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, $tseohead."\n".$tseo0.$tseo1.$tseo2.$tseo3.$tseo4.$tseo5.$tseo6.$tseo7.$tseo8.$tseo9.$tseo10.$tseo11.$tseo12.$tseo13.$tseo14.$tseo15.$tseo16.$tseo17.$tseo18.$tseo19.$tseo20.$tseo21.$tseo22.$tseo23.$tseo24.$tseo25.$tseo26.$tseo27.$tseo28.$tseo29.$tseo30.$tseo31.$tseo32.$tseo33.$tseo34.$tseo35.$tseo36.$tseo37.$tseo38.$tseo39.$tseo40.$tseo41.$tseo42.$tseo43.$tseo44.$tseo45.$tseo46.$tseo47.$tseo48.$tseo49.$tseo50);
  }
fclose($fpctm);
?>