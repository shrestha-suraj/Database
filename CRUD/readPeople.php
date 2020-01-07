<?php 
	require_once("session.php"); 
	require_once("included_functions.php");
	require_once("../database.php");
	verify_login();

	new_header("Here is Who's Who!"); 
	$mysqli = Database::dbConnect();
	$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if (($output = message()) !== null) {
		echo $output;
	}

	
	//****************  Add Query
	//  Query people to select PersonID, FirstName, and LastName, sorting in ascending order by LastName
		$query="SELECT PersonID, FirstName, LastName FROM people ORDER BY LastName ASC";
		



	//  Prepare and execute query
		$stmt=$mysqli->prepare($query);
		$stmt->execute();	
				 
	if ($stmt) {
		echo "<div class='row'>";
		echo "<center>";
		echo "<h2>Here is Who's Who</h2>";
		echo "<table>";
		echo "  <thead>";
		echo "    <tr><th>Name</th><th></th><th></th></tr>";
		echo "  </thead>";
		echo "  <tbody>";
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			$name=$row['FirstName']." ".$row['LastName'];
			echo "<td value='".$name."'>".$name."</td>";
			echo "<td><a href='editPeople.php?id=".urlencode($row['PersonID'])."'>Edit</a></td>";
			echo "<td ><a onclick='return confirm('Are you sure you want to delete?')' href='deletePeople.php?id=".urlencode($row['PersonID'])."'>Delete</a></td>";			
			echo "</tr>";
		}
		echo "  </tbody>";
		echo "</table>";
		echo "<br /><br /><a href='createPeople.php'>Add a person</a> | <a href='addLogin.php'>Add an admin</a> | <a href='logout.php'>Logout</a>";
		echo "</center>";
		echo "</div>";
		
	}
	new_footer("Who's Who");
	$stmt -> close();
	Database::dbDisconnect();
 ?>