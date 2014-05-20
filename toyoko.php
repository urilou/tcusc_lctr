<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://transit.loco.yahoo.co.jp/traininfo/detail/112/0/");
  $filepath = "/home/users/1/mods.jp-usi/web/tcusc_lctr/toyoko.txt";

$toyokoinfo = $html->find("div.serviceInfo",0)->find("dd",0)->find("li",0)->innertext;
echo "東横線の運転状況: ".$toyokoinfo."<br>";

//直通先パターン
  //東急
  if (preg_match("/田園都市線内/", $toyokoinfo)){
        echo "東急田園都市線での";
        $tlline = "東急田園都市線での";
    }else if  (preg_match("/大井町線内/", $toyokoinfo)){
        echo "東急大井町線での";
        $tlline = "東急大井町線での";
    }else if  (preg_match("/東横線内/", $toyokoinfo)){
        echo "東急東横線での";
        $tlline = "東急東横線での";
    }else if  (preg_match("/目黒線内/", $toyokoinfo)){
        echo "東急目黒線での";
        $tlline = "東急目黒線での";
    }else if  (preg_match("/多摩川線内/", $toyokoinfo)){
        echo "東急多摩川線での";
        $tlline = "東急多摩川線での";
    }else if  (preg_match("/みなとみらい線内/", $toyokoinfo)){
        echo "みなとみらい線での";
        $tlline = "みなとみらい線での";
  //メトロと一部西武
    }else if  (preg_match("/半蔵門線内/", $toyokoinfo)){
        echo "東京メトロ半蔵門線での";
        $tlline = "東京メトロ半蔵門線での";
    }else if  (preg_match("/日比谷線内/", $toyokoinfo)){
        echo "東京メトロ日比谷線での";
        $tlline = "東京メトロ日比谷線での";
    }else if  (preg_match("/南北線内/", $toyokoinfo)){
        echo "東京メトロ南北線での";
        $tlline = "東京メトロ南北線での";
    }else if  (preg_match("/西武有楽町線内/", $toyokoinfo)){
        echo "西武有楽町線での";
        $tlline = "西武有楽町線での";
    }else if  (preg_match("/有楽町線内/", $toyokoinfo)){
        echo "東京メトロ有楽町線での";
        $tlline = "東京メトロ有楽町線での";
    }else if  (preg_match("/副都心線内/", $toyokoinfo)){
        echo "東京メトロ副都心線での";
        $tlline = "東京メトロ副都心線での";
    }else if  (preg_match("/三田線内/", $toyokoinfo)){
        echo "都営三田線での";
        $tlline = "都営三田線での";
  //その他線
    }else if  (preg_match("/スカイツリーライン内/", $toyokoinfo)){
        echo "東武スカイツリーライン線での";
        $tlline = "東武スカイツリーライン線での";
    }else if  (preg_match("/スカイツリーライン線内/", $toyokoinfo)){
        echo "東武スカイツリーライン線での";
        $tlline = "東武スカイツリーライン線での";
    }else if  (preg_match("/スカイツリー線内/", $toyokoinfo)){
        echo "東武スカイツリー線での";
        $tlline = "東武スカイツリーライン線での";
    }else if  (preg_match("/伊勢崎線内/", $toyokoinfo)){
        echo "東武伊勢崎線での";
        $tlline = "東武伊勢崎線での";
    }else if  (preg_match("/東上線内/", $toyokoinfo)){
        echo "東武東上線での";
        $tlline = "東武東上線での";
    }else if  (preg_match("/池袋線内/", $toyokoinfo)){
        echo "西武池袋線での";
        $tlline = "西武池袋線での";
    }else if  (preg_match("/相鉄線内/", $toyokoinfo)){
        echo "相鉄線での";
        $tlline = "相鉄線での";
    }else if  (preg_match("/埼玉高速線内/", $toyokoinfo)){
        echo "埼玉高速線での";
        $tlline = "埼玉高速線での";

  //会社線
    }else if  (preg_match("/東急/", $toyokoinfo)){
        echo "東急線での";
        $tlline = "東急線での";
    }else if  (preg_match("/横浜高速/", $toyokoinfo)){
        echo "横浜高速線での";
        $tlline = "横浜高速線での";
    }else if  (preg_match("/メトロ/", $toyokoinfo)){
        echo "東京メトロ線での";
        $tlline = "東京メトロ線での";
    }else if  (preg_match("/東武/", $toyokoinfo)){
        echo "東武線での";
        $tlline = "東武線での";
    }else if  (preg_match("/西武/", $toyokoinfo)){
        echo "西武線での";
        $tlline = "西武線での";
    }else if  (preg_match("/埼玉高速/", $toyokoinfo)){
        echo "埼玉高速線での";
        $tlline = "埼玉高速線での";
    }else if  (preg_match("/相鉄/", $toyokoinfo)){
        echo "相鉄線での";
        $tlline = "相鉄線での";
    }else if  (preg_match("/JR/", $toyokoinfo)){
        echo "JR線での";
        $tlline = "JR線での";
    }

