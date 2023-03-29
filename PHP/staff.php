<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP Staff Table Example</title>
	</head>	
	<body>
		<h4>Query: Select id, fName, address, picture, bio, salary, iban from staff; </h4>
		<table border="1">		
			<tr>
				<td><h2>ID</h2></td>
				<td><h2>Name</h2></td>
				<td><h2>Address</h2></td>
				<td><h2>Picture</h2></td>
				<td><h2>BIO</h2></td>
				<td><h2>salary</h2></td>
				<td><h2>IBAN</h2></td>
				
			</tr>
			<?php			
				include('dbConfig.php');
				echo "Host: ".$host." Database: ".$database. " user: ".$username." password: ".$password ;							
				//Set connection to UTF-8
				mysqli_query($db,"SET NAMES utf8");
				
				//Select data
				$query = "Select id, fName, address, picture, bio, salary, iban from staff;";
				
				$result = mysqli_query($db,$query) or die("Bad Query.");
				mysqli_close($db);

				while($row = $result->fetch_array())
				{		
					echo "<tr>";
					echo "<td><h2>" .$row['id'] . "</h2></td>";
					echo "<td><h2>" .$row['fName'] . "</h2></td>";
					echo "<td><h2>" .$row['address'] . "</h2></td>";
                    echo "<td><h2><img src=staff_blobs.php?id=".$row['id']." width=200 height=150/></h2></td>";					
					echo "<td><h2>" .$row['bio'] . "</h2></td>";
					echo "<td><h2>" .$row['salary'] . "</h2></td>";
					echo "<td><h2>" .$row['iban'] . "</h2></td>";
 				    echo "</tr>";
				}
			?>
		<table>
	</body>
</html>