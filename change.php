<?php
  //echo '<html><head><meta http-equiv="Content-Type" content="text/html; utf-8"></head>';
  //include("simple_html_dom.php");


  $change_new_file = 'change_new.txt';
  $change_data_file = 'change_all.txt';
  $change_api_v3_all_file = 'change_api_v3_all.txt';
  $change_api_v4_all_file = 'change_api_v4_all.txt';

  $change_data_html = file_get_html('http://www.ipc.tcu.ac.jp/~kyomuka/jikan.html');
  
  $change_data_html = str_replace('<br>', '', $change_data_html);
  $change_data_html = str_replace('</br>', '', $change_data_html);
  
  $change_data_html = mb_convert_encoding($change_data_html, 'utf-8', 'sjis-win');
  $change_data_html = mb_convert_kana($change_data_html,"a","utf-8");
  $change_data_html = str_get_html($change_data_html);
  
  $change_data = $change_data_html->find('body table',6)->innertext;
  preg_match_all('</tr>',$change_data, $change_data_length);
  $change_data_length = count($change_data_length[0])-1;
  echo '<div>すべての変更データ数: '.$change_data_length.'</div>';

  //echo $change_data;

  function change_new(){
    global $change_data_html, $change_data_length, $change_new_file, $change_data_file;
    $today = date('m/d');
    
    for ($run_length = 0; $run_length < $change_data_length; $run_length++) {
      // $data_item0 = $change_data_html->find("td",47+($run_length*10))->innertext;
      $data_item1 = $change_data_html->find("td",48+($run_length*10))->innertext;
      $data_item2 = $change_data_html->find("td",49+($run_length*10))->innertext;
      $data_item3 = $change_data_html->find("td",50+($run_length*10))->innertext;
      $data_item4 = $change_data_html->find("td",51+($run_length*10))->innertext;
      $data_item5 = $change_data_html->find("td",52+($run_length*10))->innertext;
      $data_item6 = $change_data_html->find("td",53+($run_length*10))->innertext;
      $data_item7 = $change_data_html->find("td",54+($run_length*10))->innertext;
      $data_item8 = $change_data_html->find("td",55+($run_length*10))->innertext;

      $lecturer_parser_space_length = substr_count($data_item8, '　');
      for ($lecturer_parser_length = 0; $lecturer_parser_length < $lecturer_parser_space_length; $lecturer_parser_length++ ){
        if ($lecturer_parser_length % 2 == 0){
          $data_item8 = preg_replace('/　/', '', $data_item8, 1);
        } else {
          $data_item8 = preg_replace('/　/', '、', $data_item8, 1);
        }
      }

      $data_item9 = $change_data_html->find("td",56+($run_length*10))->innertext;

      $data_item9 = preg_replace('/　/', '：', $data_item9, 1);
      $data_item9 = str_replace('　', '', $data_item9);
      $change_data_new[] = '[新着]【時間割変更】'.$data_item4.' '.$data_item5.'曜'.$data_item6.'限　'.$data_item7.'（'.$data_item8.'　'.$data_item1.$data_item2.'年'.$data_item3.'）// '.$data_item9.''."\n";
    }

    $change_data_old = file($change_data_file);
    if (empty($change_data_old)) {
      $change_data_old = array();
    }

    $diff = array_diff($change_data_new, $change_data_old);
    echo '<div><b>新着変更データ</b></div>';
    while(list($key, $val) = each($diff)) {
      echo $val.'<br>';
    }

    write_array($change_new_file, $diff);
    write_array($change_data_file, $change_data_new);   
    tweet($change_new_file);
  }

?>