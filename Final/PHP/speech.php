<?php session_start(); 
if (!$_SESSION["active"]){
	header('Location: '.'login.php'); // if user is not logged in, then redirect to login page
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Πρόγραμμα 23ου συνεδρίου</title>
<link rel="stylesheet" href="../CSS/main.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
.titles{
	background-color:#ffdf80;
	margin-top:-30px;
}
h1{
	padding:50px;
	text-align:center;
	font-family:Haettenschweiler;
	font-size:50px;
}
h2{
	text-align:center;
	font-family:Haettenschweiler;
	font-size:40px;
}
#logout{
	top: 0;
    right: 0;
    position: absolute;
	margin:30px;
}
#chPW{
	top: 0;
    right: 0;
    position: absolute;
	margin-right: 50px;
	margin:100px 30px 30px 30px;
}
input{
	transition-duration: 0.5s;
	font-size: 20px;
	padding: 14px 15px;
	color: white;
	background-color: #800000;
	font-family:Haettenschweiler;
}
input:hover{
	background-color: #e60000;
	color: black;
	cursor: pointer;
}
.program{
	margin-left:auto; 
	margin-right:auto;	
	width:70%;
	border-collapse: collapse;
}
table, th, td, caption {
  border: 2px solid black;
}
th{
	height: 50px;
	font-size: 25px;
	
}
td{
	text-align:center;
	vertical-align: middle;
	font-size: 20px;
}
caption{
	padding: 20px;
	font-size: 35px;
	
}
.bottom{
	background-color: #000;
	margin-bottom:-10px;
}
.bottom p{
	text-align:center;
	padding: 20px;
	color: white;
	font-size: 15px;
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
	</ul>
	</header>

<div id="logout">
	<form method="POST">
	<input type="submit" name="logout" value="Αποσύνδεση">
	</form>
</div>
<div id="chPW">
	<form action="changePW.php" method="POST" target="_blank">
	<input type="submit" name="chPW" value="Αλλαγή κωδικού">
	</form>
</div>

<div class="titles">
	<h1>~ ΠΡΟΓΡΑΜΜΑ 23ου ΣΥΝΕΔΡΙΟΥ ΤΗΣ ΕΝΩΣΗΣ ΕΛΛΗΝΩΝ ΕΠΙΣΤΗΜΟΝΩΝ ~</p></h1>
</div>

<h2>Καλώς όρισες <?php echo $_SESSION["title"].". ".$_SESSION["username"]?></h2>

<br><br><br>

<table class="program">
	<caption><b>Πρόγραμμα</b></caption>
  <tr>
    <th>Εισηγητής</th>
    <th>Θέμα</th>
    <th>Διάρκεια</th>
  </tr>
  <tr>
    <td>Κεφάλας Δημήτρης</td>
    <td>Εισαγωγή στην εκπαίδευση ενηλίκων</td>
    <td>12:00 - 13:25</td>
  </tr>
  <tr>
    <td>Γκασούκα Μαρία</td>
    <td>Συμβουλευτική Ψυχολογία</td>
    <td>13:30 - 14:15</td>
  </tr>
  <tr>
    <td>Πατσιάδου Μαγδαληνή</td>
    <td>Παιδαγωγική της Ένταξης και συμπερίληψη</td>
    <td>14:20 - 15:35</td>
  </tr>
  <tr>
    <td>Κυριακός Δημήτρης</td>
    <td> Διαχείριση της πολυπολιτισμικής σχολικής τάξης</td>
    <td>15:40 - 16:20</td>
  </tr>
  <tr>
    <td colspan="3" style="padding: 10px;"><span style="color:red;">ΔΙΑΛΕΙΜΜΑ</span></td>
  </tr>
  <tr>
    <td>Τανός Ηλίας</td>
    <td>Διαδικασία Διάγνωσης – Διαφοροδιάγνωσης</td>
    <td>17:00 - 17:45</td>
  </tr>
  <tr>
    <td>Μήτσιου Γλυκερία</td>
    <td>Αρχές της διοίκησης στην εκπαίδευση</td>
    <td>17:50 - 18:35</td>
  </tr>
  <tr>
    <td>Πατσιάδου Μαγδαληνή</td>
    <td> Η ελληνική γλώσσα και η διδασκαλία της</td>
    <td>18:40 - 19:30</td>
  </tr>
  <tr>
    <td colspan="3" style="padding: 10px;"><span style="color:red;">ΛΗΞΗ</span></td>
  </tr>
</table>
<br><br>

<h2>Διάρκεια: 7 ώρες και 30 λεπτά</h2>

<br>

<?php
if(isset($_POST["logout"])){ // logging out
session_unset();
session_destroy();
echo "<script>setTimeout(function () {window.location.href= 'login.php'; },1000);</script>";	
}
?>
<footer>
	<div class="bottom">
		<p>Ένωση Ελλήνων Επιστημόνων © 2012-2020</p>
	</div>
</footer>

</body>
</html>
