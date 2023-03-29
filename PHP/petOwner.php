<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP PetOwner Table Example</title>
	</head>	
	<body>
		<h4>Query: Select id,fname, lname, address, picture, cc_details from PetOwner; </h4>
		<table border="1">		
			<tr>
				<td><h2>ID</h2></td>
				<td><h2>First name</h2></td>
				<td><h2>Last name</h2></td>
				<td><h2>address</h2></td>
				<td><h2>cc_details</h2></td>
                <td><h2>picture</h2></td>				
			</tr>
			<?php			
				include('dbConfig.php');
				echo "Host: ".$host." Database: ".$database. " user: ".$username." password: ".$password ;							
				//Set connection to UTF-8
				mysqli_query($db,"SET NAMES utf8");
				
				//Select data
				$query = "Select id,fname, lname, address, picture, cc_details from PetOwner;";
				
				$result = mysqli_query($db,$query) or die("Bad Query.");
				mysqli_close($db);

				while($row = $result->fetch_array())
				{		
					echo "<tr>";
					echo "<td><h2>" .$row['id'] . "</h2></td>";
					echo "<td><h2>" .$row['fname'] . "</h2></td>";
					echo "<td><h2>" .$row['lname'] . "</h2></td>";
					echo "<td><h2>" .$row['address'] . "</h2></td>";
					echo "<td><h2>" .$row['cc_details'] . "</h2></td>";
					echo "<td><h2><img src=petOwner_blobs.php?id=".$row['id']." width=200 height=150/></h2></td>";
 				    echo "</tr>";
				}
			?>
		<table>
	</body>
</html>