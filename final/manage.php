<?php 
require_once("session.php"); 
require_once("final_functions.php"); 
require_once("database.php"); 

new_header();
$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
if (($output = message()) !== null) {
	echo $output;
}
//*****************  Uncomment once code is complete *************************

if (!isset($_SESSION["username"]) || !isset($_SESSION["admin"])) {
	$_SESSION["message"] = "You must log in as admin first";
	redirect("index2019.php");
}

//****************************************************************************
	echo "<h3>Car Rentals</h3>";


/////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Part 3b.  Prepare and execute QUERY 2a., displaying all car reservations in ascending order by last name
			$query="SELECT fname,lname, make,model,endDate,(endDate-startDate)*rate as RentAmount FROM auto2019 NATURAL JOIN rental2019 NATURAL JOIN carCust2019 ORDER BY lname ASC;";
			$stmt=$mysqli->prepare($query);
			$stmt->execute();
				//NOTE:  DO NOT NEED TABLE HEADER TAGS
				if ($stmt) {
					echo "<table>";
					echo "<tbody>";
					while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$name=$row['fname']." ".$row['lname'];
						echo "<tr><td value='".$name."'>".$name."</td>";
						echo "<td value='".$row['make']."'>".$row['make']."</td>";
						echo "<td value='".$row['model']."'>".$row['model']."</td>";
						echo "<td value='".$row['endDate']."'>".$row['endDate']."</td>";
						echo "<td value='$".$row['RentAmount']."'>$".$row['RentAmount']."</td><tr>";
					}
					
					echo "</tbody>";			
					echo "</table>";
				}
///////////////////////////////////////////////////////////////////////////////////////////
					
				echo "<p />";
				echo "<center>";
				echo "<a href='addCustomer.php'>Add a customer</a>&nbsp;|&nbsp;";
				echo "<a href='addManagement.php'>Add an employee</a>&nbsp;|&nbsp;";
				echo "<a href='logout.php'>logout</a>";
				echo "</center>";
				echo "<br /><br />";					
				echo "<hr />";
				
				
				echo "<h3>Available Cars</h3>";			
///////////////////////////////////////////////////////////////////////////////////////////
//  Part 3c.  Prepare and execute QUERIES 2c. & 2d., listing the total number of vehicles
//            for each make and mode (ascending) in the rental fleet.  Output results within the table

				//Create first query fetching distinct categories of autos (query 2d on your final).
				$query1="SELECT DISTINCT category FROM auto2019 ORDER BY category ASC";
				$stmt1=$mysqli->query($query1);
				$stmt1->execute();
				if ($stmt1) {
						while ($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
							$query2="SELECT make,model,count(model) as quantity from auto2019 WHERE category=? group by make,model ORDER BY make";
							echo "<h4>".$row1['category']."</h4>";
							$stmt2=$mysqli->prepare($query2);
							$stmt2->execute([$row1['category']]);
						//Create second query fetching the count of each make & model (query 2c on your final).
						//NOTE:  DO NOT NEED TABLE HEADER TAGS
						if ($stmt2) {
							echo "<table>";
							echo "<tbody>";
							while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
								echo "<tr><td>".$row2['make']."</td><td>".$row2['model']."</td><td>".$row2['quantity']."</td></tr>";
							}
							echo "</tbody>";			
							echo "</table>";
						}
						}
					
				}
///////////////////////////////////////////////////////////////////////////////////////////////
				
?>
	
			
<?php new_footer();
///////////////////////////////////////////////////////////
// UNCOMMENT once code implemented and assuming you used these variable names
// for your prepared statements
   $stmt -> close();
   $stmt1 -> close();
   $stmt2 -> close();
///////////////////////////////////////////////////////////
   Database::dbDisconnect();

 ?>