<?php
  include('parse_train_status.php');

  $time = date('Hi');
  $today = date('md');
  $train_info_file = 'train_info.txt';

  echo '<div><b>各路線の運行情報</b></div>';

  $toyoko_name = '東急東横線';
  $toyoko_info = file_get_html('http://transit.loco.yahoo.co.jp/traininfo/detail/112/0/');
  $toyoko_info = $toyoko_info->find('div#mdServiceStatus',0)->find('li',0)->innertext;

  // データがある場合
  $toyoko_info = train_info_parse($toyoko_name, $toyoko_info);
  echo '<div>東急東横線の運行情報：'.$toyoko_info.'</div>';
  $train_info = $train_info."\n".$toyoko_info;
  
  $oimachi_name = '東急大井町線';
  $oimachi_info = file_get_html('http://transit.loco.yahoo.co.jp/traininfo/detail/115/0/');
  $oimachi_info = $oimachi_info->find('div#mdServiceStatus',0)->find('li',0)->innertext;
  // データがある場合
  $oimachi_info = train_info_parse($oimachi_name, $oimachi_info);
  echo '<div>東急大井町線の運行情報：'.$oimachi_info.'</div>';
  $train_info = $train_info."\n".$oimachi_info;

  $train_info = (ltrim($train_info, "\n"));
  
  if (!empty($train_info)) {
    write($train_info_file, $train_info);
    tweet($train_info_file);
  }
?>