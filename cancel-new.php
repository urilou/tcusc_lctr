<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~sd/keiji.html" );
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $tmrrwtweet = date("n��j��",strtotime("+1 day"));
  $sunday = date("w");
  $tweetfilepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel-new.txt";
  $oldatfilepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel-all.txt";

$itmnum = $html->find("body table",0)->innertext;
$itmnum = str_replace("<br>", "", $itmnum);
preg_match_all("</tr>",$itmnum,$cmnum);
$cmcn = count($cmnum[0])-1;
echo "���ׂĂ̋x�u�f�[�^��: ".$cmcn."<br>";

     for ($cm = 0; $cm < $cmcn; $cm++) {
       $icm0 = $html->find("table",0)->find("td",0+$cm+($cm*5))->innertext;
       $icm1 = $html->find("table",0)->find("td",0+$cm+($cm*5))->innertext;
       $icm1 = str_replace("�N0", "�N", $icm1);
       $icm1 = str_replace("</tt>", "", $icm1);
       $icm1 = substr_replace($icm1,"", 0,6);
       $icm1 = str_replace("��", "/", $icm1);
       $icm1 = str_replace("/0", "/", $icm1);
       $icm1 = str_replace("��", " ", $icm1);
       $icm1 = str_replace("(��)", "", $icm1);
       $icm1 = str_replace("(/)", "", $icm1);
       $icm1 = str_replace("(��)", "", $icm1);
       $icm1 = str_replace("(��)", "", $icm1);
       $icm1 = str_replace("(��)", "", $icm1);
       $icm1 = str_replace("(��)", "", $icm1);
       $icm1 = str_replace("(�y)", "", $icm1);
       $icm1day = str_replace(" ", "", $icm1);
         $icm2 = $html->find("table",0)->find("td",1+$cm+($cm*5))->innertext;
         $icm3 = $html->find("table",0)->find("td",2+$cm+($cm*5))->innertext;
             $icm3 =  str_replace("�@", "[�ʐM��񏈗��R�[�X] ", $icm3);
             $icm3 =  str_replace("�A", "[��[�i�m�e�N�f�o�C�X�R�[�X] ", $icm3);
         $icm4 = $html->find("table",0)->find("td",4+$cm+($cm*5))->innertext;
         $icm4 = str_replace("�@", "", $icm4);
         $icm5 = $html->find("table",0)->find("td",3+$cm+($cm*5))->innertext;
         $icm6 = $html->find("table",0)->find("td",5+$cm+($cm*5))->innertext;
             $icm6 =  str_replace("<br>", "", $icm6);
         ${"lcm".$cm} = "[�V��]�y�x�u�z".$icm1.$icm2."���@".$icm3."�i".$icm4."�@".$icm5."�j".$isco6."\n";

${"lcm".$cm} = str_replace("<tt>", "", ${"lcm".$cm});
${"lcm".$cm} = str_replace("</tt>", "", ${"lcm".$cm});

         ${"lcm".$cm} = mb_convert_kana(${"lcm".$cm},"a","SJIS");
         ${"lcm".$cm} = mb_convert_encoding(${"lcm".$cm}, "UTF-8", "SJIS");
     }

//�V�x�u����S���擾
$fruit = array($lcm0,$lcm1,$lcm2,$lcm3,$lcm4,$lcm5,$lcm6,$lcm7,$lcm8,$lcm9,$lcm10,$lcm11,$lcm12,$lcm13,$lcm14,$lcm15,$lcm16,$lcm17,$lcm18,$lcm19,$lcm20,$lcm21,$lcm22,$lcm23,$lcm24,$lcm25,$lcm26,$lcm27,$lcm28,$lcm29,$lcm30,$lcm31,$lcm32,$lcm33,$lcm34,$lcm35,$lcm36,$lcm37,$lcm38,$lcm39,$lcm40,$lcm41,$lcm42,$lcm43,$lcm44,$lcm45,$lcm46,$lcm47,$lcm48,$lcm49,$lcm50,$lcm51,$lcm52,$lcm53,$lcm54,$lcm55,$lcm56,$lcm57,$lcm58,$lcm59,$lcm60,$lcm61,$lcm62,$lcm63,$lcm64,$lcm65,$lcm66,$lcm67,$lcm68,$lcm69,$lcm70,$lcm71,$lcm72,$lcm73,$lcm74,$lcm75,$lcm76,$lcm77,$lcm78,$lcm79,$lcm80,$lcm81,$lcm82,$lcm83,$lcm84,$lcm85,$lcm86,$lcm87,$lcm88,$lcm89,$lcm90,$lcm91,$lcm92,$lcm93,$lcm94,$lcm95,$lcm96,$lcm97,$lcm98,$lcm99,$lcm100);
echo $fruit;

//���x�u����S���擾
$array = file($oldatfilepath);

//�f�o�b�O�\���p
print_r($fruit);
echo "<br>";
print_r($array);
echo "<br>";

$diff = array_diff($fruit,$array);
    while(list($key,$val) = each($diff)) {
    print $val. "<br>\n";
   }

//�����f�[�^�̏�������
$fpctm = fopen($tweetfilepath, "w");
stream_set_write_buffer($fpctm,0);
 {
  foreach ($diff as $a){
  fputs($fpctm, $a);
  }}
fclose($fpctm);

//�f�[�^�i�[
$fpctm = fopen($oldatfilepath, "w");
stream_set_write_buffer($fpctm,0);
 {
  foreach ($fruit as $a){
  fputs($fpctm, $a);
  }}
fclose($fpctm);

?>