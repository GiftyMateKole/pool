
<?php
	session_start();
	if(!isset($_SESSION['user']['ID'])){
		header("Location: index.html");
		exit();
	}
	
include_once "func.php";
	$id=$_SESSION['user']['ID'];
    $obj= new func();
    $result=$obj->getJPool($id);
	if($result==false){
		echo "result is false";
	}else{
		$row=$obj->fetch();
		
		while($row){
			echo "<p>Destination: {$row['Destination']}</p>";
			echo "<p>Time: {$row['Time']}</p>";
			echo "<p>Price: GHC {$row['Price']}</p>";
			echo "</br>";
			
			$row=$obj->fetch();
		}
		
		echo "<div id='map-canvas'></div>";
		
		?>
		<script type="text/javascript" src="cordova.js"></script>
<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
<script src="http://maps.google.com/maps/api/js" type="text/javascript"></script>
<script type="text/javascript">
navigator.geolocation.getCurrentPosition(onSuccess, onError, { timeout: 30000 });
function onSuccess(position) {
var lat=document.getElementsByName("lat")[0].value;
var lang=document.getElementsByName("lang")[0].value;

//Google Maps
var myLatlng = new google.maps.LatLng(lat,lang);
var mapOptions = {zoom: 4,center: myLatlng}
var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
var marker = new google.maps.Marker({position: myLatlng,map: map});
}
function onError(error) {
alert('code: ' + error.code + '\n' +
'message: ' + error.message + '\n');
}

google.maps.event.addDomListener(window, 'load', onSuccess);

</script>
<?php
	}
?>
			






