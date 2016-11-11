<?php
	session_start();
	if(!isset($_SESSION['user']['ID'])){
		header("Location: index.html");
		exit();
	}
	
	include_once "func.php";
	
	$did=$_REQUEST['id'];
	$seat=$_REQUEST['seat'];
	$des=$_REQUEST['des'];
	$time=$_REQUEST['time'];
	$price=$_REQUEST['price'];
	$own=$_REQUEST['own'];
	
	
	
	$seat=$seat-1;
	
	if ($seat==0){
		$obj=new func();
		$result=$obj->send($own);
		$row=$obj->fetch();
		
		$num = $row['Number'];
		$msg = "Your car pool is full";
		$user = "mobileapp";
		$pwd = "foobar";
		$sender = "Carpool";
		$smsc = "smscMTN";
		
		$msg= preg_replace('/\s+/', '%20', $msg);

		
		$url = 'http://52.89.116.249:13013/cgi-bin/sendsms?username='.$user.'&password='.$pwd.'&to='.$num.'&from='.$sender.'&smsc='.$smsc.'&text='.$msg.'';
		
		
		
	$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$r=curl_exec($ch);

$obj->update($did,$seat);

$numb=$_SESSION['user']['Number'];
$mseg = "You joined a car pool";

$mseg= preg_replace('/\s+/', '%20', $mseg);

$url1 = 'http://52.89.116.249:13013/cgi-bin/sendsms?username='.$user.'&password='.$pwd.'&to='.$numb.'&from='.$sender.'&smsc='.$smsc.'&text='.$msg.'';
		
		
		
	$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $url1);
curl_setopt($ch1, CURLOPT_HEADER, 0);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
$r1=curl_exec($ch1);

header('Location: index1.html#join');
}

else{
	
	$obj=new func();
	$obj->update($did,$seat);
	
	$name=$_SESSION['user']['Firstname'];
	$id=$_SESSION['user']['ID'];
	$num=$_SESSION['user']['Number'];
	$obj->in($id,$name,$des,$time,$price,$did,$num,$own);
	
	$numb=$_SESSION['user']['Number'];
$mseg = "You joined a car pool";
$user = "mobileapp";
		$pwd = "foobar";
		$sender = "Carpool";
		$smsc = "smscMTN";

$mseg= preg_replace('/\s+/', '%20', $mseg);

$url1 = 'http://52.89.116.249:13013/cgi-bin/sendsms?username='.$user.'&password='.$pwd.'&to='.$numb.'&from='.$sender.'&smsc='.$smsc.'&text='.$msg.'';
		
		
		
	$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $url1);
curl_setopt($ch1, CURLOPT_HEADER, 0);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
$r1=curl_exec($ch1);
	
header('Location: index1.html#join');
}