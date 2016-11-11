<?php

	session_start();
	if(!isset($_SESSION['user']['ID'])){
		header("Location: index.html");
		exit();
	}
	
	if(!isset($_REQUEST['cmd'])){
		echo "cmd is not provided";
		exit();
	}
	
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			reg();		
			break;
			
		case 2:
			create();		
			break;
	
		default:
			echo "wrong cmd";
			break;
	}
	
	
	function reg(){
		if(!isset($_REQUEST['firstname'])){
			echo "User name is not given";	
			exit();
		}
		
		$fname=$_REQUEST['firstname'];
		$lname=$_REQUEST['lastname'];
		$user=$_REQUEST['user'];
		$password=$_REQUEST['password'];
		$phone=$_REQUEST['phone'];
		$email=$_REQUEST['email'];
		
		include_once("func.php");
		$obj=new func();
		
		if($obj->reg($fname,$lname,$user,$password,$phone,$email)){
			echo "User added";
		}else{
			echo "User not added";
		}
	}
	
	function create(){
		if(!isset($_REQUEST['des'])){
			echo "Destination is not given";	
			exit();
		}
		
		$id=$_SESSION['user']['ID'];
		$des=$_REQUEST['des'];
		$seat=$_REQUEST['seat'];
		$time=$_REQUEST['time'];
		$price=$_REQUEST['price'];
		
		
		
		include_once("func.php");
		$obj=new func();
		
		if($obj->create($des,$seat,$time,$price,$id)){
			echo "Pool created";
		}else{
			echo "Pool not created";
		}
	}
	
	
	
	
	
?>
