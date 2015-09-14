<!--Tara Moses-->
<!--Web Apps Assigment 3.2: Calculator-->
<!--January 10, 2014-->

<!DOCTYPE html>
<body style="text-align: center">

	<h1>All-Powerful Calculator</h1>
	
	<form action="Calculator.php" method="post">
	<table border="0" align="center">
		<tr>
		<th>Number 1: </th>
		<th><input type="text" name="n1"></th>
		</tr>
		
		<tr>
		<th>Number 2: </th>
		<th><input type="text" name="n2"></th>
		</tr>
		
		<tr>
		<th>Operator: </th>
		<th><input type="text" name="op"></th>
		</tr>
		
		<tr>
		<th><input type="submit"></th>
		</tr>
	</table>
	</form>
	
	<br>
	<?php
		$num1=$_POST["n1"];
		$num2=$_POST["n2"];
		$operator=$_POST["op"];
		
		if ($operator=="+" || $operator=="-" || $operator=="*" || $operator=="/" || $operator=="\\" || $operator=="%") {
			if ($operator=="+") $sum=$num1+$num2;
			else if ($operator=="-") $sum=$num1-$num2;
			else if ($operator=="*") $sum=$num1*$num2;
			else if ($operator=="/") $sum=$num1/$num2;
			else if ($operator=="\\") $sum=$num1/$num2;
			else if ($operator=="%") $sum=$num1%$num2;
			
			echo "$num1 $operator $num2 = $sum";
		} else echo "THAT'S NO OPERATOR; THAT'S AN INVALID CHARACTER YOU FIEND >:0";
	?>
	
	<br>
	<a href="../index.html">Back to Index</a>

</body>
</html>
