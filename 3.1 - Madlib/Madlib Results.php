<!--Tara Moses-->
<!--Web Apps Assigment 3.1: Madlib-->
<!--January 10, 2014-->

<!DOCTYPE html>
<body bgcolor="#336699" style="text-align: center">
<font face="century gothic">
	
	<?php	
		$noun1=$_POST["noun1"];
		$name=$_POST["name"];
		$adjective1=$_POST["adjective1"];
		$pastTenseVerb1=$_POST["pastTenseVerb1"];
		
		$title="$name the $noun1";
		$capsTitle=ucwords($title);
		
		echo "<h1>$capsTitle</h1>";	
		echo "There once was a $noun1 named $name. It was so $adjective1 that everyone $pastTenseVerb1. The end."
	?>
	
	<br>
	<a href="../index.html">Back to Index</a>

</font>
</body>
</html>
