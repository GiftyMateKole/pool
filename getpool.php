
<?php
session_start();
	if(!isset($_SESSION['user']['ID'])){
		header("Location: index.html");
		exit();
	}

include_once "func.php";
    $obj= new func();
    $result=$obj->getPool();
	if($result==false){
		echo "result is false";
	}else{
		$row=$obj->fetch();
		
		while($row){
			echo "</br>";
			echo "<input type='hidden' value={$row['ID']} name='ID'></input>";
			echo "<label for='des'>Destination: </label>";
			echo "<input type='text' value={$row['Destination']} name='des'></input>";
			echo "</br>";
			echo "<label for='seat'>Number of seats: </label>";
			echo "<input type='text' value={$row['Seats']} name='seat'></input>";
			echo "</br>";
			echo "<label for='time'>Time: </label>";
			echo "<input type='text' value={$row['Time']} name='time'></input>";
			echo "</br>";
			echo "<label for='price'>Price: </label>";
			echo "<input type='text' value={$row['Price']} name='price'></input>";
			echo "</br>";
			if($row['Seats']==0){
				echo "<button disabled>Join</button>";
			}	
			else{
			echo '<a href="update.php?id='.$row['ID'].'&seat='.$row['Seats'].'&des='.$row['Destination'].'&time='.$row['Time'].'&price='.$row['Price'].'&own='.$row['Owner'].'" ><button>Join</button></a>';
			}
			echo "</br>";
			$row=$obj->fetch();
		}
	}
?>
			






