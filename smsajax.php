<?php
	
	if(!isset($_REQUEST['cmd'])){
		echo "cmd is not provided";
		exit();
	}
	
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			sendsms();		
			break;
	}
	
	function sendsms(){
		$num = $_REQUEST['num'];
		$sender = $_REQUEST['sender'];
		$msg = $_REQUEST['msg'];
		$user = $_REQUEST['user'];
		$pwd = $_REQUEST['pwd'];
		$smsc = $_REQUEST['smsc'];
		
		$msg= preg_replace('/\s+/', '%20', $msg);

		
		$url = 'http://52.89.116.249:13013/cgi-bin/sendsms?username='.$user.'&password='.$pwd.'&to='.$num.'&from='.$sender.'&smsc='.$smsc.'&text='.$msg.'';
		
		
		$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
//curl_close($ch);

//echo 'Response of message is' .$result;

echo '<div class="reply">';
if ($result == "0: Accepted for delivery"){
	echo '<div class="sent" style="color:green;">';
	echo "Message delivered";
	echo '</div>';
}

else if ($result == "3: Queued for later delivery"){
	echo '<div class="queue" style="color:brown;">';
	echo "Message queued";
	echo '</div>';
}

else if ($num==""&&$sender==""&&$msg==""){
	echo '<div class="empty" style="color:brown;">';
	echo "Warning: Your fields are empty";
	echo '</div>';
}

	else{
	echo '<div class="nsent" style="color:red;">';
		echo "Message not delivered";
	echo '</div>';
	}

echo '</div>';
	}	
	
?>