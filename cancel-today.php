//tt����
//����a��

<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~sd/keiji.html");
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $todaytweet = date("n��j��");
  $year = date("Y�N");
  $sunday = date("w");
  $filepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel.txt";

$scancelitm = $html->find("body table",0)->innertext;
$scancelitm = str_replace("<br>", "", $scancelitm);
preg_match_all("</tr>",$scancelitm,$sconum);
$scoitm = count($sconum[0])-2;

echo "���ׂĂ̋x�u�f�[�^��: ".$scoitm."<br>";

     for ($sco = 0; $sco < $scoitm; $sco++) {
       $isco1 = $html->find("table",0)->find("td",0+$sco+($sco*5))->innertext;
       $isco1 = str_replace("�N0", "�N", $isco1);
// tt�^�O�����p
       $isco1 = str_replace("</tt>", "", $isco1);
       $isco1 = substr_replace($isco1,"", 0,6);
       $isco1 = str_replace("��", "/", $isco1);
       $isco1 = str_replace("/0", "/", $isco1);
       $isco1 = str_replace("��", " ", $isco1);
       $isco1 = str_replace("(��)", "", $isco1);
       $isco1 = str_replace("(/)", "", $isco1);
       $isco1 = str_replace("(��)", "", $isco1);
       $isco1 = str_replace("(��)", "", $isco1);
       $isco1 = str_replace("(��)", "", $isco1);
       $isco1 = str_replace("(��)", "", $isco1);
       $isco1 = str_replace("(�y)", "", $isco1);
       $isco1day = str_replace(" ", "", $isco1);
       if (!strcmp($isco1day,$today)) {
         $isco2 = $html->find("table",0)->find("td",1+$sco+($sco*5))->innertext;
         $isco3 = $html->find("table",0)->find("td",2+$sco+($sco*5))->innertext;
             $isco3 =  str_replace("�@", "[�ʐM��񏈗��R�[�X] ", $isco3);
             $isco3 =  str_replace("�A", "[��[�i�m�e�N�f�o�C�X�R�[�X] ", $isco3);
         $isco4 = $html->find("table",0)->find("td",4+$sco+($sco*5))->innertext;
         $isco4 = str_replace("�@", "", $isco4);
         $isco5 = $html->find("table",0)->find("td",3+$sco+($sco*5))->innertext;
         $isco6 = $html->find("table",0)->find("td",5+$sco+($sco*5))->innertext;
             $isco6 =  str_replace("<br>", "", $isco6);
         ${"lsco".$sco} = "�y�x�u�z���� >> ".$isco2."���@".$isco3."�i".$isco4."�@".$isco5."�j ".$isco6."\n";
             ${"lsco".$sco} =  str_replace("�@<br>", "", ${"lsco".$sco});
// tt�^�O�����p
             ${"lsco".$sco} =  str_replace("<tt>", "", ${"lsco".$sco});
             ${"lsco".$sco} =  str_replace("</tt>", "", ${"lsco".$sco});

         ${"lsco".$sco} = mb_convert_kana(${"lsco".$sco},"a","SJIS");
       echo ("${'lsco'.$sco}<br />\n");
       } else {}
     }

$lscohead = "�����A".$todaytweet."�̋x�u���i�ŐV�̏��� http://bit.ly/tcusclctr �Ŋm�F���Ă��������B�j";
$lenth_l1 = strlen($lsco0) + strlen($lsco1) + strlen($lsco2) + strlen($lsco3) + strlen($lsco4) + strlen($lsco5) + strlen($lsco6) + strlen($lsco7) + strlen($lsco8) + strlen($lsco9) + strlen($lsco10) + strlen($lsco11) + strlen($lsco11) + strlen($lsco12) + strlen($lsco13) + strlen($lsco14);
//// 10��15�i2013/9/24�j

 if ($lenth_l1 == 0) {
  $lsco0 = "�����̋x�u���͂���܂���B�i".$todaytweet."�j";
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