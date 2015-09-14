<!--Tara Moses-->
<!--Web Apps Assignment 7: File Chat-->
<!--January 27, 2014-->

<!DOCTYPE html>
<body bgcolor="#CD9B9B" style="text-align: center">
<font face="century gothic">
	<?php
		//start session and make $name a session variable
		session_start();
		$tempName=$_POST["login_name"];
		if (isset($tempName)) $_SESSION["permanent_name"]=$tempName;
		$name=$_SESSION["permanent_name"];
		echo "<h1>".$name."'s Chat Page</h1>";
		
		//set message and date+time
		$msg=$_GET["message"];
		if (!isset($_GET["message"])) $msg="";
		$today=date("M d, Y @ h:i A");
	
		//write messages to file
		$fwriter=fopen("words.txt",'a');
		if ($msg!="" && isset($_GET["send_msg"])) fwrite($fwriter, "<b>".$name." (".$today."): </b>".$msg."\r\n"); //no sending blank msgs
		fclose($fwriter);
		$msg="";
		
		//print things out whoo
		$freader=fopen("words.txt",'r');
		while (!feof($freader)) {
			echo fgets($freader).'<br>';
		}
	?>
	
	<form action="" method="get">
	<textarea type="input" name="message"></textarea>
	<input type="submit" value="Send" name="send_msg">
	<input type="submit" value="Refresh Like a Boss">
	</form>
	
	<br>
	<a href="../index.html">Back to Index</a>
</font>
</body>
</html>
