<!--Tara Moses-->
<!--Web Apps Assignment 11: Survey-->
<!--February 25, 2014-->

<!DOCTYPE html>
<body bgcolor="#ffdead" style="text-align: center">
<font face="century gothic">
	<h1>Let's Choose Things!</h1>
	
	<h2>Survey #1: Animals</h2>
	
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
	<table border="1" align="center">
		<?php
			$un="mosest";
			$pw="password";
			$db="mosest";
			
			mysql_connect("localhost",$un,$pw);
			mysql_select_db($db);
			
			$ipaddress=$_SERVER['REMOTE_ADDR'];
			
			//let's do a survey!
			$ipAnimalSearch=mysql_query("SELECT * FROM `votes` WHERE `IP_address` LIKE '$ipaddress' AND `Survey_ID`='1'");
			if (mysql_num_rows($ipAnimalSearch)==0) {
				echo "<table border='1' align='center'>";
				$records=mysql_query("SELECT * FROM `response choices` WHERE `Survey_ID`=1");
				echo "<i>Choose your favorite animal by clicking the circle next to it. Then, click \"Submit!\"</i>";
				while ($records!=false && $row=mysql_fetch_array($records)) {
					echo "<tr align='left'><td><input type='radio' name='animal' value='".$row['ID']."'>".$row['Response_name']."</td></tr>";
				}
				
				echo "<tr align='left'><td><input type='radio' name='animal' value='other_animal'><input type='text' name='other_animal' value='Other'></td></tr>";
				echo "<tr><td><input type='submit' name='submit_animal' value='Submit!'></td></tr>";	
				echo "</table>";
				
				$animalChoice=$_POST["animal"];
				$otherAnimal=$_POST["other_animal"];
				if (isset($_POST["submit_animal"])) {//submit animal button is pressed
					if (isset($animalChoice)) {//if an animal radio button was chosen
						$searchForCustom=mysql_query("SELECT * FROM  `response choices` WHERE `Response_name` LIKE '$otherAnimal'");
						if ($animalChoice=="other_animal" && mysql_num_rows($searchForCustom)==0) {//if user inputs a NEW option
							$query="INSERT INTO `response choices`(`Response_name`, `Survey_ID`) VALUES ('$otherAnimal', '1')";
							mysql_query($query);
							
							$row=mysql_fetch_array(mysql_query("SELECT * FROM `response choices` WHERE `Response_name` LIKE '$otherAnimal'"));
							$animalChoice=$row['ID'];
						}
						
						$query="INSERT INTO `votes`(`IP_address`, `Response_choice_ID`, `Survey_ID`) VALUES ('$ipaddress', '$animalChoice', '1')";
						mysql_query($query);
					}
					else echo "<strong>You need to select an option for this survey.<br /></strong>";
				}
			} else {
				//ip address is recorded! show percentage bars.
				$ipVoteID=mysql_fetch_array($ipAnimalSearch);
				$row=mysql_fetch_array(mysql_query("SELECT * FROM `Response choices` WHERE `ID`=".$ipVoteID['Response_choice_ID']));
				echo "<strong>You voted for ".$row['Response_name'].".<br /></strong>";
				
				echo "<table border='1' align='center'>";
				$records=mysql_query("SELECT * FROM `response choices` WHERE `Survey_ID`=1");
				$animalVoteCount=mysql_fetch_array(mysql_query("SELECT count(Survey_ID) AS total FROM `votes` WHERE `Survey_ID`=1"));
				while ($records!=false && $row=mysql_fetch_array($records)) {
					$count=mysql_fetch_array(mysql_query("SELECT count(Response_choice_ID) AS total FROM `votes` WHERE `Response_choice_ID`=".$row['ID']));
					echo "<tr align='left'><td>".$row['Response_name']."</td>";
					echo "<td><progress value='".$count['total']."' max='".$animalVoteCount['total']."'></progress></td></tr>";
				}				
				echo "</table>";
			}
			
			//now let's do a second survey!
			echo "<h2>Survey #2: Colors</h2>";
			
			$ipColorSearch=mysql_query("SELECT * FROM `votes` WHERE `IP_address` LIKE '$ipaddress' AND `Survey_ID`='2'");
			if (mysql_num_rows($ipColorSearch)==0) {
				echo "<table border='1' align='center'>";
				$records=mysql_query("SELECT * FROM `response choices` WHERE `Survey_ID`=2");
				echo "<i>Choose your favorite color by clicking the circle next to it. Then, click \"Submit!\"</i>";
				while ($records!=false && $row=mysql_fetch_array($records)) {
					echo "<tr align='left'><td><input type='radio' name='color' value='".$row['ID']."'>".$row['Response_name']."</td></tr>";
				}
				
				echo "<tr align='left'><td><input type='radio' name='color' value='other_color'><input type='text' name='other_color' value='Other'></td></tr>";
				echo "<tr><td><input type='submit' name='submit_color' value='Submit!'></td></tr>";	
				echo "</table>";
				
				$colorChoice=$_POST["color"];
				$otherColor=$_POST["other_color"];
				if (isset($_POST["submit_color"])) {//submit color button is pressed
					if (isset($colorChoice)) {//if an color radio button was chosen
						$searchForCustom=mysql_query("SELECT * FROM  `response choices` WHERE `Response_name` LIKE '$otherColor'");
						if ($colorChoice=="other_color" && mysql_num_rows($searchForCustom)==0) {//if user inputs a NEW option
							$query="INSERT INTO `response choices`(`Response_name`, `Survey_ID`) VALUES ('$otherColor', '2')";
							mysql_query($query);
							
							$row=mysql_fetch_array(mysql_query("SELECT * FROM `response choices` WHERE `Response_name` LIKE '$otherColor'"));
							$colorChoice=$row['ID'];
						}
						
						$query="INSERT INTO `votes`(`IP_address`, `Response_choice_ID`, `Survey_ID`) VALUES ('$ipaddress', '$colorChoice', '2')";
						mysql_query($query);
					}
					else echo "<strong>You need to select an option for this survey.<br /></strong>";
				}
			} else {
				//ip address is recorded! show percentage bars.
				$ipVoteID=mysql_fetch_array($ipColorSearch);
				$row=mysql_fetch_array(mysql_query("SELECT * FROM `Response choices` WHERE `ID`=".$ipVoteID['Response_choice_ID']));
				echo "<strong>You voted for ".$row['Response_name'].".<br /></strong>";
				
				echo "<table border='1' align='center'>";
				$records=mysql_query("SELECT * FROM `response choices` WHERE `Survey_ID`=2");
				$colorVoteCount=mysql_fetch_array(mysql_query("SELECT count(Survey_ID) AS total FROM `votes` WHERE `Survey_ID`=1"));
				while ($records!=false && $row=mysql_fetch_array($records)) {
					$count=mysql_fetch_array(mysql_query("SELECT count(Response_choice_ID) AS total FROM `votes` WHERE `Response_choice_ID`=".$row['ID']));
					echo "<tr align='left'><td>".$row['Response_name']."</td>";
					echo "<td><progress value='".$count['total']."' max='".$colorVoteCount['total']."'></progress></td></tr>";
				}				
				echo "</table>";
			}
			
			//now let's do a THIRD survey!!
			echo "<h2>Survey #3: Murder Methods</h2>";
			
			$ipMethodSearch=mysql_query("SELECT * FROM `votes` WHERE `IP_address` LIKE '$ipaddress' AND `Survey_ID`='3'");
			if (mysql_num_rows($ipMethodSearch)==0) {
				echo "<table border='1' align='center'>";
				$records=mysql_query("SELECT * FROM `response choices` WHERE `Survey_ID`=3");
				echo "<i>Choose your favorite method by clicking the circle next to it. Then, click \"Submit!\"</i>";
				while ($records!=false && $row=mysql_fetch_array($records)) {
					echo "<tr align='left'><td><input type='radio' name='method' value='".$row['ID']."'>".$row['Response_name']."</td></tr>";
				}
				
				echo "<tr align='left'><td><input type='radio' name='method' value='other_method'><input type='text' name='other_method' value='Other'></td></tr>";
				echo "<tr><td><input type='submit' name='submit_method' value='Submit!'></td></tr>";	
				echo "</table>";
				
				$methodChoice=$_POST["method"];
				$otherMethod=$_POST["other_method"];
				if (isset($_POST["submit_method"])) {//submit method button is pressed
					if (isset($methodChoice)) {//if an method radio button was chosen
						$searchForCustom=mysql_query("SELECT * FROM  `response choices` WHERE `Response_name` LIKE '$otherMethod'");
						if ($methodChoice=="other_method" && mysql_num_rows($searchForCustom)==0) {//if user inputs a NEW option
							$query="INSERT INTO `response choices`(`Response_name`, `Survey_ID`) VALUES ('$otherMethod', '3')";
							mysql_query($query);
							
							$row=mysql_fetch_array(mysql_query("SELECT * FROM `response choices` WHERE `Response_name` LIKE '$otherMethod'"));
							$methodChoice=$row['ID'];
						}
						
						$query="INSERT INTO `votes`(`IP_address`, `Response_choice_ID`, `Survey_ID`) VALUES ('$ipaddress', '$methodChoice', '3')";
						mysql_query($query);
					}
					else echo "<strong>You need to select an option for this survey.<br /></strong>";
				}
			} else {
				//ip address is recorded! show percentage bars.
				$ipVoteID=mysql_fetch_array($ipMethodSearch);
				$row=mysql_fetch_array(mysql_query("SELECT * FROM `Response choices` WHERE `ID`=".$ipVoteID['Response_choice_ID']));
				echo "<strong>You voted for ".$row['Response_name'].".<br /></strong>";
				
				echo "<table border='1' align='center'>";
				$records=mysql_query("SELECT * FROM `response choices` WHERE `Survey_ID`=3");
				$methodVoteCount=mysql_fetch_array(mysql_query("SELECT count(Survey_ID) AS total FROM `votes` WHERE `Survey_ID`=3"));
				while ($records!=false && $row=mysql_fetch_array($records)) {
					$count=mysql_fetch_array(mysql_query("SELECT count(Response_choice_ID) AS total FROM `votes` WHERE `Response_choice_ID`=".$row['ID']));
					echo "<tr align='left'><td>".$row['Response_name']."</td>";
					echo "<td><progress value='".$count['total']."' max='".$methodVoteCount['total']."'></progress></td></tr>";
				}				
				echo "</table>";
			}
		?>
	</form>
	<br>
	<a href="../index.html">Back to Index</a>
</font>
</body>
</html>
