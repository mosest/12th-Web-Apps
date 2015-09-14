<!--Tara Moses-->
<!--Web Apps Assignment 5: Adorable Creatures-->
<!--January 23, 2014-->

<!DOCTYPE html>
<body bgcolor="#FFB6C1" style="text-align: center">
<font face="century gothic">
	<h1>Create an adorable creature!</h1>
	If you don't plan on taking care of it and loving it, then just GET OUT, YOU ANIMAL HATER.
	
	<?php
		//set iTop
		session_start();
		if (!isset($_SESSION["iTop"])) { //if iTop isn't set, set it to 0
			$_SESSION["iTop"]=0;
		}
		$iTop=$_SESSION["iTop"];
		
		if (isset($_GET["top_button"])) {
			if ($_GET["top_button"]==">") $iTop++;
			else if ($_GET["top_button"]=="<") $iTop--;
		}
		
		$iTop=(($iTop%3)+3)%3;
		$_SESSION["iTop"]=$iTop;

		//set iMid
		if (!isset($_SESSION["iMid"])) { //if iMid isn't set, set it to 0
			$_SESSION["iMid"]=0;
			$iMid=0;
		} else $iMid=$_SESSION["iMid"];
		
		if (isset($_GET["mid_button"])) {
			if ($_GET["mid_button"]==">") $iMid++;
			else if ($_GET["mid_button"]=="<") $iMid--;
		}
		$iMid=(($iMid%3)+3)%3;
		$_SESSION["iMid"]=$iMid;

		//set iBot
		if (!isset($_SESSION["iBot"])) { //if iBot isn't set, set it to 0
			$_SESSION["iBot"]=0;
			$iBot=0;
		} else $iBot=$_SESSION["iBot"];
		
		if (isset($_GET["bot_button"])) {
			if ($_GET["bot_button"]==">") $iBot++;
			else if ($_GET["bot_button"]=="<") $iBot--;
		}
		$iBot=(($iBot%3)+3)%3;
		$_SESSION["iBot"]=$iBot;
	?>
	
	<br>
		<form action="" method="GET">
		<input type="submit" name="top_button" value="<">
		<?php
			$jTop=$iTop+1;
			echo "<img src='TOP_$jTop.png' alt='head'>";
		?>
		<input type="submit" name="top_button" value=">">
		
		<br>
		<input type="submit" name="mid_button" value="<">
		<?php
			$jMid=$iMid+1;
			echo "<img src='MID_$jMid.png' alt='body'>";
		?>
		<input type="submit" name="mid_button" value=">">
		
		<br>
		<input type="submit" name="bot_button" value="<">
		<?php
			$jBot=$iBot+1;
			echo "<img src='BOT_$jBot.png' alt='tail'>";
		?>
		<input type="submit" name="bot_button" value=">">
	</form>
	
	<br>
	<a href="../index.html">Back to Index</a>
</font>
</body>
</html>
