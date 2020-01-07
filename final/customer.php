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

if (!isset($_SESSION["username"])) {
	$_SESSION["message"] = "You must log in first";
	redirect("index2019.php");
}

//****************************************************************************/

	echo "<h3>Your Car Rental Reservation</h3>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Part 3d Prepare and execute QUERY 2b., displaying a customer's rental information.  Output results within the table
	$query="SELECT fname,lname,make,model,endDate,(endDate-startDate) as RentalDays,(endDate-startDate)*rate as TotalCharge,cType FROM carCust2019 NATURAL JOIN rental2019 NATURAL JOIN auto2019 NATURAL JOIN payment2019 WHERE carCust2019.username=?";
	$stmt=$mysqli->prepare($query);
	$stmt->execute([$_SESSION['username']]);
	if ($stmt) {
		$rowNum=$stmt->rowCount();
		if($rowNum===0){
			echo "<h2>No Reservations Found!</h2>";
		}
		else{
			echo "<table>";
			echo "<tbody>";
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$name=$row['fname']." ".$row['lname'];
				$vehicle=$row['make']." ".$row['model'];
				echo "<tr><td>".$name."<br/>".$vehicle."<br/>Return Date: ".$row['endDate']."<br/>Total Days Rented: ".$row['RentalDays']."<br/>Total Charge: $".$row['TotalCharge']."<br/>Credit Card: ".$row['cType']."</td></tr>";
			}
			echo "</tbody>";
			echo "</table>";
		}
	}
////////////////////////////////////////////////////////////////////////////


	else {
		echo "<h2>No Reservations Found!</h2>";
	}
?>
	
<p />
<a href='logout.php'>logout</a>
<?php 
new_footer(); 
///////////////////////////////////////////////////////////
// UNCOMMENT once code implemented and assuming you used this variable name
// for your prepared statements
   //$stmt -> close();
///////////////////////////////////////////////////////////
$stmt -> close();
Database::dbDisconnect();
?>