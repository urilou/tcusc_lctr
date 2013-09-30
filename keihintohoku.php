<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://transit.loco.yahoo.co.jp/traininfo/detail/22/0/");
  $filepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/keihintohoku.txt";

$ketoinfo = $html->find("dl.serviceInfo",0)->find("dd",0)->innertext;
echo "京浜東北線の運転状況: ".$ketoinfo."<br>";

//直通先パターン
  if (preg_match("/山手線内/", $ketoinfo)){
        echo "山手線での";
        $klline = "山手線での";
    }else if  (preg_match("/根岸線内/", $ketoinfo)){
        echo "根岸線での";
        $klline = "根岸線での";
    }else if  (preg_match("/湘南新宿ライン内/", $ketoinfo)){
        echo "湘南新宿ラインでの";
        $klline = "湘南新宿ラインでの";
    }else if  (preg_match("/湘南新宿ライン線内/", $ketoinfo)){
        echo "湘南新宿ライン線での";
        $klline = "湘南新宿ライン線での";
    }else if  (preg_match("/東海道線内/", $ketoinfo)){
        echo "東海道線での";
        $klline = "東海道線での";
    }else if  (preg_match("/東海道本線内/", $ketoinfo)){
        echo "東海道線での";
        $klline = "東海道線での";
    }else if  (preg_match("/横須賀線内/", $ketoinfo)){
        echo "横須賀線での";
        $klline = "横須賀線での";
    }else if  (preg_match("/横浜線内/", $ketoinfo)){
        echo "横浜線での";
        $klline = "横浜線での";
    }else if  (preg_match("/京急線内/", $ketoinfo)){
        echo "京急線での";
        $klline = "京急線での";
    }

