<html>
	<meta charset="utf-8">
	<link rel=StyleSheet href="assets/CSS/StylesheetPictures.css" type="text/css">
	
	<head>
		<h1 id="picNum">Picture 1</h1>
		<img id="BG" src="assets/Images/BG.jpg">
		
		<img id="prev" src="assets/Images/20.jpg">
		<img id="current" src="assets/Images/1.jpg">
		<img id="next" src="assets/Images/2.jpg">
		
		<button id="nextButton" type="button" onClick="nextPic()">></button>
		<button id="prevButton" type="button" onClick="prevPic()"><</button>
		
		<script>
			var current=1;
			function nextPic()
			{
				current++;
				
				if(current>20)
					current=1;
				var next=current+1;
				if(next>20)
					next=1;
				var prev=current-1;
				if(prev<1)
					prev=20;
				
				document.getElementById("current").src="assets/Images/"+current+".jpg";
				document.getElementById("next").src="assets/Images/"+next+".jpg";
				document.getElementById("prev").src="assets/Images/"+prev+".jpg";
				document.getElementById("picNum").innerHTML="Picture "+current;
			}
			
			function prevPic()
			{
				current--;
				
				if(current<1)
					current=20;
				var next=current+1;
				if(next>20)
					next=1;
				var prev=current-1;
				if(prev<1)
					prev=20;
				
				document.getElementById("current").src="assets/Images/"+current+".jpg";
				document.getElementById("next").src="assets/Images/"+next+".jpg";
				document.getElementById("prev").src="assets/Images/"+prev+".jpg";
				document.getElementById("picNum").innerHTML="Picture "+current;
			}
		</script>
	</head>
	<body>
		<form id="menu" action="loggedIn.php">
			<input type="submit" value="Menu">
		</form>
	</body>
</html>
