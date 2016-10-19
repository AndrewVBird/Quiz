<html>
	<meta charset="utf-8">
	<link rel=StyleSheet href="assets/CSS/StylesheetStats.css" type="text/css">
	
	<head>
	<?php session_start();
	?>
		<h1 id="heading">Session History</h1>
		<img id="BG" src="assets/Images/BG.jpg">
			<h2 id="user">User: </h2>
		<script>
				var current=<?php echo json_encode($_SESSION["currentUser"]);?>;
				document.getElementById("user").innerHTML+=current;
		</script>
	</head>
	
	<body>
		<form id="menu" action="loggedIn.php">
			<input id="menuButton" type="submit" value="Menu">
		</form>
		
		<iframe id="subWindow" src="session.php">
		</iframe>
	</body>
</html>
