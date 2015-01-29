<?php
session_start();
include('class/connect.php');//including connection class

$conObj = new Connect();
$handler = $conObj->connect_db();



if(isset($_SESSION['email'])){
	header('location:chat.php');
}else{
	if(isset($_POST['submit'])){
$email = $_POST['email'];
$pass = $_POST['password'];

$login = $conObj->check_login($email,$pass);
if($login==true){//if login is true than we set the session or else echo a error message;
  foreach ($login as $uservalue) {
  	 $id = $uservalue['id'];
  	 $username = $uservalue['username'];
  	 $set_email = $uservalue['email'];
  }

  $_SESSION['id'] = $id;
  $_SESSION['email'] = $set_email;
  echo "<i>You Will be redirected to your chat window</i>";
  header('refresh:3;url=chat.php');
	
}else{
	echo "sorry bro";
}


}else{

?>
<form action="#" method="post">
 <h1>email</h1>: <input type="text" name="email">
 <h1>Password</h1>: <input type="password" name="password">
 <input type="submit" name="submit">
</form>

<?php
}
}
?>