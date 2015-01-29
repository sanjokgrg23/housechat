<?php
$output = "";
session_start();
include_once("class/connect.php");
$obj = new Connect();
$chatdata = $obj->getChatbox();
foreach ($chatdata as $row) {
	$chat = $row['chatbody'];
	$username = $row['username'];

	$output = '<p><span id="un"> '.$username.' :</span>'.$chat.'</p><hr>';
	echo "$output";
}

?>