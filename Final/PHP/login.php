<?php
session_start();
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

.menu{
	text-align:center;
	list-style-type: none;
	background-color: #555;
	padding:12px;
}
.menu li{
	display:inline;
}

.menu a{	
	color: white;
	text-decoration: none;
	font-size: 20px;
	padding:12px;
	margin-left:36px;
}

.menu a:hover{
	background-color: #111;
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

#register {
	width: 333px;
}

table{
	margin-left: 20px; 
	border-collapse: collapse;
}

td {
	padding: 10px;
}

#tlabel {
	text-align: right;
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

</style>
</head>
<body>
<br>
	<img style="display:block; margin-left:auto; margin-right:auto;" id="emblem" src="../media/icons/emblem.png" width="250" height="250" alt="error">

	<header>
	<ul class="menu">
		<li><a href="../HTML/main.html">Αρχική</a></li>
		<li><a href="../HTML/info.html">Συνέδρια</a></li>
		<li><a href="../HTML/stuff.html">Κριτικοί</a></li>
		<li><a href="../HTML/guide.html">Οδηγός</a></li>
		<li><a href="register.php">Εγγραφή</a></li>
	</ul>
	</header>
	<br>	
	<h2> Παρακαλώ συμπληρώστε τα στοιχεία σας για να έχετε πρόσβαση στο πρόγραμμα του συνδερίου.</h2>
	<br><br>
	
	<div  style="margin: auto; width: 18%;">
	<form id="login" method="post" name="logform" style="border:5px solid black;">
		<div id="up" class="updown">Φόρμα σύνδεσης</div>
		<div id="main">
		<table>
			<br>
			<tr>
			<td id="tlabel"><label for="usrnm" class="labels">Username</label></td>
			<td><input type="text" name="usr" id="id_usr" maxlength="8" size="10" class="inputs" required></td>
			</tr>
			<tr>
			<td id="tlabel"><label for="pw" class="labels">Password</label></td>
			<td><input type="password" name="pw" id="id_pw"  maxlength="8" size="10" class="inputs" required></td>
			</tr>
		</table>
		<br>
		</div>
		<div id="down" class="updown">
		<input type="submit" value="Σύνδεση" id="b1">
		<input type="reset" value="Ακύρωση" id="b2">
		</div>
	</form>
	</div>
	
	<br><br><br>
	
	<?php
	if (!empty($_POST["usr"]) && !empty($_POST["pw"])){
	
	$con = mysqli_connect("localhost","root","","eep"); 
	if(!$con) {  
		die('Could not connect: '.mysql_error()); 
	} 

    $usr = process($_POST["usr"]);
    $pw = process($_POST["pw"]);
	
	$query = "SELECT * FROM users WHERE usr='$usr'";
	$result = mysqli_query($con,$query);
	
	$dbRow = mysqli_fetch_array($result);
	
	if(mysqli_num_rows($result) == 1 && password_verify("$pw", $dbRow['pw'])){
			
			$_SESSION["title"] = $dbRow['title'];
			$_SESSION["username"] = $usr;
			$_SESSION["active"] = true;
			echo "<h2 style='text-align:center; color: green;'>Επιτυχής σύνδεση! Ανακατεύθυνση...</h2>";
			echo "<script>setTimeout(function () {window.location.href= 'speech.php'; },3000);</script>";
	}else{
		echo "<h2 style='text-align:center; color: red;'>Εσφαλμένα στοιχεία χρήστη. Προσπαθήστε ξανά.</h2>";
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
