<?php
class Connect{
  public function connect_db(){
    #connection method with PDO 
		try{
		//$handler = new PDO("mysql:host=localhost;dbname=chat", 'root', ''); 
		$handler = new PDO("mysql:host=mysql13.000webhost.com;dbname=a1511602_chat", 'a1511602_root', 'abcde123');
		$handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $handler;
	   }catch(PDOException $e){
		 echo $e->getMessage();
		 return $e;
	    }
    }//end of connect method

    public function hello()
    {
    	echo "my else";
    }

  public function check_login($email,$pass){
	  $conObj = new Connect();//new connection object
	  $handler = $this->connect_db();
	  $sql = "SELECT * FROM members WHERE email = '$email' AND password = '$pass' LIMIT 1";
	  $query = $handler->prepare($sql);
	  //$query = $handler->prepare($sql);	
	  $result = $query->execute();
	  $count = $query->rowCount();
	  if($count==0){
	  	return false;
	  }else{
	  	$array_result = array();
 	    $array_result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array_result;
	  }
    }//end of login method

    public function getUserFields($field,$id)
    {
	  $conObj = new Connect();
      $handler = $this->connect_db();
      $sql = "SELECT $field FROM members WHERE id='$id' LIMIT 1";
      $query = $handler->prepare($sql);
      $result = $query->execute();
      $array_result = array();
      $array_result = $query->fetchAll(PDO::FETCH_ASSOC);
      return $array_result;
    }
    
    public function insertIntoChat($chat,$username)
    {
      $conObj = new Connect();
      $handler = $this->connect_db();
      $sql = "INSERT INTO chatbox(chatBody,username) VALUES(?,?)";
      $query = $handler->prepare($sql);
      $result = $query->execute(array($chat,$username));
      if($result){
      	return true;
      }else{
      	return false;
      }   
    }

    public function getChatbox()
    {
      $conObj = new Connect();
      $handler = $this->connect_db();
      $sql = "SELECT * FROM (SELECT * FROM chatbox order by id DESC LIMIT 20) TMP ORDER BY TMP.id ASC";
      $query = $handler->prepare($sql);
      $result = $query->execute();
      $array_result = array();
      $array_result = $query->fetchAll(PDO::FETCH_ASSOC);
      return $array_result;
    }

    public function clearChatbox()
    {

      $handler = $this->connect_db();
      $sql = "DELETE  FROM chatbox";
      $query = $handler->prepare($sql);
      $result = $query->execute();

    }

}
?>