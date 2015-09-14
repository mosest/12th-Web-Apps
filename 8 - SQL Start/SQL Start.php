<!--Tara Moses-->
<!--Web Apps Assignment 8: SQL Start-->
<!--February 3, 2013-->

<!DOCTYPE html>
<body bgcolor="#FFDAB9" style="text-align: center">
<font face="century gothic">
	<h1>Let's Work With a Database!</h1>
	
	<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
		Name:<input type="text" name="name">
		Number:<input type="text" name="number">
		<br />
		<input type="submit" name="insert" value="Insert into Database">	
		<br />
		<input type="submit" name="delete" value="Delete from Database">	
	</form>
	
	<?php
		$username="mosest";
		$password="password";
		$database="mosest";
		
		mysql_connect("localhost",$username,$password);
		mysql_select_db($database);
		
		$name=$_GET["name"];
		$number=$_GET["number"];
		
		if (isset($_GET["insert"])) {
			//insert things!! YAY
			$query="INSERT INTO `names+phonenumbers`(`Username`, `Phone_number`) VALUES ('$name','$number')";
			mysql_query($query);
		}
		
		if (isset($_GET["delete"])) {
			$query="DELETE FROM `mosest`.`names+phonenumbers` WHERE `names+phonenumbers`.`Username` = '$name'";
			mysql_query($query);
		}
		
		$result=mysql_query("SELECT * FROM `names+phonenumbers`");
			
		echo "<b><br />Database Data:</b><br />";
		if ($result!=false) {
			while ($row=mysql_fetch_array($result)) {
				echo $row['Username']." - ".$row['Phone_number'].'<br />';
			}
		}
	?>
	
	<br>
	<a href="../index.html">Back to Index</a>
</font>
</body>
</html>
