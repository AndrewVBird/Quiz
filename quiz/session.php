<html>
	<meta charset="utf-8">
	<head>
	<h3 id="outer"></h3>
		<?php session_start();
		?>
		<script>
				var x=<?php echo file_get_contents("assets/Json/session.json");?>;
				var y=<?php echo json_encode($_SESSION["currentUser"]);?>;
				var out="";
				for(var i=0;i<x["session"].length;i++)
				{
					if(y.toLowerCase()==x["session"][i]["firstName"].toLowerCase())
					{
						out+=x["session"][i]["firstName"]+": "+x["session"][i]["sessionDate"]+"<br>";
					}
				}
				document.getElementById("outer").innerHTML=out;
		</script>
	</head>
	
	<body>
	</body>
</html>
