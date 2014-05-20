<?php
require_once(dirname(__FILE__) . "/EasyBotter.php");
$eb = new EasyBotter();

//$response = $eb->autoFollow();
$response = $eb->postRotation("cancel-new.txt");
$response = $eb->postRotation("extra-new.txt");
$response = $eb->postRotation("tcu-new.txt");

$response = $eb->postRotation("oimachi.txt");
$response = $eb->postRotation("toyoko.txt");
//$response = $eb->postRotation("keihintohoku.txt");

?>
