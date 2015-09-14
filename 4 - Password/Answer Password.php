<!--Tara Moses-->
<!--Web Apps Assignment 4.2: Password 2-->
<!--January 22, 2014-->

<!DOCTYPE html>
<body bgcolor="#FFFF99" style="text-align: center">
<font face="century gothic">
	<h1>THE FINAL ANSWER WILL ELIMINATE ALL HUNGER FOREVER PROBABLY.</h1> 
	
	What is the answer to the Ultimate Question?<br>
	
	<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
		Password: <input type="password" name="pw">
		<input type="submit">
	</form>
		
	<?php
		$passHash="a1d0c6e83f027327d8461063f4ac58a6";
		$password=$_POST["pw"];
		
		if (md5($password)==$passHash) header('Location: Drying Password.php');
		else if ($password!=null) echo "Nope!";
	?>
	
	<br>
	<a href="../index.html">Back to Index</a>
</font>
</body>
</html>
