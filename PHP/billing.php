<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP Billing Table Example</title>
	</head>	
	<body>
		<h4>Query: Select id, appointmentID, foodID, medicationID, appDate, paymentType from billing; </h4>
		<table border="1">		
			<tr>
				<td><h2>ID</h2></td>
				<td><h2>APPOINTMENT ID</h2></td>
				<td><h2>FOOD ID</h2></td>
				<td><h2>MEDICATION ID</h2></td>
				<td><h2>APPOINTMENT DATE</h2></td>
				<td><h2>PAYMENT TYPE</h2></td>

				
			</tr>
			<?php			
				include('dbConfig.php');
				echo "Host: ".$host." Database: ".$database. " user: ".$username." password: ".$password ;							
				//Set connection to UTF-8
				mysqli_query($db,"SET NAMES utf8");
				
				//Select data
				$query = "select id, appointmentID, foodID, medicationID, appDate, paymentType from billing;";
				
				$result = mysqli_query($db,$query) or die("Bad Query.");
				mysqli_close($db);

				while($row = $result->fetch_array())
				{		
					echo "<tr>";
					echo "<td><h2>" .$row['id'] . "</h2></td>";
					echo "<td><h2>" .$row['appointmentID'] . "</h2></td>";
					echo "<td><h2>" .$row['foodID'] . "</h2></td>";
					echo "<td><h2>" .$row['medicationID'] . "</h2></td>";
					echo "<td><h2>" .$row['appDate'] . "</h2></td>";
					echo "<td><h2>" .$row['paymentType'] . "</h2></td>";
 				    echo "</tr>";
				}
			?>
		<table>
	</body>
</html>