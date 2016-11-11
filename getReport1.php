
<?php
	session_start();
	if(!isset($_SESSION['user']['ID'])){
		header("Location: index.html");
		exit();
	}
	
include_once "func.php";
	$id=$_SESSION['user']['ID'];
    $obj= new func();
    $result=$obj->getRPool($id);
	if($result==false){
		echo "result is false";
	}else{
		$row=$obj->fetch();
		
		while($row){
			echo "<p>Destination: {$row['Destination']}</p>";
			echo "<p>Name: {$row['Name']}</p>";
			echo "<p>Number: {$row['Number']}</p>";
			echo "</br>";
			$row=$obj->fetch();
		}
	}
?>
			






