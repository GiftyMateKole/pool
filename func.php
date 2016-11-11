<?php
include_once("adb.php");

class func extends adb{
	function func(){
	}
	
	
	function reg($fname,$lname,$user,$pword,$phone,$email){
		
		$strQuery="insert into users set Firstname='$fname', 
										   Lastname='$lname', 
										   Username='$user', 
										   Password='$pword', 
										   Number='$phone', 
										   Email='$email'";
		
	    $result=$this->query($strQuery);
		return $result;
	}
	
	function create($des,$seat,$time,$price,$id){
		
		$strQuery="insert into carpool set Destination='$des', 
										   Seats='$seat', 
										   Time='$time',
										   Owner='$id',										   
										   Price='$price'";
		
	    $result=$this->query($strQuery);
		return $result;
	}
	
	function update($ID,$seats){
		$query="UPDATE carpool set Seats='$seats'
				WHERE ID='$ID'";
		$result=$this->query($query);
		return $result;
	}
	
	function in($ID,$name,$des,$time,$price,$DId,$Number,$own){
		$query="insert into jpool set UserID='$ID', 
										   Name='$name', 
										   Destination='$des', 
										   Time='$time', 
										   Price='$price',
										   DId='$DId',
										   Number='$Number',
										   Owner='$own'";
		$result=$this->query($query);
		return $result;
	}
	
	
	function getPool(){
		$strQuery="select * from carpool";
		return $this->query($strQuery);
	
	}
	
	function getJPool($id){
		$strQuery="select * from jpool where UserID='$id'";
		return $this->query($strQuery);
	
	}
	
	function getRPool($id){
		$strQuery="select * from jpool where Owner='$id'";
		return $this->query($strQuery);
	
	}
	
	function send($id){
		$strQuery="select * from users where ID='$id'";
		return $this->query($strQuery);
	
	}
	
	}
	
	
	
	
?>