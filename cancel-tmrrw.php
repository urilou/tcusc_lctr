<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~sd/keiji.html");
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $tmrrwtweet = date("n��j��",strtotime("+1 day"));
  $year = date("Y�N");
  $sunday = date("w");
  $filepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel.txt";

$scancelitm = $html->find("body table",0)->innertext;
$scancelitm = str_replace("<br>", "", $scancelitm);
preg_match_all("</tr>",$scancelitm,$scmnum);
$scmitm = count($scmnum[0])-2;

echo "���ׂĂ̋x�u�f�[�^��: ".$scmitm."<br>";

     for ($scm = 0; $scm < $scmitm; $scm++) {
       $iscm1 = $html->find("table",0)->find("td",0+$scm+($scm*5))->innertext;
       $iscm1 = str_replace("�N0", "�N", $iscm1);
       $iscm1 = str_replace("</tt>", "", $iscm1);
       $iscm1 = substr_replace($iscm1,"", 0,6);
       $iscm1 = str_replace("��", "/", $iscm1);
       $iscm1 = str_replace("/0", "/", $iscm1);
       $iscm1 = str_replace("��", " ", $iscm1);
       $iscm1 = str_replace("(��)", "", $iscm1);
       $iscm1 = str_replace("(/)", "", $iscm1);
       $iscm1 = str_replace("(��)", "", $iscm1);
       $iscm1 = str_replace("(��)", "", $iscm1);
       $iscm1 = str_replace("(��)", "", $iscm1);
       $iscm1 = str_replace("(��)", "", $iscm1);
       $iscm1 = str_replace("(�y)", "", $iscm1);
       $iscm1day = str_replace(" ", "", $iscm1);
       if (!strcmp($iscm1day,$tmrrw)) {
         $iscm2 = $html->find("table",0)->find("td",1+$scm+($scm*5))->innertext;
         $iscm3 = $html->find("table",0)->find("td",2+$scm+($scm*5))->innertext;
             $iscm3 =  str_replace("�@", "[�ʐM��񏈗��R�[�X] ", $iscm3);
             $iscm3 =  str_replace("�A", "[��[�i�m�e�N�f�o�C�X�R�[�X] ", $iscm3);
         $iscm4 = $html->find("table",0)->find("td",4+$scm+($scm*5))->innertext;
         $iscm4 = str_replace("�@", "", $iscm4);
         $iscm5 = $html->find("table",0)->find("td",3+$scm+($scm*5))->innertext;
         $iscm6 = $html->find("table",0)->find("td",5+$scm+($scm*5))->innertext;
             $iscm6 =  str_replace("<br>", "", $iscm6);
         ${"lscm".$scm} = "�y�x�u�z ".$iscm1.$iscm2."���@".$iscm3."�i".$iscm4."�@".$iscm5."�j ".$iscm6."\n";
             ${"lscm".$scm} =  str_replace("�@<br>", "", ${"lscm".$scm});
             ${"lscm".$scm} =  str_replace("<tt>", "", ${"lscm".$scm});
             ${"lscm".$scm} =  str_replace("</tt>", "", ${"lscm".$scm});
         ${"lscm".$scm} = mb_convert_kana(${"lscm".$scm},"a","SJIS");
       echo ("${'lscm'.$scm}<br />\n");
       } else {}
     }

$lscmhead = "�����A".$tmrrwtweet."�̋x�u���i�ŐV�̏��� http://bit.ly/tcusclctr �Ŋm�F���Ă��������B�j";
$lenth_l1 = strlen($lscm0) + strlen($lscm1) + strlen($lscm2) + strlen($lscm3) + strlen($lscm4) + strlen($lscm5) + strlen($lscm6) + strlen($lscm7) + strlen($lscm8) + strlen($lscm9)
 + strlen($lscm10) + strlen($lscm11) + strlen($lscm12) + strlen($lscm13) + strlen($lscm14) + strlen($lscm15) + strlen($lscm16) + strlen($lscm17) + strlen($lscm18) + strlen($lscm19);
// 10��15�i2013/9/24�j
// 15��20�i2014/6/10�j

 if ($lenth_l1 == 0) {
  $lscm0 = "�����̋x�u���͂���܂���B�i".$tmrrwtweet."�j";
  echo $lscm0."<br/>\n";
 } else {
 }

$tscmhead = mb_convert_encoding($lscmhead, "UTF-8", "SJIS");
for ($scm = 0; $scm < $scmitm; $scm++) {
${"tscm".$scm} = mb_convert_encoding(${"lscm".$scm}, "UTF-8", "SJIS");
}

$fpctm = fopen($filepath, "w");
stream_set_write_buffer($fpctm,0);
 $suncheck = strpos("6", $sunday);
  if ($suncheck !== false) {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, "");
  } else {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, $tscmhead."\n".$tscm0.$tscm1.$tscm2.$tscm3.$tscm4.$tscm5.$tscm6.$tscm7.$tscm8.$tscm9.$tscm10.$tscm11.$tscm12.$tscm13.$tscm14.$tscm15.$tscm16.$tscm17.$tscm18.$tscm19.$tscm20.$tscm21.$tscm22.$tscm23.$tscm24.$tscm25.$tscm26.$tscm27.$tscm28.$tscm29.$tscm30.$tscm31.$tscm32.$tscm33.$tscm34.$tscm35.$tscm36.$tscm37.$tscm38.$tscm39.$tscm40.$tscm41.$tscm42.$tscm43.$tscm44.$tscm45.$tscm46.$tscm47.$tscm48.$tscm49.$tscm50);
  }
fclose($fpctm);
?>