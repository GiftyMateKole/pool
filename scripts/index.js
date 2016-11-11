function regComplete(xhr,status){
				if(status!="success"){
					divStatus.innerHTML="error while adding user";
					return;
				}
				divStatus.innerHTML=xhr.responseText;
			}
			
			
function reg(){
				var firstname = document.getElementsByName("firstname")[0].value;
				var lastname = document.getElementsByName("lastname")[0].value;
				var user = document.getElementsByName("user")[0].value;
				var password = document.getElementsByName("password")[0].value;
				var phone = document.getElementsByName("phone")[0].value;
				var email = document.getElementsByName("email")[0].value;
				
				
				var ajaxPageUrl="http://52.89.116.249/~gifty.mate-kole/carpool/pageAjax.php?cmd=1&firstname="+firstname+"&lastname="+lastname+"&user="+user+
				"&password="+password+"&phone="+phone+"&email="+email;
				$.ajax(ajaxPageUrl,
				{async:true,complete:regComplete}	
				);
			}
			
function logComplete(xhr,status){
				if(status!="success"){
					divStatus.innerHTML="error while adding user";
					return;
				}
				divStatus.innerHTML=xhr.responseText;
			}
			
			
function login(){
				var username = document.getElementsByName("username")[0].value;
				var pword = document.getElementsByName("pword")[0].value;
				
				
				
				var ajaxPageUrl="http://52.89.116.249/~gifty.mate-kole/carpool/login.php?username="+username+"&pword="+pword;
				
				$.ajax(ajaxPageUrl,
				{async:true,complete:logComplete}	
				);
				alert("Logging in");
			}
			
			


			
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        
            xmlhttp = new XMLHttpRequest();
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getpool.php?q="+str,true);
        xmlhttp.send();
    }
}

function showReport(str) {
    if (str == "") {
        document.getElementById("txt").innerHTML = "";
        return;
    } else {
        
            xmlhttp = new XMLHttpRequest();
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txt").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getReport.php?q="+str,true);
        xmlhttp.send();
    }
}

function showR(str) {
    if (str == "") {
        document.getElementById("tx").innerHTML = "";
        return;
    } else {
        
            xmlhttp = new XMLHttpRequest();
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tx").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getReport1.php?q="+str,true);
        xmlhttp.send();
    }
}

function showSMS(str) {
    if (str == "") {
        document.getElementById("txtH").innerHTML = "";
        return;
    } else {
        
            xmlhttp = new XMLHttpRequest();
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtH").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","sms.php?q="+str,true);
        xmlhttp.send();
    }
}

(function() {

	document.addEventListener('deviceready', onDeviceReady.bind(this), false);
	var pictureSource;
	var destinationType;
	function onDeviceReady() {
		pictureSource = navigator.camera.PictureSourceType;
		destinationType = navigator.camera.DestinationType;

		document.getElementById("capturePhoto").onclick = function() {
			navigator.camera.getPicture(onPhotoDataSuccess, onFail, {
				quality : 50,

				destinationType : destinationType.DATA_URL
			});
		}
	}
	
	function onPhotoDataSuccess(imageData) {

		var smallImage = document.getElementById('smallImage');

		smallImage.style.display = 'block';

		smallImage.src = "data:image/jpeg;base64," + imageData;

	}

	function onFail(message) {

		alert('Failed because: ' + message);

	}
	
	})();




