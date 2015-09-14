<!--Tara Moses-->
<!--Web Apps Assignment 12: Javascript Intro-->
<!--March 31, 2014-->

<!DOCTYPE html>

<head>
<script type="text/javascript">
	isMagnified=false;
	
	function changeSize(x) {
		if (isMagnified) {
			x.height=30;
			x.width=30;
			isMagnified=false;
		}
		else {
			x.height=x.naturalHeight;
			x.width=x.naturalWidth;
			isMagnified=true;
		}
	}

</script>
</head>

<body bgcolor="#819c63" style="text-align: center">
<font face="century gothic">
	
	<h1>Javascript Photo Gallery</h1>
	
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
			echo "<img onclick='changeSize(this);' src='$filename' width=30 height=30 alt='$filename' />";
		?>
		<input type="submit" name="arrow" value=">">
	</form>
	
	<br>
	<a href="../index.html">Back to Index</a>
	
</font>
</body>

</html>
