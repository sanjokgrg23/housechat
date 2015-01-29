<?php
session_start();
if(isset($_SESSION['id'])){
 include('class/connect.php');
 $obj = new Connect();
 $clear = $obj->clearChatbox();
 echo"Chatbox cleared";
  header('refresh:2;url=chat.php');

}else{
  header('location:index.php');
}