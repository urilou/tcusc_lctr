<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~sd/keiji.html" );
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $todaytweet = date("n��j��");
  $year = date("Y�N");
  $sunday = date("w");
  $time = date("H:i");
  $filepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/cancel.txt";

$scitem = $html->find("body table",0)->innertext;
$scitem = str_replace("<br>", "", $scitem);
preg_match_all("</tr>",$scitem,$scnnum);
$scnitm = count($scnnum[0])-2;
echo "���ׂĂ̋x�u�f�[�^��: ".$scnitm."<br>";

     for ($scn = 0; $scn < $scnitm; $scn++) {
       $iscn1 = $html->find("table",0)->find("td",0+$scn+($scn*5))->innertext;
       $iscn1 = str_replace("�N0", "�N", $iscn1);
       $iscn1 = str_replace("</tt>", "", $iscn1);
       $iscn1 = substr_replace($iscn1,"", 0,6);
       $iscn1 = str_replace("��", "/", $iscn1);
       $iscn1 = str_replace("/0", "/", $iscn1);
       $iscn1 = str_replace("��", " ", $iscn1);
       $iscn1 = str_replace("(��)", "", $iscn1);
       $iscn1 = str_replace("(/)", "", $iscn1);
       $iscn1 = str_replace("(��)", "", $iscn1);
       $iscn1 = str_replace("(��)", "", $iscn1);
       $iscn1 = str_replace("(��)", "", $iscn1);
       $iscn1 = str_replace("(��)", "", $iscn1);
       $iscn1 = str_replace("(�y)", "", $iscn1);
       $iscn1day = str_replace(" ", "", $iscn1);

//�����Ŏ��s���i��
       if (!strcmp($iscn1day,$today)) {
//2���Ŏ��s���i�� 10:35
           if (!strcmp("10:35",$time)) {
               echo "2���̋x�u�����擾���܂�";
               $iscn2 = $html->find("table",0)->find("td",1+$scn+($scn*5))->innertext;
//tt����
                 $iscn2 = str_replace("<tt>", "", $iscn2);
                 $iscn2 = str_replace("</tt>", "", $iscn2);
               //�p�[�X���ʂ����Ԃŕ���
               if (!strcmp($iscn2,"2")) {
                   $iscn3 = $html->find("table",0)->find("td",2+$scn+($scn*5))->innertext;
                       $iscn3 =  str_replace("�@", "[�ʐM��񏈗��R�[�X] ", $iscn3);
                       $iscn3 =  str_replace("�A", "[��[�i�m�e�N�f�o�C�X�R�[�X] ", $iscn3);
                   $iscn4 = $html->find("table",0)->find("td",4+$scn+($scn*5))->innertext;
                   $iscn4 = str_replace("�@", "", $iscn4);
                   $iscn5 = $html->find("table",0)->find("td",3+$scn+($scn*5))->innertext;
                       $iscn5 =  str_replace("<br>", "", $iscn5);
                   $iscn6 = $html->find("table",0)->find("td",5+$scn+($scn*5))->innertext;
                       $iscn6 =  str_replace("<br>", "", $iscn6);
                   ${"lscn".$scn} = "�y�x�u�z�� >> ".$iscn2."���@".$iscn3."�i".$iscn4."�@".$iscn5."�j ".$iscn6."\n";
                       ${"lscn".$scn} =  str_replace("�@<br>", "", ${"lscn".$scn});
//tt����
                       ${"lscn".$scn} =  str_replace("<tt>", "", ${"lscn".$scn});
                       ${"lscn".$scn} =  str_replace("</tt>", "", ${"lscn".$scn});
                   ${"lscn".$scn} = mb_convert_kana(${"lscn".$scn},"a","SJIS");
                 echo ("${'lscn'.$scn}<br />\n");
               } else {}
            } else {}

//3�E4���Ŏ��s���i�� 12:50
           if (!strcmp("12:50",$time)) {
               echo "3�E4���̋x�u�����擾���܂�";
               $iscn2 = $html->find("table",0)->find("td",1+$scn+($scn*5))->innertext;
                 $iscn2 = str_replace("<tt>", "", $iscn2);
                 $iscn2 = str_replace("</tt>", "", $iscn2);
               //�p�[�X���ʂ����Ԃŕ���
               if (!strcmp($iscn2,"3�E4")) {
                   $iscn3 = $html->find("table",0)->find("td",2+$scn+($scn*5))->innertext;
                       $iscn3 =  str_replace("�@", "[�ʐM��񏈗��R�[�X] ", $iscn3);
                       $iscn3 =  str_replace("�A", "[��[�i�m�e�N�f�o�C�X�R�[�X] ", $iscn3);
                   $iscn4 = $html->find("table",0)->find("td",4+$scn+($scn*5))->innertext;
                   $iscn4 = str_replace("�@", "", $iscn4);
                   $iscn5 = $html->find("table",0)->find("td",3+$scn+($scn*5))->innertext;
                   $iscn6 = $html->find("table",0)->find("td",5+$scn+($scn*5))->innertext;
                       $iscn6 =  str_replace("<br>", "", $iscn6);
                   ${"lscn".$scn} = "�y�x�u�z�� >> ".$iscn2."���@".$iscn3."�i".$iscn4."�@".$iscn5."�j ".$iscn6."\n";
                       ${"lscn".$scn} =  str_replace("<tt>", "", ${"lscn".$scn});
                       ${"lscn".$scn} =  str_replace("</tt>", "", ${"lscn".$scn});
                   ${"lscn".$scn} = mb_convert_kana(${"lscn".$scn},"a","SJIS");
                 echo ("${'lscn'.$scn}<br />\n");
               } else {}
            } else {}

//3���Ŏ��s���i�� 12:55
           if (!strcmp("12:55",$time)) {
               echo "3���̋x�u�����擾���܂�";
               $iscn2 = $html->find("table",0)->find("td",1+$scn+($scn*5))->innertext;
                 $iscn2 = str_replace("<tt>", "", $iscn2);
                 $iscn2 = str_replace("</tt>", "", $iscn2);
               //�p�[�X���ʂ����Ԃŕ���
               if (!strcmp($iscn2,"3")) {
                   $iscn3 = $html->find("table",0)->find("td",2+$scn+($scn*5))->innertext;
                       $iscn3 =  str_replace("�@", "[�ʐM��񏈗��R�[�X] ", $iscn3);
                       $iscn3 =  str_replace("�A", "[��[�i�m�e�N�f�o�C�X�R�[�X] ", $iscn3);
                   $iscn4 = $html->find("table",0)->find("td",4+$scn+($scn*5))->innertext;
                   $iscn4 = str_replace("�@", "", $iscn4);
                   $iscn5 = $html->find("table",0)->find("td",3+$scn+($scn*5))->innertext;
                   $iscn6 = $html->find("table",0)->find("td",5+$scn+($scn*5))->innertext;
                       $iscn6 =  str_replace("<br>", "", $iscn6);
                   ${"lscn".$scn} = "�y�x�u�z�� >> ".$iscn2."���@".$iscn3."�i".$iscn4."�@".$iscn5."�j ".$iscn6."\n";
                       ${"lscn".$scn} =  str_replace("<tt>", "", ${"lscn".$scn});
                       ${"lscn".$scn} =  str_replace("</tt>", "", ${"lscn".$scn});
                   ${"lscn".$scn} = mb_convert_kana(${"lscn".$scn},"a","SJIS");
                 echo ("${'lscn'.$scn}<br />\n");
               } else {}
            } else {}

//4���Ŏ��s���i�� 14:40
           if (!strcmp("14:40",$time)) {
               echo "4���̋x�u�����擾���܂�";
                $iscn2 = $html->find("table",0)->find("td",1+$scn+($scn*5))->innertext;
                 $iscn2 = str_replace("<tt>", "", $iscn2);
                 $iscn2 = str_replace("</tt>", "", $iscn2);
               //�p�[�X���ʂ����Ԃŕ���
               if (!strcmp($iscn2,"4")) {
                   $iscn3 = $html->find("table",0)->find("td",2+$scn+($scn*5))->innertext;
                       $iscn3 =  str_replace("�@", "[�ʐM��񏈗��R�[�X] ", $iscn3);
                       $iscn3 =  str_replace("�A", "[��[�i�m�e�N�f�o�C�X�R�[�X] ", $iscn3);
                   $iscn4 = $html->find("table",0)->find("td",4+$scn+($scn*5))->innertext;
                   $iscn4 = str_replace("�@", "", $iscn4);
                   $iscn5 = $html->find("table",0)->find("td",3+$scn+($scn*5))->innertext;
                   $iscn6 = $html->find("table",0)->find("td",5+$scn+($scn*5))->innertext;
                       $iscn6 =  str_replace("<br>", "", $iscn6);
                   ${"lscn".$scn} = "�y�x�u�z�� >> ".$iscn2."���@".$iscn3."�i".$iscn4."�@".$iscn5."�j ".$iscn6."\n";
                       ${"lscn".$scn} =  str_replace("<tt>", "", ${"lscn".$scn});
                       ${"lscn".$scn} =  str_replace("</tt>", "", ${"lscn".$scn});
                   ${"lscn".$scn} = mb_convert_kana(${"lscn".$scn},"a","SJIS");
                 echo ("${'lscn'.$scn}<br />\n");
               } else {}
            } else {}

//5���Ŏ��s���i��
           if (!strcmp("16:25",$time)) {
               echo "5���̋x�u�����擾���܂�";
                $iscn2 = $html->find("table",0)->find("td",1+$scn+($scn*5))->innertext;
                 $iscn2 = str_replace("<tt>", "", $iscn2);
                 $iscn2 = str_replace("</tt>", "", $iscn2);
               //�p�[�X���ʂ����Ԃŕ���
               if (!strcmp($iscn2,"5")) {
                   $iscn3 = $html->find("table",0)->find("td",2+$scn+($scn*5))->innertext;
                       $iscn3 =  str_replace("�@", "[�ʐM��񏈗��R�[�X] ", $iscn3);
                       $iscn3 =  str_replace("�A", "[��[�i�m�e�N�f�o�C�X�R�[�X] ", $iscn3);
                   $iscn4 = $html->find("table",0)->find("td",4+$scn+($scn*5))->innertext;
                   $iscn4 = str_replace("�@", "", $iscn4);
                   $iscn5 = $html->find("table",0)->find("td",3+$scn+($scn*5))->innertext;
                   $iscn6 = $html->find("table",0)->find("td",5+$scn+($scn*5))->innertext;
                       $iscn6 =  str_replace("<br>", "", $iscn6);
                   ${"lscn".$scn} = "�y�x�u�z�� >> ".$iscn2."���@".$iscn3."�i".$iscn4."�@".$iscn5."�j ".$iscn6."\n";
                       ${"lscn".$scn} =  str_replace("<tt>", "", ${"lscn".$scn});
                       ${"lscn".$scn} =  str_replace("</tt>", "", ${"lscn".$scn});
                   ${"lscn".$scn} = mb_convert_kana(${"lscn".$scn},"a","SJIS");
                 echo ("${'lscn'.$scn}<br />\n");
               } else {}
            } else {}

//6���Ŏ��s���i��
           if (!strcmp("18:10",$time)) {
               echo "6���̋x�u�����擾���܂�";
                $iscn2 = $html->find("table",0)->find("td",1+$scn+($scn*5))->innertext;
                 $iscn2 = str_replace("<tt>", "", $iscn2);
                 $iscn2 = str_replace("</tt>", "", $iscn2);
               //�p�[�X���ʂ����Ԃŕ���
               if (!strcmp($iscn2,"6")) {
                   $iscn3 = $html->find("table",0)->find("td",2+$scn+($scn*5))->innertext;
                       $iscn3 =  str_replace("�@", "[�ʐM��񏈗��R�[�X] ", $iscn3);
                       $iscn3 =  str_replace("�A", "[��[�i�m�e�N�f�o�C�X�R�[�X] ", $iscn3);
                   $iscn4 = $html->find("table",0)->find("td",4+$scn+($scn*5))->innertext;
                   $iscn4 = str_replace("�@", "", $iscn4);
                   $iscn5 = $html->find("table",0)->find("td",3+$scn+($scn*5))->innertext;
                   $iscn6 = $html->find("table",0)->find("td",5+$scn+($scn*5))->innertext;
                       $iscn6 =  str_replace("<br>", "", $iscn6);
                   ${"lscn".$scn} = "�y�x�u�z�� >> ".$iscn2."���@".$iscn3."�i".$iscn4."�@".$iscn5."�j ".$iscn6."\n";
                       ${"lscn".$scn} =  str_replace("<tt>", "", ${"lscn".$scn});
                       ${"lscn".$scn} =  str_replace("</tt>", "", ${"lscn".$scn});
                   ${"lscn".$scn} = mb_convert_kana(${"lscn".$scn},"a","SJIS");
                 echo ("${'lscn'.$scn}<br />\n");
               } else {}
            } else {}

       } else {}
     }

for ($scn = 0; $scn < $scnitm; $scn++) {
${"tscn".$scn} = mb_convert_encoding(${"lscn".$scn}, "UTF-8", "SJIS");
}

$fpctm = fopen($filepath, "w");
stream_set_write_buffer($fpctm,0);
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, $tscn0.$tscn1.$tscn2.$tscn3.$tscn4.$tscn5.$tscn6.$tscn7.$tscn8.$tscn9.$tscn10.$tscn11.$tscn12.$tscn13.$tscn14.$tscn15.$tscn16.$tscn17.$tscn18.$tscn19.$tscn20.$tscn21.$tscn22.$tscn23.$tscn24.$tscn25.$tscn26.$tscn27.$tscn28.$tscn29.$tscn30.$tscn31.$tscn32.$tscn33.$tscn34.$tscn35.$tscn36.$tscn37.$tscn38.$tscn39.$tscn40.$tscn41.$tscn42.$tscn43.$tscn44.$tscn45.$tscn46.$tscn47.$tscn48.$tscn49.$tscn50);
fclose($fpctm);
?>