//原因パターン
  if (preg_match("/混雑/", $ketoinfo)){
        echo "混雑のため";
        $klcause = "混雑のため";
    }else if  (preg_match("/震災/", $ketoinfo)){
        echo "震災のため";
        $klcause = "震災のため";
    }else if  (preg_match("/地震/", $ketoinfo)){
        echo "地震のため";
        $klcause = "地震のため";
    }else if  (preg_match("/災害/", $ketoinfo)){
        echo "災害のため";
        $klcause = "災害のため";
    }else if  (preg_match("/工事のため/", $ketoinfo)){
        echo "工事のため";
        $klcause = "工事のため";
    }else if  (preg_match("/人身事故/", $ketoinfo)){
        echo "人身事故のため";
        $klcause = "人身事故のため";
    }else if  (preg_match("/救護活動/", $ketoinfo)){
        echo "救護活動のため";
        $klcause = "救護活動のため";
    }else if  (preg_match("/架線点検/", $ketoinfo)){
        echo "架線点検のため";
        $klcause = "架線点検のため";
    }else if  (preg_match("/車輪空転/", $ketoinfo)){
        echo "車輪空転のため";
        $klcause = "車輪空転のため";
    }else if  (preg_match("/車両点検/", $ketoinfo)){
        echo "車両点検のため";
        $klcause = "車両点検のため";
    }else if  (preg_match("/踏切内点検/", $ketoinfo)){
        echo "踏切内点検のため";
        $klcause = "踏切内点検のため";
    }else if  (preg_match("/線路内点検/", $ketoinfo)){
        echo "線路内点検のため";
        $klcause = "線路内点検のため";
    }else if  (preg_match("/車両故障/", $ketoinfo)){
        echo "車両故障のため";
        $klcause = "車両故障のため";
    }else if  (preg_match("/ドア点検/", $ketoinfo)){
        echo "ドア点検のため";
        $klcause = "ドア点検のため";
    }else if  (preg_match("/線路支障/", $ketoinfo)){
        echo "線路支障のため";
        $klcause = "線路支障のため";
    }else if  (preg_match("/強風/", $ketoinfo)){
        echo "強風のため";
        $klcause = "強風のため";
    }else if  (preg_match("/大雨/", $ketoinfo)){
        echo "大雨のため";
        $klcause = "大雨のため";
    }else if  (preg_match("/大雪/", $ketoinfo)){
        echo "大雪のため";
        $klcause = "大雪のため";
    }else if  (preg_match("/支障物と接触/", $ketoinfo)){
        echo "支障物と接触のため";
        $klcause = "支障物と接触のため";
    }else if  (preg_match("/除雪作業/", $ketoinfo)){
        echo "除雪作業のため";
        $klcause = "除雪作業のため";
    }else if  (preg_match("/異音の確認/", $ketoinfo)){
        echo "異音の確認のため";
        $klcause = "異音の確認のため";
    }else if  (preg_match("/信号確認/", $ketoinfo)){
        echo "信号確認のため";
        $klcause = "信号確認のため";
    }else if  (preg_match("/信号機故障/", $ketoinfo)){
        echo "信号機故障のため";
        $klcause = "信号機故障のため";
    }else if  (preg_match("/踏切安全確認/", $ketoinfo)){
        echo "踏切安全確認のため";
        $klcause = "踏切安全確認のため";
    }else if  (preg_match("/接続待合せ/", $ketoinfo)){
        echo "接続待合せのため";
        $klcause = "接続待合せのため";
    }else if  (preg_match("/車内トラブル/", $ketoinfo)){
        echo "車内トラブルのため";
        $klcause = "車内トラブルのため";
    }else if  (preg_match("/電力設備の確認/", $ketoinfo)){
        echo "電力設備の確認のため";
        $klcause = "電力設備の確認のため";
    }else if  (preg_match("/信号装置故障/", $ketoinfo)){
        echo "信号装置故障のため";
        $klcause = "信号装置故障のため";
    }else if  (preg_match("/工事用車両故障/", $ketoinfo)){
        echo "工事用車両故障のため";
        $klcause = "工事用車両故障のため";
    }else if  (preg_match("/線路に人立入/", $ketoinfo)){
        echo "線路に人立入のため";
        $klcause = "線路に人立入のため";
    }else if  (preg_match("/悪天候/", $ketoinfo)){
        echo "悪天候のため";
        $klcause = "悪天候のため";
    }else if  (preg_match("/動物支障/", $ketoinfo)){
        echo "動物支障のため";
        $klcause = "動物支障のため";
    }else if  (preg_match("/暴風雪/", $ketoinfo)){
        echo "暴風雪のため";
        $klcause = "暴風雪のため";
    }else if  (preg_match("/倒木/", $ketoinfo)){
        echo "倒木のため";
        $klcause = "倒木のため";
    }else if  (preg_match("/線路点検/", $ketoinfo)){
        echo "線路点検のため";
        $klcause = "線路点検のため";
    }else if  (preg_match("/駅構内点検/", $ketoinfo)){
        echo "駅構内点検のため";
        $klcause = "駅構内点検のため";
    }else if  (preg_match("/ポイント点検/", $ketoinfo)){
        echo "ポイント点検のため";
        $klcause = "ポイント点検のため";
    }else if  (preg_match("/停電/", $ketoinfo)){
        echo "停電のため";
        $klcause = "停電のため";
    }else if  (preg_match("/倒竹/", $ketoinfo)){
        echo "倒竹のため";
        $klcause = "倒竹のため";
    }else if  (preg_match("/強風が見込/", $ketoinfo)){
        echo "強風が予想されるため";
        $klcause = "強風が予想されるため";
    }else if  (preg_match("/雪/", $ketoinfo)){
        echo "雪のため";
        $klcause = "雪のため";
    }else if  (preg_match("/沿線火災/", $ketoinfo)){
        echo "沿線火災のため";
        $klcause = "沿線火災のため";
    }else if  (preg_match("/踏切事故/", $ketoinfo)){
        echo "踏切事故のため";
        $klcause = "踏切事故のため";
    }else if  (preg_match("/送電設備点検/", $ketoinfo)){
        echo "送電設備点検のため";
        $klcause = "送電設備点検のため";
    }else if  (preg_match("/変電所点検/", $ketoinfo)){
        echo "変電所点検のため";
        $klcause = "変電所点検のため";
    }else if  (preg_match("/シカと衝突/", $ketoinfo)){
        echo "シカと衝突のため";
        $klcause = "シカと衝突のため";
    }else if  (preg_match("/お客さま同士トラブル/", $ketoinfo)){
        echo "お客さま同士トラブルのため";
        $klcause = "お客さま同士トラブルのため";
    }else if  (preg_match("/お客さま救護/", $ketoinfo)){
        echo "お客さま救護のため";
        $klcause = "お客さま救護のため";
    }else if  (preg_match("/架線断線/", $ketoinfo)){
        echo "架線断線のため";
        $klcause = "架線断線のため";
    }else if  (preg_match("/車両の定期検査に伴う点検整備のため/", $ketoinfo)){
        echo "車両の定期的な整備のため";
        $klcause = "車両の定期的な整備のため";
    }else if  (preg_match("/触車事故/", $ketoinfo)){
        echo "触車事故のため";
        $klcause = "触車事故のため";
    }else if  (preg_match("/線路内発煙/", $ketoinfo)){
        echo "線路内発煙のため";
        $klcause = "線路内発煙のため";
    }else if  (preg_match("/動物と衝突/", $ketoinfo)){
        echo "動物と衝突のため";
        $klcause = "動物と衝突のため";
    }else if  (preg_match("/濃霧/", $ketoinfo)){
        echo "濃霧のため";
        $klcause = "濃霧のため";
    }else if  (preg_match("/霧/", $ketoinfo)){
        echo "霧のため";
        $klcause = "霧のため";
    }else if  (preg_match("/工事の遅れ/", $ketoinfo)){
        echo "工事の遅れのため";
        $klcause = "工事の遅れのため";
    }else if  (preg_match("/乗務員急病/", $ketoinfo)){
        echo "乗務員急病のため";
        $klcause = "乗務員急病のため";
    }else if  (preg_match("/不発弾処理/", $ketoinfo)){
        echo "不発弾処理のため";
        $klcause = "不発弾処理のため";
    }else if  (preg_match("/安全確認/", $ketoinfo)){
        echo "安全確認のため";
        $klcause = "安全確認のため";
    }else if  (preg_match("/送電設備故障/", $ketoinfo)){
        echo "送電設備故障のため";
        $klcause = "送電設備故障のため";
    }else if  (preg_match("/車輪凍結/", $ketoinfo)){
        echo "車輪凍結のため";
        $klcause = "車輪凍結のため";
    }else if  (preg_match("/軌道凍結/", $ketoinfo)){
        echo "軌道凍結のため";
        $klcause = "軌道凍結のため";
    }else if  (preg_match("/窓ガラス破損/", $ketoinfo)){
        echo "窓ガラス破損のため";
        $klcause = "窓ガラス破損のため";
    }else if  (preg_match("/台風/", $ketoinfo)){
        echo "台風のため";
        $klcause = "台風のため";
    }else if  (preg_match("/乗務員支障/", $ketoinfo)){
        echo "乗務員支障のため";
        $klcause = "乗務員支障のため";
    }else if  (preg_match("/ポイント故障/", $ketoinfo)){
        echo "ポイント故障のため";
        $klcause = "ポイント故障のため";
    }else if  (preg_match("/折り返し列車遅延/", $ketoinfo)){
        echo "折り返し列車遅延のため";
        $klcause = "折り返し列車遅延のため";
    }else if  (preg_match("/踏切支障/", $ketoinfo)){
        echo "踏切支障のため";
        $klcause = "踏切支障のため";
  }