//原因パターン
  if (preg_match("/混雑/", $toyokoinfo)){
        echo "混雑のため";
        $tlcause = "混雑のため";
    }else if  (preg_match("/震災/", $toyokoinfo)){
        echo "震災のため";
        $tlcause = "震災のため";
    }else if  (preg_match("/地震/", $toyokoinfo)){
        echo "地震のため";
        $tlcause = "地震のため";
    }else if  (preg_match("/災害/", $toyokoinfo)){
        echo "災害のため";
        $tlcause = "災害のため";
    }else if  (preg_match("/工事のため/", $toyokoinfo)){
        echo "工事のため";
        $tlcause = "工事のため";
    }else if  (preg_match("/人身事故/", $toyokoinfo)){
        echo "人身事故のため";
        $tlcause = "人身事故のため";
    }else if  (preg_match("/救護活動/", $toyokoinfo)){
        echo "救護活動のため";
        $tlcause = "救護活動のため";
    }else if  (preg_match("/架線点検/", $toyokoinfo)){
        echo "架線点検のため";
        $tlcause = "架線点検のため";
    }else if  (preg_match("/車輪空転/", $toyokoinfo)){
        echo "車輪空転のため";
        $tlcause = "車輪空転のため";
    }else if  (preg_match("/車両点検/", $toyokoinfo)){
        echo "車両点検のため";
        $tlcause = "車両点検のため";
    }else if  (preg_match("/踏切内点検/", $toyokoinfo)){
        echo "踏切内点検のため";
        $tlcause = "踏切内点検のため";
    }else if  (preg_match("/線路内点検/", $toyokoinfo)){
        echo "線路内点検のため";
        $tlcause = "線路内点検のため";
    }else if  (preg_match("/車両故障/", $toyokoinfo)){
        echo "車両故障のため";
        $tlcause = "車両故障のため";
    }else if  (preg_match("/ドア点検/", $toyokoinfo)){
        echo "ドア点検のため";
        $tlcause = "ドア点検のため";
    }else if  (preg_match("/線路支障/", $toyokoinfo)){
        echo "線路支障のため";
        $tlcause = "線路支障のため";
    }else if  (preg_match("/強風/", $toyokoinfo)){
        echo "強風のため";
        $tlcause = "強風のため";
    }else if  (preg_match("/大雨/", $toyokoinfo)){
        echo "大雨のため";
        $tlcause = "大雨のため";
    }else if  (preg_match("/大雪/", $toyokoinfo)){
        echo "大雪のため";
        $tlcause = "大雪のため";
    }else if  (preg_match("/支障物と接触/", $toyokoinfo)){
        echo "支障物と接触のため";
        $tlcause = "支障物と接触のため";
    }else if  (preg_match("/除雪作業/", $toyokoinfo)){
        echo "除雪作業のため";
        $tlcause = "除雪作業のため";
    }else if  (preg_match("/異音の確認/", $toyokoinfo)){
        echo "異音の確認のため";
        $tlcause = "異音の確認のため";
    }else if  (preg_match("/信号確認/", $toyokoinfo)){
        echo "信号確認のため";
        $tlcause = "信号確認のため";
    }else if  (preg_match("/信号機故障/", $toyokoinfo)){
        echo "信号機故障のため";
        $tlcause = "信号機故障のため";
    }else if  (preg_match("/踏切安全確認/", $toyokoinfo)){
        echo "踏切安全確認のため";
        $tlcause = "踏切安全確認のため";
    }else if  (preg_match("/接続待合せ/", $toyokoinfo)){
        echo "接続待合せのため";
        $tlcause = "接続待合せのため";
    }else if  (preg_match("/車内トラブル/", $toyokoinfo)){
        echo "車内トラブルのため";
        $tlcause = "車内トラブルのため";
    }else if  (preg_match("/電力設備の確認/", $toyokoinfo)){
        echo "電力設備の確認のため";
        $tlcause = "電力設備の確認のため";
    }else if  (preg_match("/信号装置故障/", $toyokoinfo)){
        echo "信号装置故障のため";
        $tlcause = "信号装置故障のため";
    }else if  (preg_match("/工事用車両故障/", $toyokoinfo)){
        echo "工事用車両故障のため";
        $tlcause = "工事用車両故障のため";
    }else if  (preg_match("/線路に人立入/", $toyokoinfo)){
        echo "線路に人立入のため";
        $tlcause = "線路に人立入のため";
    }else if  (preg_match("/悪天候/", $toyokoinfo)){
        echo "悪天候のため";
        $tlcause = "悪天候のため";
    }else if  (preg_match("/動物支障/", $toyokoinfo)){
        echo "動物支障のため";
        $tlcause = "動物支障のため";
    }else if  (preg_match("/暴風雪/", $toyokoinfo)){
        echo "暴風雪のため";
        $tlcause = "暴風雪のため";
    }else if  (preg_match("/倒木/", $toyokoinfo)){
        echo "倒木のため";
        $tlcause = "倒木のため";
    }else if  (preg_match("/線路点検/", $toyokoinfo)){
        echo "線路点検のため";
        $tlcause = "線路点検のため";
    }else if  (preg_match("/駅構内点検/", $toyokoinfo)){
        echo "駅構内点検のため";
        $tlcause = "駅構内点検のため";
    }else if  (preg_match("/ポイント点検/", $toyokoinfo)){
        echo "ポイント点検のため";
        $tlcause = "ポイント点検のため";
    }else if  (preg_match("/停電/", $toyokoinfo)){
        echo "停電のため";
        $tlcause = "停電のため";
    }else if  (preg_match("/倒竹/", $toyokoinfo)){
        echo "倒竹のため";
        $tlcause = "倒竹のため";
    }else if  (preg_match("/強風が見込/", $toyokoinfo)){
        echo "強風が予想されるため";
        $tlcause = "強風が予想されるため";
    }else if  (preg_match("/雪/", $toyokoinfo)){
        echo "雪のため";
        $tlcause = "雪のため";
    }else if  (preg_match("/沿線火災/", $toyokoinfo)){
        echo "沿線火災のため";
        $tlcause = "沿線火災のため";
    }else if  (preg_match("/踏切事故/", $toyokoinfo)){
        echo "踏切事故のため";
        $tlcause = "踏切事故のため";
    }else if  (preg_match("/送電設備点検/", $toyokoinfo)){
        echo "送電設備点検のため";
        $tlcause = "送電設備点検のため";
    }else if  (preg_match("/変電所点検/", $toyokoinfo)){
        echo "変電所点検のため";
        $tlcause = "変電所点検のため";
    }else if  (preg_match("/シカと衝突/", $toyokoinfo)){
        echo "シカと衝突のため";
        $tlcause = "シカと衝突のため";
    }else if  (preg_match("/お客さま同士トラブル/", $toyokoinfo)){
        echo "お客さま同士トラブルのため";
        $tlcause = "お客さま同士トラブルのため";
    }else if  (preg_match("/お客さま救護/", $toyokoinfo)){
        echo "お客さま救護のため";
        $tlcause = "お客さま救護のため";
    }else if  (preg_match("/架線断線/", $toyokoinfo)){
        echo "架線断線のため";
        $tlcause = "架線断線のため";
    }else if  (preg_match("/車両の定期検査に伴う点検整備のため/", $toyokoinfo)){
        echo "車両の定期的な整備のため";
        $tlcause = "車両の定期的な整備のため";
    }else if  (preg_match("/触車事故/", $toyokoinfo)){
        echo "触車事故のため";
        $tlcause = "触車事故のため";
    }else if  (preg_match("/線路内発煙/", $toyokoinfo)){
        echo "線路内発煙のため";
        $tlcause = "線路内発煙のため";
    }else if  (preg_match("/動物と衝突/", $toyokoinfo)){
        echo "動物と衝突のため";
        $tlcause = "動物と衝突のため";
    }else if  (preg_match("/濃霧/", $toyokoinfo)){
        echo "濃霧のため";
        $tlcause = "濃霧のため";
    }else if  (preg_match("/霧/", $toyokoinfo)){
        echo "霧のため";
        $tlcause = "霧のため";
    }else if  (preg_match("/工事の遅れ/", $toyokoinfo)){
        echo "工事の遅れのため";
        $tlcause = "工事の遅れのため";
    }else if  (preg_match("/乗務員急病/", $toyokoinfo)){
        echo "乗務員急病のため";
        $tlcause = "乗務員急病のため";
    }else if  (preg_match("/不発弾処理/", $toyokoinfo)){
        echo "不発弾処理のため";
        $tlcause = "不発弾処理のため";
    }else if  (preg_match("/安全確認/", $toyokoinfo)){
        echo "安全確認のため";
        $tlcause = "安全確認のため";
    }else if  (preg_match("/送電設備故障/", $toyokoinfo)){
        echo "送電設備故障のため";
        $tlcause = "送電設備故障のため";
    }else if  (preg_match("/車輪凍結/", $toyokoinfo)){
        echo "車輪凍結のため";
        $tlcause = "車輪凍結のため";
    }else if  (preg_match("/軌道凍結/", $toyokoinfo)){
        echo "軌道凍結のため";
        $tlcause = "軌道凍結のため";
    }else if  (preg_match("/窓ガラス破損/", $toyokoinfo)){
        echo "窓ガラス破損のため";
        $tlcause = "窓ガラス破損のため";
    }else if  (preg_match("/台風/", $toyokoinfo)){
        echo "台風のため";
        $tlcause = "台風のため";
    }else if  (preg_match("/乗務員支障/", $toyokoinfo)){
        echo "乗務員支障のため";
        $tlcause = "乗務員支障のため";
    }else if  (preg_match("/ポイント故障/", $toyokoinfo)){
        echo "ポイント故障のため";
        $tlcause = "ポイント故障のため";
    }else if  (preg_match("/折り返し列車遅延/", $toyokoinfo)){
        echo "折り返し列車遅延のため";
        $tlcause = "折り返し列車遅延のため";
    }else if  (preg_match("/踏切支障/", $toyokoinfo)){
        echo "踏切支障のため";
        $tlcause = "踏切支障のため";
    }else if  (preg_match("/発煙/", $toyokoinfo)){
        echo "発煙のため";
        $tlcause = "発煙のため";
    }else if  (preg_match("/架線支障の影響/", $toyokoinfo)){
        echo "架線支障のため";
        $tlcause = "架線支障のため";
    }else if  (preg_match("/信号関係故障/", $toyokoinfo)){
        echo "信号に関連する装置の故障のため";
        $tlcause = "信号に関連する装置の故障のため";
    }else if  (preg_match("/ストライキ/", $toyokoinfo)){
        echo "ストライキのため";
        $tlcause = "ストライキのため";
    }else if  (preg_match("/夜間作業遅延/", $toyokoinfo)){
        echo "夜間作業遅延のため";
        $tlcause = "夜間作業遅延のため";
    }else if  (preg_match("/災害復旧工事/", $toyokoinfo)){
        echo "災害復旧工事のため";
        $tlcause = "災害復旧工事のため";
    }else if  (preg_match("/ドア故障/", $toyokoinfo)){
        echo "ドア故障のため";
        $tlcause = "ドア故障のため";
    }else if  (preg_match("/地震計誤作動に伴う安全確認/", $toyokoinfo)){
        echo "地震計誤作動に伴う安全確認を行ったため";
        $tlcause = "地震計誤作動に伴う安全確認を行ったため";
    }else if  (preg_match("/ホームドア故障/", $toyokoinfo)){
        echo "ホームドア故障のため";
        $tlcause = "ホームドア故障のため";
    }else if  (preg_match("/線路内立入/", $toyokoinfo)){
        echo "線路内立ち入りのため";
        $tlcause = "線路内立ち入りのため";
    }else if  (preg_match("/架線支障/", $toyokoinfo)){
        echo "架線支障のため";
        $tlcause = "架線支障のため";
    }else if  (preg_match("/信号関係点検/", $toyokoinfo)){
        echo "信号関係点検のため";
        $tlcause = "信号関係点検のため";
    }else if  (preg_match("/荷物挟まり対応/", $toyokoinfo)){
        echo "荷物挟まり対応のため";
        $tlcause = "荷物挟まり対応のため";
    }else if  (preg_match("/線路陥没/", $toyokoinfo)){
        echo "線路陥没のため";
        $tlcause = "線路陥没のため";
    }else if  (preg_match("/運行設備故障/", $toyokoinfo)){
        echo "運行設備故障のため";
        $tlcause = "運行設備故障のため";
    }else if  (preg_match("/車内安全確認/", $toyokoinfo)){
        echo "車内安全確認のため";
        $tlcause = "車内安全確認のため";
    }else if  (preg_match("/接続待ち/", $toyokoinfo)){
        echo "接続待ちのため";
        $tlcause = "接続待ちのため";
    }else if  (preg_match("/車両搬入作業/", $toyokoinfo)){
        echo "車両搬入作業のため";
        $tlcause = "車両搬入作業のため";
    }else if  (preg_match("/整備工事/", $toyokoinfo)){
        echo "整備工事のため";
        $tlcause = "整備工事のため";
    }else if  (preg_match("/竜巻注意情報発表/", $toyokoinfo)){
        echo "竜巻注意情報発表のため";
        $tlcause = "竜巻注意情報発表のため";
    }else if  (preg_match("/旅客対応/", $toyokoinfo)){
        echo "旅客対応のため";
        $tlcause = "旅客対応のため";
  }

