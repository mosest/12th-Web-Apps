<!--Tara Moses-->
<!--Web Apps Assignment 4.2: Password 2-->
<!--January 22, 2014-->

<!DOCTYPE html>
<body bgcolor="#FFFF99" style="text-align: center">
<font face="century gothic">
	<h1>NOT ENOUGH FOOD GIB MOAR PLS</h1>
	
	A group of baboons is called a ____.
	
	<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
		Answer: <input type="password" name="pw">
		<input type="submit">
	</form>
		
	<?php
		$passHash="bfc2e0ac776bb1455d7f9a74374872e6";
		$password=$_POST["pw"];
		
		if (md5($password)==$passHash) header('Location: Answer Password.php');
		else if ($password!=null) echo "Dreadfully incorrect.";
	?>
	
	<br>
	<a href="../index.html">Back to Index</a>
</font>
</body>
</html>