//現状パターン
  if (preg_match("/情報はありません/", $ketoinfo)){
        echo "";
        $klstaus = "";
    }else if  (preg_match("/平常通り/", $ketoinfo)){
        echo "遅れていましたが、現在は平常通りです。";
        $klstaus = "遅れていましたが、現在は平常通りです。";
    }else if  (preg_match("/％程度の運転本数/", $ketoinfo)){
        echo "遅れています。また、電車の本数は通常より少なくなっています。";
        $klstaus = "遅れています。また、電車の本数は通常より少なくなっています。";
    }else if  (preg_match("/一部列車が運休/", $ketoinfo)){
        echo "一部の電車が運休しています。";
        $klstaus = "一部の電車が運休しています。";
    }else if  (preg_match("/一部列車に遅れ/", $ketoinfo)){
        echo "一部の電車が遅れています。";
        $klstaus = "一部の電車が遅れています。";
    }else if  (preg_match("/直通運転を中止/", $ketoinfo)){
        echo "直通運転を中止しています。";
        $klstaus = "直通運転を中止しています。";
    }else if  (preg_match("/直通運転を再開/", $ketoinfo)){
        echo "直通運転を再開し、遅れています。";
        $klstaus = "直通運転を再開し、遅れています。";
    }else if  (preg_match("/遅れと運転変更/", $ketoinfo)){
        echo "遅れています。また、行先が変更されることがあります。";
        $klstaus = "遅れています。また、行先が変更されることがあります。";
    }else if  (preg_match("/遅れや運休が/", $ketoinfo)){
        echo "遅れています。また、一部の電車は運休しています。";
        $klstaus = "遅れています。また、一部の電車は運休しています。";
    }else if  (preg_match("/遅れと運休が/", $ketoinfo)){
        echo "遅れています。また、一部の電車は運休しています。";
        $klstaus = "遅れています。また、一部の電車は運休しています。";
    }else if  (preg_match("/再開し遅れが/", $ketoinfo)){
        echo "運転を見合わせていましたが、再開しました。遅れや運休がでています。";
        $klstaus = "運転を見合わせていましたが、再開しました。遅れや運休がでています。";
    }else if  (preg_match("/見合わせ/", $ketoinfo)){
        echo "運転を見合わせています。";
        $klstaus = "運転を見合わせています。";
    }else if  (preg_match("/運転を再開/", $ketoinfo)){
        echo "運転を見合わせていましたが、再開しました。なお、遅れや運休がでている可能性があります。";
        $klstaus = "運転を見合わせていましたが、再開しました。なお、遅れや運休がでている可能性があります。";
    }else if  (preg_match("/遅れが/", $ketoinfo)){
        echo "遅れています。";
        $klstaus = "遅れています。";
    }else if  (preg_match("/運休となります/", $ketoinfo)){
        echo "運休します。";
        $klstaus = "運休します。";
    }else if  (preg_match("/通過扱い/", $ketoinfo)){
        echo "一部の駅を特例的に通過しています。";
        $klstaus = "一部の駅を特例的に通過しています。";
  }

$lki = "【運行情報】京浜東北線 >> ".$klline.$klcause.$klstaus;

    if ($lki == "【運行情報】京浜東北線 >> ") {
        $lki = "";
    } else {}


$fpoli = fopen($filepath, "w");
stream_set_write_buffer($fpoli,0);
  flock($fpoli, LOCK_EX);
  fwrite($fpoli, $lki);
fclose($fpoli);
?>