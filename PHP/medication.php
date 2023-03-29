<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP Medication Table Example</title>
	</head>	
	<body>
		<h4>Query: Select id, name, datasheet, price, cause from medication; </h4>
		<table border="1">		
			<tr>
				<td><h2>ID</h2></td>
				<td><h2>NAME</h2></td>
				<td><h2>DATASHEET</h2></td>
				<td><h2>PRICE</h2></td>
				<td><h2>CAUSE</h2></td>

				
			</tr>
			<?php			
				include('dbConfig.php');
				echo "Host: ".$host." Database: ".$database. " user: ".$username." password: ".$password ;							
				//Set connection to UTF-8
				mysqli_query($db,"SET NAMES utf8");
				
				//Select data
				$query = "Select id, name, datasheet, price, cause from medication;";
				
				$result = mysqli_query($db,$query) or die("Bad Query.");
				mysqli_close($db);

				while($row = $result->fetch_array())
				{		
					echo "<tr>";
					echo "<td><h2>" .$row['id'] . "</h2></td>";
					echo "<td><h2>" .$row['name'] . "</h2></td>";
					echo "<td><h2>" .$row['datasheet'] . "</h2></td>";
					echo "<td><h2>" .$row['price'] . "</h2></td>";
					echo "<td><h2>" .$row['cause'] . "</h2></td>";
 				    echo "</tr>";
				}
			?>
		<table>
	</body>
</html>