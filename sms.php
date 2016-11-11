
		<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
		<script type="text/javascript">
		function smsComplete(xhr,status){
				if(status!="success"){
					divStatus.innerHTML="Error while sending sms";
					return;
				}
				divStatus.innerHTML=xhr.responseText;
			}
			
			function sendsms(){
				var num = document.getElementsByName("number")[0].value;
				var sender = document.getElementsByName("sender")[0].value;
				var msg = document.getElementsByName("msg")[0].value;
				var user = document.getElementsByName("user")[0].value;
				var pwd = document.getElementsByName("pwd")[0].value;
				var smsc = document.getElementsByName("smsc")[0].value;
				
				var ajaxPageUrl="smsajax.php?cmd=1&num="+num+"&sender="+sender+"&msg="+msg+"&user="+user+
				"&pwd="+pwd+"&smsc="+smsc;
				$.ajax(ajaxPageUrl,
{async:true,complete:smsComplete	}	
				);
			}
		</script>
<?php
		
					
					
					
					echo "<h1><u> Send SMS</u></h1>";
			echo "Number:<input type='text' name='number'></input></br>";
			echo "Sender:<input type='text' name='sender'></input></br>";
			echo "Message:<input type='text' name='msg'></input>";
			echo "<input type='hidden' name='user' value='mobileapp'>";
			echo "<input type='hidden' name='pwd' value='foobar'>";
			echo "<input type='hidden' name='smsc' value='smscMTN'>";
			echo "<div class='button'><button onclick='sendsms()' class='send'>Send</button></div>";
			
?>