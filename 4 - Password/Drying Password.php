<!--Tara Moses-->
<!--Web Apps Assignment 4.1: Password 1-->
<!--January 21, 2014-->

<!DOCTYPE html>
<body bgcolor="#FFFF99" style="text-align: center">
<font face="century gothic">
	<h1>I FEED ON ANSWERS PLEASE HELP I'M STARVING</h1>
	
	What gets wetter as it dries??
	
	<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
		Answer: <input type="password" name="pw">
		<input type="submit">
	</form>
		
	<?php
		$passHash="226f863b64bf6f0ac880a84f13fb09a5";
		$password=$_POST["pw"];
		
		if (md5($password)==$passHash) header('Location: Baboon Password.php');
		else if ($password!=null) echo "Wrong answer, sorry.";
	?>
	
	<br>
	<a href="../index.html">Back to Index</a>
</font>
</body>
</html>
