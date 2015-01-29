function post_chat()
{
	var hr = new XMLHttpRequest();
	var url = "/chatinsert.php";
	//var url = "../chat/chatinsert.php";
	var ch = document.getElementById("chat").value;
	var kv = "chat="+ch;
	hr.open("POST",url,true);
	//Set content type header information for sending url encoded variables in the request
	hr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//Access the onreadystatechange event for the XMLHttpRequest object
    
    hr.onreadystatechange = function()
	 {
      if(hr.readyState == 4 && hr.status ==200){
           var return_data = hr.responseText;
           document.getElementById("status").innerHTML = return_data;
      } //end of the if
	 }
	 //Send the data to the PHP now. and wait for response to update the status div.
	 hr.send(kv);
	 document.getElementById("status").innerHTML = "processing...";
	 document.getElementById("chat").value = "";
}

function list_chats()
{
	var hr = new XMLHttpRequest();
	hr.onreadystatechange = function(){
	  if(hr.readyState== 4 && hr.status==200){
	  	  document.getElementById("viewChats").innerHTML= hr.responseText;
	  }
	}
	hr.open("GET","listchats.php?t="+ Math.random(), true);
	hr.send();

	setTimeout(list_chats,4000);
	 window.scrollTo(0, document.body.scrollHeight);

}