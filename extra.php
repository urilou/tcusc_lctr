<?php
  //echo '<html><head><meta http-equiv="Content-Type" content="text/html; utf-8"></head>';
  //include("simple_html_dom.php");

  $extra_routine_file = 'extra.txt';
  $extra_next_file = 'extra_next.txt';
  $extra_new_file = 'extra_new.txt';
  $extra_data_file = 'extra_all.txt';
  $extra_api_v3_all_file = 'extra_api_v3_all.txt';
  $extra_api_v4_all_file = 'extra_api_v4_all.txt';

  $extra_data_html = file_get_html('http://www.ipc.tcu.ac.jp/~sd/keiji1.html');
  $extra_data_html = mb_convert_encoding($extra_data_html, 'utf-8', 'sjis-win');
  $extra_data_html = mb_convert_kana($extra_data_html,"a","utf-8");
  $extra_data_html = str_get_html($extra_data_html);
  
  $extra_data = $extra_data_html->find('body table',0)->innertext;
  preg_match_all('</tr>',$extra_data, $extra_data_length);
  $extra_data_length = count($extra_data_length[0])-2;
  echo '<div>すべての補講データ数: '.$extra_data_length.'</div>';

  function extra_today(){
    global $extra_data_html, $extra_data_length, $extra_routine_file;
    $today = date('n/j');

    for ($run_length = 0; $run_length < $extra_data_length; $run_length++) {
      $data_item1 = $extra_data_html->find("td",0+$run_length+($run_length*5))->innertext;
      $data_item1 = str_replace("年0", "年", $data_item1);
      $data_item1 = substr_replace($data_item1,"", 0,7);
      $data_item1_replaceA = array('月', '/0');
      $data_item1 = str_replace($data_item1_replaceA, '/', $data_item1);
      $data_item1_replaceB = array('(日)', '(/)', '(火)', '(水)', '(木)', '(金)', '(土)', '日');
      $data_item1 = str_replace($data_item1_replaceB, '', $data_item1);

      if (!strcmp($data_item1,$today)) {
        $data_item2 = $extra_data_html->find("td",1+$run_length+($run_length*5))->innertext;
        $data_item3 = $extra_data_html->find("td",2+$run_length+($run_length*5))->innertext;
        $data_item4 = $extra_data_html->find("td",3+$run_length+($run_length*5))->innertext;
        $data_item5 = $extra_data_html->find("td",4+$run_length+($run_length*5))->innertext;
        $data_item5 = str_replace('　', '', $data_item5);
        $data_item6 = $extra_data_html->find("td",5+$run_length+($run_length*5))->innertext;
        $extra_data[] = '【補講】今日 >> '.$data_item2.'限　'.$data_item3.'（'.$data_item5.'　'.$data_item4.'） '.$data_item6."\n";
      }

    }

    if (empty($extra_data[0])) {
      $extra_data[0] = '今日の補講情報はありません。（'.date('n月j日').'）';
    }
    
    echo '<div><b>補講</b></div>';
    array_unshift($extra_data,'今日、'.date('n月j日').'の補講情報（最新の情報は http://bit.ly/tcusclctr で確認してください。）'."\n");
    foreach ($extra_data as $key => $value){
      echo $value.'<br>';
    }
    write_array($extra_routine_file,$extra_data);
    tweet($extra_routine_file);
  }

  function extra_tomorrow(){
    global $extra_data_html, $extra_data_length, $extra_routine_file;
    $tomorrow = date('n/j',strtotime("+1 day"));

    for ($run_length = 0; $run_length < $extra_data_length; $run_length++) {
      $data_item1 = $extra_data_html->find("td",0+$run_length+($run_length*5))->innertext;
      $data_item1 = str_replace("年0", "年", $data_item1);
      $data_item1 = substr_replace($data_item1,"", 0,7);
      $data_item1_replaceA = array('月', '/0');
      $data_item1 = str_replace($data_item1_replaceA, '/', $data_item1);
      $data_item1_replaceB = array('(日)', '(/)', '(火)', '(水)', '(木)', '(金)', '(土)', '日');
      $data_item1 = str_replace($data_item1_replaceB, '', $data_item1);

      if (!strcmp($data_item1,$tomorrow)) {
        $data_item2 = $extra_data_html->find("td",1+$run_length+($run_length*5))->innertext;
        $data_item3 = $extra_data_html->find("td",2+$run_length+($run_length*5))->innertext;
        $data_item4 = $extra_data_html->find("td",3+$run_length+($run_length*5))->innertext;
        $data_item5 = $extra_data_html->find("td",4+$run_length+($run_length*5))->innertext;
        $data_item5 = str_replace('　', '', $data_item5);
        $data_item6 = $extra_data_html->find("td",5+$run_length+($run_length*5))->innertext;
        $extra_data[] = '【補講】'.$data_item1.' '.$data_item2.'限　'.$data_item3.'（'.$data_item5.'　'.$data_item4.'） '.$data_item6."\n";
      }

    }

    if (empty($extra_data[0])) {
      $extra_data[0] = '明日の補講情報はありません。（'.date('n月j日',strtotime('+1 day')).'）';
    }

    echo '<div><b>補講</b></div>';
    array_unshift($extra_data,'明日、'.date('n月j日',strtotime("+1 day")).'の補講情報（最新の情報は http://bit.ly/tcusclctr で確認してください。）'."\n");
    foreach ($extra_data as $key => $value){
      echo $value.'<br>';
    }
    write_array($extra_routine_file,$extra_data);
    tweet($extra_routine_file);
  }

  function extra_next($period){
    global $extra_data_html, $extra_data_length, $extra_next_file;
    $today = date('n/j');
    
    for ($run_length = 0; $run_length < $extra_data_length; $run_length++) {
      $data_item1 = $extra_data_html->find("td",0+$run_length+($run_length*5))->innertext;
      $data_item1 = str_replace("年0", "年", $data_item1);
      $data_item1 = substr_replace($data_item1,"", 0,7);
      $data_item1_replaceA = array('月', '/0');
      $data_item1 = str_replace($data_item1_replaceA, '/', $data_item1);
      $data_item1_replaceB = array('(日)', '(/)', '(火)', '(水)', '(木)', '(金)', '(土)', '日');
      $data_item1 = str_replace($data_item1_replaceB, '', $data_item1);
      $data_item2 = $extra_data_html->find("td",1+$run_length+($run_length*5))->innertext;

      if (!strcmp($data_item1,$today) && (strpos($data_item2, $period) !== FALSE)) {
        $data_item3 = $extra_data_html->find("td",2+$run_length+($run_length*5))->innertext;
        $data_item4 = $extra_data_html->find("td",3+$run_length+($run_length*5))->innertext;
        $data_item5 = $extra_data_html->find("td",4+$run_length+($run_length*5))->innertext;
        $data_item5 = str_replace('　', '', $data_item5);
        $data_item6 = $extra_data_html->find("td",5+$run_length+($run_length*5))->innertext;
        $extra_data_next[] = '【補講】つぎ >> '.$data_item2.'限　'.$data_item3.'（'.$data_item5.'　'.$data_item4.'） '.$data_item6."\n";
      }

    }
    echo '<div><b>補講</b></div>';
    foreach ($extra_data_next as $key => $value){
      echo $value.'<br>';
    }
    write_array($extra_next_file, $extra_data_next);
    tweet($extra_next_file);
  }

  function extra_new(){
    global $extra_data_html, $extra_data_length, $extra_new_file, $extra_data_file, $extra_api_v3_all_file, $extra_api_v4_all_file, $ftp_account, $remote_dir;
    
    for ($run_length = 0; $run_length < $extra_data_length; $run_length++) {
      $data_item1 = $extra_data_html->find("td",0+$run_length+($run_length*5))->innertext;
      $data_item1 = str_replace("年0", "年", $data_item1);
      $data_item1 = substr_replace($data_item1,"", 0,7);
      $data_item1_replaceA = array('月', '/0');
      $data_item1 = str_replace($data_item1_replaceA, '/', $data_item1);
      $data_item1_replaceB = array('(日)', '(/)', '(火)', '(水)', '(木)', '(金)', '(土)', '日');
      $data_item1 = str_replace($data_item1_replaceB, '', $data_item1);

      $data_item2 = $extra_data_html->find("td",1+$run_length+($run_length*5))->innertext;
      $data_item3 = $extra_data_html->find("td",2+$run_length+($run_length*5))->innertext;
      $data_item4 = $extra_data_html->find("td",3+$run_length+($run_length*5))->innertext;
      $data_item5 = $extra_data_html->find("td",4+$run_length+($run_length*5))->innertext;
      $data_item5 = str_replace('　', '', $data_item5);
      $data_item6 = $extra_data_html->find("td",5+$run_length+($run_length*5))->innertext;
      $data_item6 = str_replace('"', '\'\'', $data_item6);

      $extra_data_new[] = '[新着]【補講】'.$data_item1.' '.$data_item2.'限　'.$data_item3.'（'.$data_item5.'　'.$data_item4.'） '.$data_item6."\n";
      $extra_api_v3[] = "{\"day\":\"".$data_item1."\",\"period\":\"".$data_item2."\",\"subject\":\"".$data_item3."\",\"lecturer\":\"".$data_item5."\",\"room\":\"".$data_item4."\",\"note\":\"".$data_item6."\"}";

    }

    $extra_data_old = file($extra_data_file);
    if (empty($extra_data_old)) {
      $extra_data_old = array();
    }

    $diff = array_diff($extra_data_new, $extra_data_old);
    echo '<div><b>新着補講データ</b></div>';
    while(list($key, $val) = each($diff)) {
      echo $val.'<br>';
    }
    $extra_api_v3 = implode(",\n", $extra_api_v3);
    $extra_api_v3 = "{\"name\":\"都市大SC補講情報(全件)\",\n\"ver\":{\"this\":\"3\",\"last\":\"3\"},\n\"update\":\"".date('Y/n/j H:i:s')."\",\n\"inserted\":\"".count($diff)."\",\n\"data\":[\n".$extra_api_v3."\n]}";

    write_array($extra_new_file, $diff);
    write_array($extra_data_file, $extra_data_new);
    write($extra_api_v3_all_file,$extra_api_v3);
    write($extra_api_v4_all_file,$extra_api_v3);
    tweet($extra_new_file);
    ftp_upload($extra_api_v3_all_file);
    ftp_upload($extra_api_v4_all_file);
  }

?>