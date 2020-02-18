<script>
var ajx = new XMLHttpRequest;
	ajx.onreadystatechange=function(){
		if(this.readystate==4 && this.status==200){
			document.getElementById('show').innerHTML=this.responsetext;
		}
	};
	ajx.open("GET","Ajax.php",true)
	ajx.send(Ajax.php);
</script>
<div id="show"></div>
