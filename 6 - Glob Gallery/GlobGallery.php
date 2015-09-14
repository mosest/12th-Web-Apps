<!--Tara Moses-->
<!--Web Apps Assignment 6: Glob Gallery-->
<!--January 26, 2014-->

<!DOCTYPE html>
<body bgcolor="#bda27e" style="text-align: center">
<font face="century gothic">
	<h1>Picture Gallery</h1>
	
	<?php
		session_start();
		if (!isset($_SESSION["arrow"])) {
			$_SESSION["arrow"]=0;
		}
		$i=$_SESSION["arrow"];
		
		if (isset($_GET["arrow"])) {
			if ($_GET["arrow"]==">") $i++;
			else if ($_GET["arrow"]=="<") $i--;
		}
		
		$pictures=glob("*.png");
		
		if ($i>=count($pictures)) $i=0;
		else if ($i<0) $i=count($pictures)-1;
		$_SESSION["arrow"]=$i;
		
		$filename=$pictures[$i];
	?>
	
	<form action="" method="GET">
		<input type="submit" name="arrow" value="<">
		<?php
			echo "<img src='$filename' alt='$filename'>";
		?>
		<input type="submit" name="arrow" value=">">
	</form>
	
	<br>
	<a href="../index.html">Back to Index</a>
</font>
</body>
</html>
