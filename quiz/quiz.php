<html>
	<meta charset="utf-8">
	<link rel=StyleSheet href="assets/CSS/StylesheetQuiz.css" type="text/css">

	<head>
		<h1 id="topHeading">Question 1</h1>
		<h1 id="count">Correct Answers: 0</h1>
		<h2 id="answer"></h2>
		<img id="BG" src="assets/Images/BG.jpg">
		
		<form id="q1" action="javascript:;" onSubmit="return q1Check()">
			<p id="q1question">Select the card that goes with the Sanskrit name shown:</p>
			<p id="q1p"></p>
			<input id="q1img1" type="image" onClick="selected = '1'" src="">
			<input id="q1img2" type="image" onClick="selected = '2'" src="">
			<input id="q1img3" type="image" onClick="selected = '3'" src="">
			<input id="q1img4" type="image" onClick="selected = '4'" src="">
		</form>
		
		<form id="q2" action="javascript:;" onSubmit="return q2Check()">
			<p id="q2question">Select the English name for the card shown:</p>
			<img id="q2img" src="">
			<input id="q2p1" type="submit" onClick="selected = '1' "value="">
			<input id="q2p2" type="submit" onClick="selected = '2' "value="">
			<input id="q2p3" type="submit" onClick="selected = '3' "value="">
			<input id="q2p4" type="submit" onClick="selected = '4' "value="">
		</form>
		
		<button type="button" id="next" onClick="Question()">Next Question</button>
		
		<form id="menu" action="loggedIn.php">
			<input id="menuButton" type="submit" value="Menu">
		</form>
		
		<script>
			var qNum=0;
			var English;
			var Sanskrit;
			var selected;
			var correct;
			var correctCount=0;
			
			function English(arr) {
				English=arr;
			}
			function Sanskrit(arr) {
				Sanskrit=arr;
				Question();
			}
			
			function reset() {
				document.getElementById("answer").innerHTML="";
				document.getElementById("topHeading").innerHTML="Question "+qNum;
				q2.style.visibility="hidden";
				q1.style.visibility="hidden";
				for(var i=1;i<5;i++)
				{
					document.getElementById("q1img"+i).disabled=false;
					document.getElementById("q2p"+i).disabled=false;
				}
			}
			
			function Question() {
				if(qNum==10)
					document.location = "loggedIn.php";
				qNum++;
				
				reset();
				
				var i = (Math.random()*2);
				
				if(i<=1)
				{
					q1.style.visibility="visible";
					Question1();
				}
				else
				{
					q2.style.visibility="visible";
					Question2();
				}
				return false;
			}
			
			function Question1() {
				var i = Math.floor((Math.random()*20));
				document.getElementById("q1p").innerHTML= Sanskrit[i].name;
				
				var j= Math.floor((Math.random()*4)+1);
				var array = [i+1,21,21,21];
				
				for(var h=0;h<4;h++)
				{
					j=(j%4)+1;
					
					var used=true;
					while(used)
					{
						var k = Math.floor((Math.random()*20)+1);
						used=false;
						for(var m=0;m<=h;m++)
						{
							if(k==array[m])
								used=true;
						}
					}
					array[h+1]=k;
					
					if(h==2)
					{
						document.getElementById("q1img"+j).src="assets/Images/"+(i+1)+" blank.jpg";
						correct=i+1;
					}
					else
					{
						document.getElementById("q1img"+j).src="assets/Images/"+k+" blank.jpg";
					}
				}
			}
			
			function Question2() {
				var i = Math.floor((Math.random()*20)+1);
				document.getElementById("q2img").src = "assets/Images/"+i+" blank.jpg";
				
				var j= Math.floor((Math.random()*4)+1);
				var array = [i-1,21,21,21];
				
				for(var h=0;h<4;h++)
				{
					j=(j%4)+1;
					
					var used=true;
					while(used)
					{
						var k = Math.floor((Math.random()*20));
						used=false;
						for(var m=0;m<=h;m++)
						{
							if(k==array[m])
								used=true;
						}
					}
					array[h+1]=k;
					
					if(h==2)
					{
						document.getElementById("q2p"+j).value=English[i-1].name;
						correct=English[i-1].name;
					}
					else
					{
						document.getElementById("q2p"+j).value=English[k].name;
					}
				}
			}
			
			function q1Check()
			{
				q1Picture();
				
				var x=document.getElementById("q1img"+selected).src;
				x=x.substring(x.lastIndexOf('/')+1,x.indexOf('.'));
				
				if(x==correct)
				{
					document.getElementById("answer").innerHTML="Correct!";
					correctCount++;
					document.getElementById("count").innerHTML="Correct Answers: "+correctCount;
				}
				else
				{
					document.getElementById("answer").innerHTML="Wrong!";
				}
				return false;
			}
			
			function q1Picture()
			{
				for(var i=0;i<4;i++)
				{
					var x = document.getElementById("q1img"+(i+1)).src;
					x=x.substring(0,x.length-12)+".jpg";
					document.getElementById("q1img"+(i+1)).src=x;
					document.getElementById("q1img"+(i+1)).disabled=true;
				}
			}
			
			function q2Check()
			{
				q2Para();
				
				var x=document.getElementById("q2p"+selected).value;
				if(x==correct)
				{
					document.getElementById("answer").innerHTML="Correct!";
					correctCount++;
					document.getElementById("count").innerHTML="Correct Answers: "+correctCount;
				}
				else
				{
					document.getElementById("answer").innerHTML="Wrong!";
				}
				return false;
			}
			
			function q2Para()
			{
				for(var i=0;i<4;i++)
				{
					document.getElementById("q2p"+(i+1)).disabled=true;
				}
				var y=document.getElementById("q2img").src;
				y=y.substring(0,y.length-12)+".jpg";
				document.getElementById("q2img").src=y;
			}
		</script>
	</head>
	<body>
		<script src="assets/Json/english.json"></script>
		<script src="assets/Json/sanskrit.json"></script>
	</body>
</html>
