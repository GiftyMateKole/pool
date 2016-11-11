<?php

	if(isset($_REQUEST['username'])){
			$mysqli= new mysqli('localhost','gifty.mate-kole','8c34293c7b8b4c0e','mobileweb__gifty_mate-kole');

			
			if($mysqli->connect_errno!=0){
				echo "error authenticating-connection {$mysqli->connect_error}";
				exit();
			}
			
			
			$username=$_REQUEST['username'];
			$pword=$_REQUEST['pword'];
			
			
			$query="select * from users WHERE Username='$username' and Password='$pword'";
			
			$result=$mysqli->query($query);
			
			if(!$result){
				echo "error authenticating";
				exit();
			}
			
			$row=$result->fetch_assoc();
			
			
			if(!$row){
				$response='<div style="position:absolute; top:300px; font-size:25px; color:red; margin-left:41%;">Username or Password is wrong.</div>';
				echo $response;
			}else{
				session_start();
				$_SESSION['user']=$row;
				header("Location:http://52.89.116.249/~gifty.mate-kole/carpool/index1.html");
				
				}
				
		}
?>