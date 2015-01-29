<style type="text/css">
#hello{
	background: yellow;
	width:100px;
	height: 1600px;
}
</style>
<script type="text/javascript">
window.onload=toBottom; 
   function toBottom() 
   {
    alert("Scrolling to bottom ...");
    window.scrollTo(0, document.body.scrollHeight); 
}  
</script>
<div id="hello">
  Hi there
</div>