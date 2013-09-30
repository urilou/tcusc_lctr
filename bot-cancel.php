<?php
require_once(dirname(__FILE__) . "/EasyBotter.php");
$eb = new EasyBotter();

if(date("G") == 20){
    $response = $eb->postRotation("cancel.txt");
}

if(date("G") == 8){
    $response = $eb->postRotation("cancel.txt");
}

if(date("G") == 10){
    $response = $eb->postRotation("cancel.txt");
}

if(date("G") == 12){
    $response = $eb->postRotation("cancel.txt");
}

if(date("G") == 14){
    $response = $eb->postRotation("cancel.txt");
}

if(date("G") == 16){
    $response = $eb->postRotation("cancel.txt");
}

if(date("G") == 18){
    $response = $eb->postRotation("cancel.txt");
}

?>
