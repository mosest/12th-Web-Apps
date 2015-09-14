<!--Tara Moses-->
<!--Web Apps Assignment 10: To-Do List-->
<!--February 14, 2014-->

<!DOCTYPE html>
<body bgcolor="#FF9900" style="text-align: center">
<font face="century gothic">
	<h1>Let's Be Productive!</h1>
	
	<table border="1" align="center">
		<tr>
		<th>Item Name</th>
		<th>Completed?</th>
		<th>Delete</th>
		</tr>

	<?php
		$username="mosest";
		$password="password";
		$database="mosest";
		
		mysql_connect("localhost",$username,$password);
		mysql_select_db($database);
		
		$itemToAdd=$_GET["item_to_add"];
		
		if (isset($_GET["start_adding"]) && item_to_add!="") {
			$query="INSERT INTO `todo items`(`Item_name`) VALUES ('$itemToAdd')";
			mysql_query($query);
			echo "Item added.<br />";
		}
			
		if (isset($_GET["tomarkasdone"])) {
			$query="UPDATE `mosest`.`todo items` SET `todo items`.`Is_completed` = 1 WHERE `todo items`.`ID` = ".$_GET["tomarkasdone"];
			mysql_query($query);
		}
			
		if (isset($_GET["todelete"])) {
			$query="DELETE FROM `mosest`.`todo items` WHERE `todo items`.`ID` = ".$_GET["todelete"];
			mysql_query($query);
		}
		
		$result=mysql_query("SELECT * FROM `todo items`");	
		while ($row=mysql_fetch_array($result)) {
			echo "<tr><td>".$row['Item_name']."</td>";
			if ($row['Is_completed']==0) echo "<td>
			<a href=\"Todo.php?tomarkasdone=".$row['ID']."\"><img src='done.png' alt='Done Button'></a>
			</td>";
			else echo "<td>COMPLETE YES</td>";
			echo "<td>
			<a href=\"Todo.php?todelete=".$row['ID']."\"><img src='delete.png' alt='Delete Button'></a>
			</td></tr>";
		}
	?>		
	</table>
	
	<h1>Insert to To-Do List:</h1>
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
	<input type="text" name="item_to_add">
	<input type="submit" name="start_adding" value="Add to List">
	</form>
	
	<br />
	<a href="../index.html">Back to Index</a>
</font>
</body>
</html>
