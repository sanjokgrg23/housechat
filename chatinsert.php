<?php
session_start();
include("class/connect.php");
if(isset($_SESSION['id']))
{
	 $obj = new Connect();
	 $id = $_SESSION['id'];
     $user_values = $obj->getUserFields('username',$id);//fetching members value using Connect Class and methods inside it.
     foreach ($user_values as $row) {
     	$uname = $row['username'];
     }
}

if(isset($_POST['chat'])){
	 $chat = $_POST['chat'];

	 if(!$chat)
	 {
	 	echo "please Type something quickly";
	 	exit();
	 }

	 
	 $new_obj = new Connect();
	 $data_entry = $new_obj->insertIntoChat($chat,$uname);
	 exit();
}