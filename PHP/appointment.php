<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP Appointment Table Example</title>
	</head>	
	<body>
		<h4>Query: Select animalID,petOwnerID, staffID, appDate, appTime, location, symptoms, notes from Appointment; </h4>
		<table border="1">		
			<tr>
				<td><h2>ANIMAL ID</h2></td>
				<td><h2>PETOWNER ID</h2></td>
				<td><h2>STAFF ID</h2></td>
				<td><h2>APPOINTMENT DATE</h2></td>
				<td><h2>APPOINTMENT TIME</h2></td>
				<td><h2>LOCATION</h2></td>
				<td><h2>SYMPTOMS DATE</h2></td>
				<td><h2>NOTES</h2></td>

				
			</tr>
			<?php			
				include('dbConfig.php');
				echo "Host: ".$host." Database: ".$database. " user: ".$username." password: ".$password ;							
				//Set connection to UTF-8
				mysqli_query($db,"SET NAMES utf8");
				
				//Select data
				$query = "Select animalID,petOwnerID, staffID, appDate, appTime, location, symptoms, notes from Appointment;";
				
				$result = mysqli_query($db,$query) or die("Bad Query.");
				mysqli_close($db);

				while($row = $result->fetch_array())
				{		
					echo "<tr>";
					echo "<td><h2>" .$row['animalID'] . "</h2></td>";
					echo "<td><h2>" .$row['petOwnerID'] . "</h2></td>";
					echo "<td><h2>" .$row['staffID'] . "</h2></td>";
					echo "<td><h2>" .$row['appDate'] . "</h2></td>";
					echo "<td><h2>" .$row['appTime'] . "</h2></td>";
					echo "<td><h2>" .$row['location'] . "</h2></td>";
					echo "<td><h2>" .$row['symptoms'] . "</h2></td>";
					echo "<td><h2>" .$row['notes'] . "</h2></td>";
 				    echo "</tr>";
				}
			?>
		<table>
	</body>
</html>