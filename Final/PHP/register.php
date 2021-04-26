<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Εγγραφή</title>
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
.info h1{
	text-align:center;
}
.info p{
	padding-left: 5px;
	padding-right: 5px;
	font-size: 20px;
}
</style>
</head>
<body>
	<img style="display:block; margin-left:auto; margin-right:auto;" id="emblem" src="../media/icons/emblem.png" width="250" height="250" alt="error">

	<header>
	<ul class="menu">
		<li><a href="../HTML/main.html">Αρχική</a></li>
		<li><a href="../HTML/info.html">Συνέδρια</a></li>
		<li><a href="../HTML/stuff.html">Κριτικοί</a></li>
		<li><a href="../HTML/guide.html">Οδηγός</a></li>
		<li><a href="speech.php">Πρόγραμμα</a></li>
	</ul>
	</header>
	
	<div class="info">
		<h1>Κανόνες εγγραφής</h1>
		<p>1. Το πεδίο «όνομα» πρέπει να ξεκινάει με κεφαλαίο γράμμα και να έχει μήκος τουλάχιστον 2 χαρακτήρες.</p>
		<p>2. Το πεδίο «επώνυμο» πρέπει να ξεκινάει με κεφαλαίο γράμμα και να έχει μήκος τουλάχιστον 2 χαρακτήρες. </p>
		<p>3. Το πεδίο «email» πρέπει να είναι της μορφής x@y.z όπου τα x,y μπορεί να είναι κεφαλαία ή πεζά λατινικά γράμματα, αριθμοί ή το σύμβολο "_" ενώ το z πρέπει να έχει 2 ή 3 χαρακτήρες μήκος και να αποτελείται μονάχα από πεζά λατινικά γράμματα. </p>
		<p>4. Το πεδίο «τηλέφωνο» πρέπει να αποτελείται εξ' ολοκλήρου από αριθμούς και να έχει μήκος από 1 μέχρι 10 χαρακτήρες.</p>
		<p>5. Το πεδίο «username» πρέπει να αποτελείται από κεφαλαία ή πεζά λατινικά γράμματα και να έχει μήκος από 6 έως και 8 χαρακτήρες. </p>
		<p>6. Το πεδίο «password» πρέπει να αποτελείται από κεφαλαία ή πεζά λατινικά γράμματα και να έχει μήκος από 6 έως και 8 χαρακτήρες. </p>
		<p>7. Όλα τα πεδία πρέπει να συμπληρωθούν για να πραγματοποιηθεί η εγγραφή του χρήστη</p>
		<p>8. Τα πεδία «password» και «επιβεβαίωση password» πρέπει να ταιριάξουν για να ολοκληρωθεί η εγγραφή του χρήστη.</p>
		<br><br>
		<p><b>ΣΗΜΕΙΩΣΗ:</b> Τα πεδία «όνομα» και «επώνυμο» μπορούν να αποτελούνται και από ελληνικούς χαρακτήρες, πεζούς ή κεφαλαίους, με ή χωρίς τονισμό</p> 
	</div>
	
	
	<br><br>
	
	<div  style="margin: auto; width: 18%;">
	<form id="register" method="post" name="regform" onsubmit="return validateForm()"  style="border:5px solid black;">
		<div id="up" class="updown">Φόρμα εγγραφής</div>
		<div id="main">
		<table>
			<br>
			<tr><td id="tlabel"><label for="name" class="labels">Όνομα</label></td>
			<td><input type="text" name="name" id="id_name" pattern="[A-ZΑ-ΩΪΫ][a-zα-ωάέίύήόώϊϋΐΰ]+"  class="inputs" placeholder="Εισάγετε το όνομά σας" required></td>
			</tr>
			<tr><td id="tlabel"><label for="surname" class="labels">Επώνυμο</label></td>
			<td><input type="text" name="surname" id="id_surname" pattern="[A-ZΑ-ΩΪΫ][a-zα-ωάέίύήόώϊϋΐΰ]+" class="inputs" placeholder="Εισάγετε το επώνυμό σας" required></td>
			</tr>
			<tr><td></td>
			<td><input type="radio" name="title" id="id_mr" value="mr" class="inputs" checked>
			<label for="male" class="labels">Mr</label>
			<input type="radio" name="title" id="id_mrs" value="mrs" class="inputs">
			<label for="female" class="labels">Mrs</label></td>
			</tr>
			<tr>
			<td id="tlabel"><label for="email" class="labels">Email</label></td>
			<td><input type="text" name="email" id="id_email"  pattern="[a-zA-Z0-9][a-zA-Z0-9_]*@[a-zA-Z0-9][a-zA-Z0-9_]*.[a-z]{2,3}" class="inputs" placeholder="Εισάγετε E-mail" required></td>
			</tr>
			<tr>
			<td id="tlabel"><label for="tel" class="labels">Τηλέφωνο</label></td>
			<td><input type="text" name="phone" id="id_tel" pattern="[0-9]{1,10}"  class="inputs" maxlength="10" placeholder="Εισάγετε τηλέφωνο" required></td>
			</tr>
			<tr>
			<td id="tlabel"><label for="usrnm" class="labels">Username</label></td>
			<td><input type="text" name="usr" id="id_usr" pattern="[a-zA-Z]{6,8}" maxlength="8" size="10" class="inputs" required></td>
			</tr>
			<tr>
			<td id="tlabel"><label for="pw" class="labels">Password</label></td>
			<td><input type="password" name="pw" id="id_pw" pattern="[a-zA-Z]{6,8}"  maxlength="8" size="10" class="inputs" required></td>
			</tr>
			<tr>
			<td id="tlabel"><label for="cpw" class="labels">Επιβεβαίωση Password</label></td>
			<td><input type="password" name="cpw" id="id_cpw" pattern="[a-zA-Z]{6,8}" maxlength="8" class="inputs" required></td>
			</tr>
			<tr>
			<td></td>
			<td><input type="checkbox" name="agree" id="id_agree" class="inputs" checked>
			<label for="agree" class="labels" style="color:#4CAF50;" >Συμφωνείτε να λαμβάνετε ενημερωτικά email</label></td>
			</tr>
		</table>
		<br>
		</div>
		<div id="down" class="updown">
		<input type="submit" value="Αποστολή" id="b1">
		<input type="reset" value="Ακύρωση" id="b2">
		</div>
	</form>
	</div>
	<br><br><br>
	
	<?php 
	if (!empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) && !empty($_POST["usr"]) && !empty($_POST["pw"]) && !empty($_POST["cpw"])){
	
	$con = mysqli_connect("localhost","root","","eep"); 
	if(!$con) {  
		die('Could not connect: '.mysql_error()); 
	} 

	$name = process($_POST["name"]);
    $surname = process($_POST["surname"]);
	$title = process($_POST["title"]);
    $email = process($_POST["email"]);
    $phone = process($_POST["phone"]);
    $usr = process($_POST["usr"]);
    $pw = process($_POST["pw"]);
	$cpw = process($_POST["cpw"]);
	$newsletter = process(isset($_POST["agree"]));
	
	$query = "SELECT * FROM users WHERE usr='$usr'";
	$result = mysqli_query($con,$query);
	
	if(mysqli_num_rows($result) == 0){
		if ($pw == $cpw){	// if passwords match
		
		if ($newsletter== 1){
			$newsletter="YES";
		}else{
			$newsletter="NO";
		}
		
		$pw = password_hash("$pw", PASSWORD_DEFAULT);	// Default -> BCrypt : 60 chars hashed string
		
		$query = "INSERT INTO users (name,surname,title,email,phone,usr,pw,newsletter) VALUES ('$name','$surname','$title','$email','$phone','$usr','$pw','$newsletter')";
		mysqli_query($con,$query);
		echo "<h2 style='text-align:center; color: green;'>Ο λογαριασμός δημιουργήθηκε με επιτυχία!</h2>";
		
		$_SESSION["title"] = $title;
		$_SESSION["username"] = $usr;
		$_SESSION["active"] = true;
		
		echo "<script>setTimeout(function () {window.location.href= 'speech.php'; },3000);</script>"; // redirection
		}else{
			echo "<h2 style='text-align:center; color: red;'>Οι κωδικοί δεν ταιριάζουν, προσπαθήστε ξανά.</h2>";
		}
	}else{
			echo "<h2 style='text-align:center; color: red;'>Το όνομα χρήστη είναι ήδη σε χρήση!</h2>";
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
