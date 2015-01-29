<?php
session_start();
 if(!isset($_SESSION['email'])){
 	header('location:logout.php');
 }else{
   include('class/connect.php');
   $id = $_SESSION['id'];
   $conObj = new Connect();
   $user_array = $conObj->getUserFields('username',$id);//accessing the getUserField method in connect Class
   foreach ($user_array as $row) {
   	$username = $row['username']; 
   }
   


 }
?>
<head>
 <title>Ajax Chat With Raw Javascript</title>
 <script type="text/javascript" src="js/chat.js"></script>
 <style type="text/css">
   body{
   	 background:#B5EEFF;
     color:#868786;
   }

   #viewChats{
   	 padding: 12px;
   	 overflow: auto;
   	 border: #333 1px solid;
   	 border-radius: 6px;
   	 -moz-border-radius: 8px;
     width: 300px;
     height: 300px;
   }
   #un{
   	 color:#1D80AB;
   }
   #clear{
   	  width: 300px;
   	  height: 300px;
   	  background: salmon;
   	  float: right;
   }
 </style>
<script type="text/javascript">
var btn = document.getElementById('chatBtn');



</script>
</head>

 <body>

   <h2>Hello <?php echo $username;?>. Lets Chat Away</h2>
   <div id="clear">
     <a href="clear.php" onclick="clear();">Clear chatbox</a><br>
     <a href="logout.php">Logout</a>
   </div>
   <div id="viewChats"></div>
   <br>
   <input type="text" name="chat" id="chat" size="48">
   <br><br>
   
   <button type="submit" id="chatBtn"  onClick="post_chat();">Speak</button>

   <div id="status"></div>
   <script type="text/javascript">list_chats();</script>
   
 </body>