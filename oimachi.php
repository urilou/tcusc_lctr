<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://transit.loco.yahoo.co.jp/traininfo/detail/115/0/");
  $filepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/oimachi.txt";

$oimachiinfo = $html->find("dl.serviceInfo",0)->find("dd",0)->innertext;
echo "大井町線の運転状況: ".$oimachiinfo."<br>";

//直通先パターン
  if (preg_match("/田園都市線内/", $oimachiinfo)){
        echo "東急田園都市線での";
        $olline = "東急田園都市線での";
    }else if  (preg_match("/大井町線内/", $oimachiinfo)){
        echo "東急大井町線での";
        $olline = "東急大井町線での";
    }else if  (preg_match("/東横線内/", $oimachiinfo)){
        echo "東急東横線での";
        $olline = "東急東横線での";
    }else if  (preg_match("/半蔵門線内/", $oimachiinfo)){
        echo "東京メトロ半蔵門線での";
        $olline = "東京メトロ半蔵門線での";
    }else if  (preg_match("/スカイツリーライン内/", $oimachiinfo)){
        echo "東武スカイツリーラインでの";
        $olline = "東武スカイツリーラインでの";
    }else if  (preg_match("/スカイツリーライン線内/", $oimachiinfo)){
        echo "東武スカイツリーライン線での";
        $olline = "東武スカイツリーライン線での";
    }else if  (preg_match("/スカイツリー線内/", $oimachiinfo)){
        echo "東武スカイツリー線での";
        $olline = "東武スカイツリー線での";
    }else if  (preg_match("/伊勢崎線内/", $oimachiinfo)){
        echo "東武伊勢崎線での";
        $olline = "東武伊勢崎線での";

  //会社線
    }else if  (preg_match("/東急/", $oimachiinfo)){
        echo "東急線での";
        $olline = "東急線での";
    }else if  (preg_match("/みなとみらい/", $oimachiinfo)){
        echo "みなとみらい線での";
        $olline = "みなとみらい線での";
    }else if  (preg_match("/メトロ/", $oimachiinfo)){
        echo "東京メトロ線での";
        $olline = "東京メトロ線での";
    }else if  (preg_match("/東武/", $oimachiinfo)){
        echo "東武線での";
        $olline = "東武線での";
    }else if  (preg_match("/西武/", $oimachiinfo)){
        echo "西武線での";
        $olline = "西武線での";
    }else if  (preg_match("/埼玉高速/", $oimachiinfo)){
        echo "埼玉高速線での";
        $olline = "埼玉高速線での";
    }else if  (preg_match("/JR/", $oimachiinfo)){
        echo "JR線での";
        $olline = "JR線での";
    }

