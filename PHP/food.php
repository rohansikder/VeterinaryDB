<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP Food Table Example</title>
	</head>	
	<body>
		<h4>Query: Select animal, supplier, size, price, quantity from food; </h4>
		<table border="1">		
			<tr>
				<td><h2>ANIMAL</h2></td>
				<td><h2>SUPPLIER</h2></td>
				<td><h2>SIZE</h2></td>
				<td><h2>PRICE</h2></td>
				<td><h2>QUANTITY</h2></td>

				
			</tr>
			<?php			
				include('dbConfig.php');
				echo "Host: ".$host." Database: ".$database. " user: ".$username." password: ".$password ;							
				//Set connection to UTF-8
				mysqli_query($db,"SET NAMES utf8");
				
				//Select data
				$query = "Select animal, supplier, size, price, quantity from food;";
				
				$result = mysqli_query($db,$query) or die("Bad Query.");
				mysqli_close($db);

				while($row = $result->fetch_array())
				{		
					echo "<tr>";
					echo "<td><h2>" .$row['animal'] . "</h2></td>";
					echo "<td><h2>" .$row['supplier'] . "</h2></td>";
					echo "<td><h2>" .$row['size'] . "</h2></td>";
					echo "<td><h2>" .$row['price'] . "</h2></td>";
					echo "<td><h2>" .$row['quantity'] . "</h2></td>";
 				    echo "</tr>";
				}
			?>
		<table>
	</body>
</html>