//現状パターン
  if (preg_match("/情報はありません/", $toyokoinfo)){
        echo "";
        $tlstaus = "";
    }else if  (preg_match("/平常通り/", $toyokoinfo)){
        echo "遅れていましたが、現在は平常通りです。";
        $tlstaus = "遅れていましたが、現在は平常通りです。";
    }else if  (preg_match("/％程度の運転本数/", $toyokoinfo)){
        echo "遅れています。また、電車の本数は通常より少なくなっています。";
        $tlstaus = "遅れています。また、電車の本数は通常より少なくなっています。";
    }else if  (preg_match("/一部列車が運休/", $toyokoinfo)){
        echo "一部の電車が運休しています。";
        $tlstaus = "一部の電車が運休しています。";
    }else if  (preg_match("/一部列車に遅れ/", $toyokoinfo)){
        echo "一部の電車が遅れています。";
        $tlstaus = "一部の電車が遅れています。";
    }else if  (preg_match("/一部列車に運休/", $toyokoinfo)){
        echo "一部の電車が運休しています。";
        $tlstaus = "一部の電車が運休しています。";
    }else if  (preg_match("/直通運転を中止/", $toyokoinfo)){
        echo "直通運転を中止しています。";
        $tlstaus = "直通運転を中止しています。";
    }else if  (preg_match("/直通運転を再開/", $toyokoinfo)){
        echo "直通運転を再開し、遅れています。";
        $tlstaus = "直通運転を再開し、遅れています。";
    }else if  (preg_match("/遅れと運転変更/", $toyokoinfo)){
        echo "遅れています。また、行先が変更されることがあります。";
        $tlstaus = "遅れています。また、行先が変更されることがあります。";
    }else if  (preg_match("/遅れや運転変更/", $toyokoinfo)){
        echo "遅れています。また、行先が変更されることがあります。";
        $tlstaus = "遅れています。また、行先が変更されることがあります。";
    }else if  (preg_match("/運転変更/", $toyokoinfo)){
        echo "行先が変更されることがあります。";
        $tlstaus = "行先が変更されることがあります。";
    }else if  (preg_match("/遅れや運休が/", $toyokoinfo)){
        echo "遅れています。また、一部の電車は運休しています。";
        $tlstaus = "遅れています。また、一部の電車は運休しています。";
    }else if  (preg_match("/遅れと運休が/", $toyokoinfo)){
        echo "遅れています。また、一部の電車は運休しています。";
        $tlstaus = "遅れています。また、一部の電車は運休しています。";
    }else if  (preg_match("/再開しました。なお、列車に遅れ/", $toyokoinfo)){
        echo "運転を見合わせていましたが、再開しました。なお、遅れや運休がある可能性があります。";
        $tlstaus = "運転を見合わせていましたが、再開しました。なお、遅れや運休がある可能性があります。";
    }else if  (preg_match("/再開し遅れが/", $toyokoinfo)){
        echo "運転を見合わせていましたが、再開しました。遅れや運休がでています。";
        $tlstaus = "運転を見合わせていましたが、再開しました。遅れや運休がでています。";
    }else if  (preg_match("/見合わせ/", $toyokoinfo)){
        echo "運転を見合わせています。";
        $tlstaus = "運転を見合わせています。";
    }else if  (preg_match("/運転を再開/", $toyokoinfo)){
        echo "運転を見合わせていましたが、再開しました。なお、遅れや運休がでている可能性があります。";
        $tlstaus = "運転を見合わせていましたが、再開しました。なお、遅れや運休がでている可能性があります。";
    }else if  (preg_match("/遅れが/", $toyokoinfo)){
        echo "遅れています。";
        $tlstaus = "遅れています。";
    }else if  (preg_match("/運休となります/", $toyokoinfo)){
        echo "運休します。";
        $tlstaus = "運休します。";
    }else if  (preg_match("/通過扱い/", $toyokoinfo)){
        echo "一部の駅を特例的に通過しています。";
        $tlstaus = "一部の駅を特例的に通過しています。";
  }

$lti = "【運行情報】東急東横線 >> ".$tlline.$tlcause.$tlstaus;

    if ($lti == "【運行情報】東急東横線 >> ") {
        $lti = "";
    } else {}


$fptli = fopen($filepath, "w");
stream_set_write_buffer($fptli,0);
  flock($fptli, LOCK_EX);
  fwrite($fptli, $lti);
fclose($fptli);
?>