//原因パターン
  if (preg_match("/混雑/", $oimachiinfo)){
        echo "混雑のため";
        $olcause = "混雑のため";
    }else if  (preg_match("/震災/", $oimachiinfo)){
        echo "震災のため";
        $olcause = "震災のため";
    }else if  (preg_match("/地震/", $oimachiinfo)){
        echo "地震のため";
        $olcause = "地震のため";
    }else if  (preg_match("/災害/", $oimachiinfo)){
        echo "災害のため";
        $olcause = "災害のため";
    }else if  (preg_match("/工事のため/", $oimachiinfo)){
        echo "工事のため";
        $olcause = "工事のため";
    }else if  (preg_match("/人身事故/", $oimachiinfo)){
        echo "人身事故のため";
        $olcause = "人身事故のため";
    }else if  (preg_match("/救護活動/", $oimachiinfo)){
        echo "救護活動のため";
        $olcause = "救護活動のため";
    }else if  (preg_match("/架線点検/", $oimachiinfo)){
        echo "架線点検のため";
        $olcause = "架線点検のため";
    }else if  (preg_match("/車輪空転/", $oimachiinfo)){
        echo "車輪空転のため";
        $olcause = "車輪空転のため";
    }else if  (preg_match("/車両点検/", $oimachiinfo)){
        echo "車両点検のため";
        $olcause = "車両点検のため";
    }else if  (preg_match("/踏切内点検/", $oimachiinfo)){
        echo "踏切内点検のため";
        $olcause = "踏切内点検のため";
    }else if  (preg_match("/線路内点検/", $oimachiinfo)){
        echo "線路内点検のため";
        $olcause = "線路内点検のため";
    }else if  (preg_match("/車両故障/", $oimachiinfo)){
        echo "車両故障のため";
        $olcause = "車両故障のため";
    }else if  (preg_match("/ドア点検/", $oimachiinfo)){
        echo "ドア点検のため";
        $olcause = "ドア点検のため";
    }else if  (preg_match("/線路支障/", $oimachiinfo)){
        echo "線路支障のため";
        $olcause = "線路支障のため";
    }else if  (preg_match("/強風/", $oimachiinfo)){
        echo "強風のため";
        $olcause = "強風のため";
    }else if  (preg_match("/大雨/", $oimachiinfo)){
        echo "大雨のため";
        $olcause = "大雨のため";
    }else if  (preg_match("/大雪/", $oimachiinfo)){
        echo "大雪のため";
        $olcause = "大雪のため";
    }else if  (preg_match("/支障物と接触/", $oimachiinfo)){
        echo "支障物と接触のため";
        $olcause = "支障物と接触のため";
    }else if  (preg_match("/除雪作業/", $oimachiinfo)){
        echo "除雪作業のため";
        $olcause = "除雪作業のため";
    }else if  (preg_match("/異音の確認/", $oimachiinfo)){
        echo "異音の確認のため";
        $olcause = "異音の確認のため";
    }else if  (preg_match("/信号確認/", $oimachiinfo)){
        echo "信号確認のため";
        $olcause = "信号確認のため";
    }else if  (preg_match("/信号機故障/", $oimachiinfo)){
        echo "信号機故障のため";
        $olcause = "信号機故障のため";
    }else if  (preg_match("/踏切安全確認/", $oimachiinfo)){
        echo "踏切安全確認のため";
        $olcause = "踏切安全確認のため";
    }else if  (preg_match("/接続待合せ/", $oimachiinfo)){
        echo "接続待合せのため";
        $olcause = "接続待合せのため";
    }else if  (preg_match("/車内トラブル/", $oimachiinfo)){
        echo "車内トラブルのため";
        $olcause = "車内トラブルのため";
    }else if  (preg_match("/電力設備の確認/", $oimachiinfo)){
        echo "電力設備の確認のため";
        $olcause = "電力設備の確認のため";
    }else if  (preg_match("/信号装置故障/", $oimachiinfo)){
        echo "信号装置故障のため";
        $olcause = "信号装置故障のため";
    }else if  (preg_match("/工事用車両故障/", $oimachiinfo)){
        echo "工事用車両故障のため";
        $olcause = "工事用車両故障のため";
    }else if  (preg_match("/線路に人立入/", $oimachiinfo)){
        echo "線路に人立入のため";
        $olcause = "線路に人立入のため";
    }else if  (preg_match("/悪天候/", $oimachiinfo)){
        echo "悪天候のため";
        $olcause = "悪天候のため";
    }else if  (preg_match("/動物支障/", $oimachiinfo)){
        echo "動物支障のため";
        $olcause = "動物支障のため";
    }else if  (preg_match("/暴風雪/", $oimachiinfo)){
        echo "暴風雪のため";
        $olcause = "暴風雪のため";
    }else if  (preg_match("/倒木/", $oimachiinfo)){
        echo "倒木のため";
        $olcause = "倒木のため";
    }else if  (preg_match("/線路点検/", $oimachiinfo)){
        echo "線路点検のため";
        $olcause = "線路点検のため";
    }else if  (preg_match("/駅構内点検/", $oimachiinfo)){
        echo "駅構内点検のため";
        $olcause = "駅構内点検のため";
    }else if  (preg_match("/ポイント点検/", $oimachiinfo)){
        echo "ポイント点検のため";
        $olcause = "ポイント点検のため";
    }else if  (preg_match("/停電/", $oimachiinfo)){
        echo "停電のため";
        $olcause = "停電のため";
    }else if  (preg_match("/倒竹/", $oimachiinfo)){
        echo "倒竹のため";
        $olcause = "倒竹のため";
    }else if  (preg_match("/強風が見込/", $oimachiinfo)){
        echo "強風が予想されるため";
        $olcause = "強風が予想されるため";
    }else if  (preg_match("/雪/", $oimachiinfo)){
        echo "雪のため";
        $olcause = "雪のため";
    }else if  (preg_match("/沿線火災/", $oimachiinfo)){
        echo "沿線火災のため";
        $olcause = "沿線火災のため";
    }else if  (preg_match("/踏切事故/", $oimachiinfo)){
        echo "踏切事故のため";
        $olcause = "踏切事故のため";
    }else if  (preg_match("/送電設備点検/", $oimachiinfo)){
        echo "送電設備点検のため";
        $olcause = "送電設備点検のため";
    }else if  (preg_match("/変電所点検/", $oimachiinfo)){
        echo "変電所点検のため";
        $olcause = "変電所点検のため";
    }else if  (preg_match("/シカと衝突/", $oimachiinfo)){
        echo "シカと衝突のため";
        $olcause = "シカと衝突のため";
    }else if  (preg_match("/お客さま同士トラブル/", $oimachiinfo)){
        echo "お客さま同士トラブルのため";
        $olcause = "お客さま同士トラブルのため";
    }else if  (preg_match("/お客さま救護/", $oimachiinfo)){
        echo "お客さま救護のため";
        $olcause = "お客さま救護のため";
    }else if  (preg_match("/架線断線/", $oimachiinfo)){
        echo "架線断線のため";
        $olcause = "架線断線のため";
    }else if  (preg_match("/車両の定期検査に伴う点検整備のため/", $oimachiinfo)){
        echo "車両の定期的な整備のため";
        $olcause = "車両の定期的な整備のため";
    }else if  (preg_match("/触車事故/", $oimachiinfo)){
        echo "触車事故のため";
        $olcause = "触車事故のため";
    }else if  (preg_match("/線路内発煙/", $oimachiinfo)){
        echo "線路内発煙のため";
        $olcause = "線路内発煙のため";
    }else if  (preg_match("/動物と衝突/", $oimachiinfo)){
        echo "動物と衝突のため";
        $olcause = "動物と衝突のため";
    }else if  (preg_match("/濃霧/", $oimachiinfo)){
        echo "濃霧のため";
        $olcause = "濃霧のため";
    }else if  (preg_match("/霧/", $oimachiinfo)){
        echo "霧のため";
        $olcause = "霧のため";
    }else if  (preg_match("/工事の遅れ/", $oimachiinfo)){
        echo "工事の遅れのため";
        $olcause = "工事の遅れのため";
    }else if  (preg_match("/乗務員急病/", $oimachiinfo)){
        echo "乗務員急病のため";
        $olcause = "乗務員急病のため";
    }else if  (preg_match("/不発弾処理/", $oimachiinfo)){
        echo "不発弾処理のため";
        $olcause = "不発弾処理のため";
    }else if  (preg_match("/安全確認/", $oimachiinfo)){
        echo "安全確認のため";
        $olcause = "安全確認のため";
    }else if  (preg_match("/送電設備故障/", $oimachiinfo)){
        echo "送電設備故障のため";
        $olcause = "送電設備故障のため";
    }else if  (preg_match("/車輪凍結/", $oimachiinfo)){
        echo "車輪凍結のため";
        $olcause = "車輪凍結のため";
    }else if  (preg_match("/軌道凍結/", $oimachiinfo)){
        echo "軌道凍結のため";
        $olcause = "軌道凍結のため";
    }else if  (preg_match("/窓ガラス破損/", $oimachiinfo)){
        echo "窓ガラス破損のため";
        $olcause = "窓ガラス破損のため";
    }else if  (preg_match("/台風/", $oimachiinfo)){
        echo "台風のため";
        $olcause = "台風のため";
    }else if  (preg_match("/乗務員支障/", $oimachiinfo)){
        echo "乗務員支障のため";
        $olcause = "乗務員支障のため";
    }else if  (preg_match("/ポイント故障/", $oimachiinfo)){
        echo "ポイント故障のため";
        $olcause = "ポイント故障のため";
    }else if  (preg_match("/折り返し列車遅延/", $oimachiinfo)){
        echo "折り返し列車遅延のため";
        $olcause = "折り返し列車遅延のため";
    }else if  (preg_match("/踏切支障/", $oimachiinfo)){
        echo "踏切支障のため";
        $olcause = "踏切支障のため";
    }else if  (preg_match("/発煙/", $oimachiinfo)){
        echo "発煙のため";
        $olcause = "発煙のため";
    }else if  (preg_match("/架線支障の影響/", $oimachiinfo)){
        echo "架線支障のため";
        $olcause = "架線支障のため";
    }else if  (preg_match("/信号関係故障/", $oimachiinfo)){
        echo "信号に関連する装置の故障のため";
        $olcause = "信号に関連する装置の故障のため";
    }else if  (preg_match("/ストライキ/", $oimachiinfo)){
        echo "ストライキのため";
        $olcause = "ストライキのため";
    }else if  (preg_match("/夜間作業遅延/", $oimachiinfo)){
        echo "夜間作業遅延のため";
        $olcause = "夜間作業遅延のため";
    }else if  (preg_match("/災害復旧工事/", $oimachiinfo)){
        echo "災害復旧工事のため";
        $olcause = "災害復旧工事のため";
    }else if  (preg_match("/ドア故障/", $oimachiinfo)){
        echo "ドア故障のため";
        $olcause = "ドア故障のため";
  }

