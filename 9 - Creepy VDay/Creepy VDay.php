<!--Tara Moses-->
<!--Web Apps Index File-->
<!--December 20, 2013-->

<!DOCTYPE html>
<body bgcolor="#DC143C" style="text-align: center">
<font face="century gothic">
	<h1>Romantic E-Card Sender!</h1>
	
	<h2>Step 1: Write a caring message.</h2>
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
	<table border="0" align="center">
		<tr>
		<td>To:</td>
		<td><input type="text" name="toName" value="Name"></td>
		<td><input type="text" name="toEmail" value="E-mail Address"></td>
		</tr>
		
		<tr>
		<td>From:</td>
		<td><input type="text" name="fromName" value="Name"></td>
		<td><input type="text" name="fromEmail" value="E-mail Address"></td>
		</tr>
	</table>
	<br />
	<textarea type="input" name="message" cols="40">Type your message here <3</textarea>
		
	<h2>Step 2: Add a picture!</h2>		
	<table border="0" align="center">
		<tr>
		<td><img src='http://data2.whicdn.com/images/26931879/large.jpg' alt='a cat named malfoy??' width="200" height="200"></td>
		<td><img src='http://4.bp.blogspot.com/_FrRsAIfOGSM/SNMkx3JLGiI/AAAAAAAAAm8/OFhQyNDRJlo/s320/aye.jpg' alt='a baby bat!! :D' width="200" height="200"></td>
		</tr>
		
		<tr>
		<td><input type="radio" name="picture" value="cat"></td>
		<td><input type="radio" name="picture" value="bat"></td>
		</tr>
	</table>
	<br />
	
	<h2>Step 3: Send it! Have courage.</h2>
	<input type="submit" name="sendMail" value="Send! <3">
	</form>
	
	<?php
		$username="mosest";
		$password="password";
		$database="mosest";
		
		mysql_connect("localhost",$username,$password);
		mysql_select_db($database);
		
		$toName=$_POST["toName"];
		$toEmail=$_POST["toEmail"];
		$fromName=$_POST["fromName"];
		$fromEmail=$_POST["fromEmail"];
		$message=$_POST["message"];
		$messageDB=$message;
		$picture=$_POST["picture"];
		$dateTime=date("M d, Y @ h:i A");
		
		$subject="Happy Valentine's Day!";
		
		if (isset($_POST["sendMail"])) {
			//echo "from $from, to $toEmail: $message".'<br />';
			
			//send mail!!
			$headers='MIME-Version: 1.0'."\r\n";
			$headers.='Content-type: text/html; charset=iso-8859-1'."\r\n";
			$headers.="From: '$fromName' <'$fromEmail'>";
			
			if (isset($picture) && $picture=="cat") {
				//echo "cat was chosen i think";
				$pictureURL="http://data2.whicdn.com/images/26931879/large.jpg";
				$message.="<br /> <img src=\"http://data2.whicdn.com/images/26931879/large.jpg\" alt=\"a cat named malfoy??\" width=\"200\" height=\"200\">";
			} else if (isset($picture) && $picture=="bat") {
				//echo "bat was chosen maybe perhaps";
				$pictureURL="http://4.bp.blogspot.com/_FrRsAIfOGSM/SNMkx3JLGiI/AAAAAAAAAm8/OFhQyNDRJlo/s320/aye.jpg";
				$message.="<br /> <img src=\"http://4.bp.blogspot.com/_FrRsAIfOGSM/SNMkx3JLGiI/AAAAAAAAAm8/OFhQyNDRJlo/s320/aye.jpg\" alt=\"a baby bat!! :D\" width=\"200\" height=\"200\">";
			} else $pictureURL="";
			$message="Dear $toName,<br /><br />".$message."<br /><br />Love,<br />$fromName";
			$success=mail($toEmail,$subject,$message,$headers);
			
			$message=str_replace("'","\'",$message);
			$messageDB=str_replace("'","\'",$messageDB);
			
			//add to database
			$query="INSERT INTO `ecard data`(`From_name`, `From_email`, `To_name`, `To_email`, `Message`, `Image`, `Date+time`) VALUES ('$fromName','$fromEmail','$toName','$toEmail','$messageDB','$pictureURL','$dateTime')";
			mysql_query($query);
			
			if ($success) echo "<br />Your message has been sent!";
			else echo "<br />It didn't work exactly; please try again.";
		}
	?>
	<br />
	<a href="creepypage.php">The Most Romantic Page Ever</a>
	<br />
	<a href="../index.html">Back to Index</a>
</font>
</body>
</html>







