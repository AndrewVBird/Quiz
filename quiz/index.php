<html>
	<head>
		<meta charset="utf-8">
		<link rel=StyleSheet href="assets/CSS/StylesheetIndex.css" type="text/css">
		
		<h1>Welcome to the Yoga Quiz</h1>
		<img id="BG" src="assets/Images/BG.jpg">
		<?php
		session_start();
		if(isset($_SESSION["currentUser"]))
		{
			$session = file_get_contents("assets/Json/session.json");
			$json_a = json_decode($session, true);
			$pos=count($json_a['session']);
			$json_a['session'][$pos]["firstName"]=$_SESSION["currentUser"];
			$json_a['session'][$pos]["sessionDate"]="Logged Out ". date("Y-m-d H:i:s");
			$session = json_encode($json_a,TRUE);
			file_put_contents("assets/Json/session.json", $session);
		}
		?>
		<script>
			var test;
			function validateForm() {
				test=<?php echo file_get_contents("assets/Json/users.json");?>;
				var x = document.forms["login"]["username"].value;
				for(var i=0;i<test["users"].length;i++)
				{
					if(x.toLowerCase() == test['users'][i]["firstName"].toLowerCase())
						return true;
				}
				alert("Invalid username");
				return false;
			}
			
			function registerUser() {
				test=<?php echo file_get_contents("assets/Json/users.json");?>;
				var x = document.forms["register"]["newuser"].value;
				for(var i=0;i<test["users"].length;i++)
				{
					if(x.toLowerCase() == test['users'][i]["firstName"].toLowerCase())
					{
						alert("Username already in use!");
						return false;
					}
				}
				return true;
			}
			
		</script>
	</head>
	
	<body>
		<form  id="login" action="loggedIn.php" onsubmit="return validateForm()" method="post">
			<input id="loginBox" type="text" onClick="this.setSelectionRange(0, this.value.length)" name="username" value="Username">
			<input id="loginButton" type="submit" value="Login">
		</form>
		
		<form id="register" action="loggedIn.php" onsubmit="return registerUser()" method="post">
			<input id="regBox" type="text" onClick="this.setSelectionRange(0, this.value.length)" name='newuser' value="New Username">
			<input id="regButton" type="submit" value="Register">
		</form>
		
		<script src="assets/Json/users.json"></script>
	</body>
</html>