//現状パターン
  if (preg_match("/情報はありません/", $oimachiinfo)){
        echo "";
        $olstaus = "";
    }else if  (preg_match("/平常通り/", $oimachiinfo)){
        echo "遅れていましたが、現在は平常通りです。";
        $olstaus = "遅れていましたが、現在は平常通りです。";
    }else if  (preg_match("/％程度の運転本数/", $oimachiinfo)){
        echo "遅れています。また、電車の本数は通常より少なくなっています。";
        $olstaus = "遅れています。また、電車の本数は通常より少なくなっています。";
    }else if  (preg_match("/一部列車が運休/", $oimachiinfo)){
        echo "一部の電車が運休しています。";
        $olstaus = "一部の電車が運休しています。";
    }else if  (preg_match("/一部列車に遅れ/", $oimachiinfo)){
        echo "一部の電車が遅れています。";
        $olstaus = "一部の電車が遅れています。";
    }else if  (preg_match("/一部列車に運休/", $oimachiinfo)){
        echo "一部の電車が運休しています。";
        $olstaus = "一部の電車が運休しています。";
    }else if  (preg_match("/直通運転を中止/", $oimachiinfo)){
        echo "直通運転を中止しています。";
        $olstaus = "直通運転を中止しています。";
    }else if  (preg_match("/直通運転を再開/", $oimachiinfo)){
        echo "直通運転を再開し、遅れています。";
        $olstaus = "直通運転を再開し、遅れています。";
    }else if  (preg_match("/遅れと運転変更/", $oimachiinfo)){
        echo "遅れています。また、行先が変更されることがあります。";
        $olstaus = "遅れています。また、行先が変更されることがあります。";
    }else if  (preg_match("/運転変更/", $oimachiinfo)){
        echo "行先が変更されることがあります。";
        $olstaus = "行先が変更されることがあります。";
    }else if  (preg_match("/遅れや運転変更/", $oimachiinfo)){
        echo "遅れています。また、行先が変更されることがあります。";
        $olstaus = "遅れています。また、行先が変更されることがあります。";
    }else if  (preg_match("/遅れや運休が/", $oimachiinfo)){
        echo "遅れています。また、一部の電車は運休しています。";
        $olstaus = "遅れています。また、一部の電車は運休しています。";
    }else if  (preg_match("/遅れと運休が/", $oimachiinfo)){
        echo "遅れています。また、一部の電車は運休しています。";
        $olstaus = "遅れています。また、一部の電車は運休しています。";
    }else if  (preg_match("/再開し遅れが/", $oimachiinfo)){
        echo "運転を見合わせていましたが、再開しました。遅れや運休がでています。";
        $olstaus = "運転を見合わせていましたが、再開しました。遅れや運休がでています。";
    }else if  (preg_match("/見合わせ/", $oimachiinfo)){
        echo "運転を見合わせています。";
        $olstaus = "運転を見合わせています。";
    }else if  (preg_match("/運転を再開/", $oimachiinfo)){
        echo "運転を見合わせていましたが、再開しました。なお、遅れや運休がでている可能性があります。";
        $olstaus = "運転を見合わせていましたが、再開しました。なお、遅れや運休がでている可能性があります。";
    }else if  (preg_match("/遅れが/", $oimachiinfo)){
        echo "遅れています。";
        $olstaus = "遅れています。";
    }else if  (preg_match("/運休となります/", $oimachiinfo)){
        echo "運休します。";
        $olstaus = "運休します。";
    }else if  (preg_match("/通過扱い/", $oimachiinfo)){
        echo "一部の駅を特例的に通過しています。";
        $olstaus = "一部の駅を特例的に通過しています。";
  }


$loi = "【運行情報】東急大井町線 >> ".$olline.$olcause.$olstaus;

    if ($loi == "【運行情報】東急大井町線 >> ") {
        $loi = "";
    } else {}


$fpoli = fopen($filepath, "w");
stream_set_write_buffer($fpoli,0);
  flock($fpoli, LOCK_EX);
  fwrite($fpoli, $loi);
fclose($fpoli);
?>