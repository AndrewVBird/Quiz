<html>
	<meta charset="utf-8">
	<link rel=StyleSheet href="assets/CSS/StylesheetLoggedIn.css" type="text/css">
	<?php
		date_default_timezone_set('Europe/London');
		session_start();
		if(isset($_POST["newuser"]))
		{
			$_SESSION["currentUser"]=$_POST["newuser"];
			$string = file_get_contents("assets/Json/users.json");
			$json_a = json_decode($string, true);
			$json_a['users'][count($json_a['users'])]["firstName"]=$_POST['newuser'];
			$string = json_encode($json_a,TRUE);
			file_put_contents("assets/Json/users.json", $string);
			$session = file_get_contents("assets/Json/session.json");
			$json_a = json_decode($session, true);
			$pos=count($json_a['session']);
			$json_a['session'][$pos]["firstName"]=$_POST['newuser'];
			$json_a['session'][$pos]["sessionDate"]="Registered on ". date("Y-m-d H:i:s");
			$session = json_encode($json_a,TRUE);
			file_put_contents("assets/Json/session.json", $session);
		}
		else if(isset($_POST["username"]))
		{
			$_SESSION["currentUser"]=$_POST["username"];
			$session = file_get_contents("assets/Json/session.json");
			$json_a = json_decode($session, true);
			$pos=count($json_a['session']);
			$json_a['session'][$pos]["firstName"]=$_POST['username'];
			$json_a['session'][$pos]["sessionDate"]="Logged In ". date("Y-m-d H:i:s");
			$session = json_encode($json_a,TRUE);
			file_put_contents("assets/Json/session.json", $session);
		}
	?>
	<head>
		<h1>Welcome to the Yoga Quiz</h1>
		<img id="BG" src="assets/Images/BG.jpg">
	</head>
	
	<body>
		<form id="start" action="quiz.php">
			<input id="startQuiz" type="submit" value="Start Quiz!">
		</form>
		
		<form id="pictures" action="pictures.php">
			<input id="loadPics" type="submit" value="Look at Pictures!">
		</form>
		
		<form id="stats" action="stats.php">
			<input id="checkStats" type="submit" value="Stats">
		</form>
		
		<form id="logout" action="index.php" method="post">
			<input id="logOut" type="submit" value="Log Out">
		</form>
	</body>
</html>
