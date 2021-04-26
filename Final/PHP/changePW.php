<?php session_start();
if (!$_SESSION["active"]){
	header('Location: '.'login.php'); // if user is not logged in, then redirect to login page
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Σύνδεση</title>
<meta charset="utf-8">
<style>
body{
	background-color:#ffecb3;
}

.labels {
	padding-left:30px;
	color: white;
	font-weight: bold;
	
}

.updown {
	padding: 15px;
	background-color: #ffdf80;
}

table{
	margin-left: 20px; 
	border-collapse: collapse;
}

td {
	padding: 10px 10px 10px 20px;
}

#tlabel {
	text-align:right;
}


#up {
	color: black;
	padding:20px;
	text-align:center;
	font-family:Haettenschweiler;
	font-size: 30px;
}

#main {
	background-color:  #660000;	
}

#down {
	text-align: right;
}

#b1 {
	border: none;
	color: white;
	background-color: #4CAF50;
	border-radius: 30%;
	padding: 10px;
}

#b2	{
	border: none;
	color: white;
	background-color: red;
	border-radius: 30%;
	padding: 10px;
}
.info{
	margin: auto;
	width: 50%;
	border: 5px solid black;
	
}
h2{
	text-align:center;
}
h3{
	text-align:center;
}

</style>
</head>
<body>
<br>

	<h2>Συμπληρώστε τον νέο κωδικό πρόσβασης</h2>
	<h3><i>*Ο νέος κωδικός πρέπει να ακολουθεί τους ίδιους κανόνες με αυτούς κατά την <a style="text-decoration: none; color:red;" href="register.php"> εγγραφή</a> σας*</i></h3>
	<br><br>
	
	<div  style="margin: auto; width: 18%;">
	<form id="login" method="post" name="logform" style="border:5px solid black;">
		<div id="up" class="updown">Αλλαγή κωδικού</div>
		<div id="main">
		<table>
			<br>
			<tr>
			<td id="tlabel"><label for="usrnm" class="labels">Παρόν κωδικός</label></td>
			<td><input type="text" name="c_pw" id="id_usr" maxlength="8" size="10" class="inputs" required></td>
			</tr>
			<tr>
			<td id="tlabel"><label for="pw" class="labels">Νέος κωδικός</label></td>
			<td><input type="password" name="n_pw" id="id_pw"  pattern="[a-zA-Z]{6,8}" maxlength="8" size="10" class="inputs" required></td>
			</tr>
			<tr>
			<td id="tlabel"><label for="pw" class="labels">Επιβεβαίωση κωδικού</label></td>
			<td><input type="password" name="n_rpw" id="id_pw"  pattern="[a-zA-Z]{6,8}" maxlength="8" size="10" class="inputs" required></td>
			</tr>
		</table>
		<br>
		</div>
		<div id="down" class="updown">
		<input type="submit" value="Αλλαγή" id="b1">
		<input type="reset" value="Ακύρωση" id="b2">
		</div>
	</form>
	</div>
	
	<br><br><br>
	
	<?php
	if (!empty($_POST["c_pw"]) && !empty($_POST["n_pw"]) && !empty($_POST["n_rpw"])){
	$con = mysqli_connect("localhost","root","","eep"); 
	if(!$con) {  
		die('Could not connect: '.mysql_error()); 
	} 


	$usr = process($_SESSION["username"]);
    $oldPW = process($_POST["c_pw"]);
    $newPW = process($_POST["n_pw"]);
	$newRPW = process($_POST["n_rpw"]);
	
	
	$query = "SELECT * FROM users WHERE usr='$usr'";
	$result = mysqli_query($con,$query);
	
	$dbRow = mysqli_fetch_array($result);
	
	if ($newPW==$newRPW){
		if(mysqli_num_rows($result) == 1 && password_verify("$oldPW", $dbRow['pw'])){
				
				$newPW = password_hash("$newPW", PASSWORD_DEFAULT);
				
				$query = "UPDATE users SET pw='$newPW' WHERE usr='$usr'";
				
				mysqli_query($con,$query);
				
				session_unset();
				session_destroy();
				
				echo "<h2 style='text-align:center; color: green;'>Επιτυχής αλλαγή κωδικού πρόσβασης! Παρακαλώ συνδεθείτε ξανά. Ανακατεύθυνση...</h2>";
				echo "<script>setTimeout(function () {window.location.href= 'speech.php'; },3000);</script>";
		}else{
			echo "<h2 style='text-align:center; color: red;'>Ο κωδικός πρόσβασης ήταν λανθασμένος. Προσπαθήστε ξανά.</h2>";
		}
	}else{
		echo "<h2 style='text-align:center; color: red;'>Οι κωδικοί πρόσβασης δεν ταιριάζουν. Προσπαθήστε ξανά.</h2>";
	}
    mysqli_close($con);
	}
	
	function process($data) {	// Process data before anything else
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
	?>
</body>
</html>
