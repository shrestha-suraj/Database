<?php   
	require_once("included_functions.php");
	require_once("database.php");
	$mysqli=Database::dbConnect();
	$mysqli->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	// Add require_once function calls as you did in take-home quiz
	// Also set up connecting to your database

	// Function to display one president's information
	function printPresInfo($p){
		$years = ($p["end"]-$p["start"]);
		echo "<tr>";
		echo "<td style='text-align:center'>"." ".$p["fname"].$p["mInitial"].$p["lname"]."</td>";
		echo "<td style='text-align:center'>"." ".$p["state"]."</td>";
		echo "<td style='text-align:center'>"." ".$p["party"]."</td>";
		echo "<td style='text-align:center'>"." ".$p["term"]."</td>";
		echo "<td style='text-align:center'>"." ".$p["start"]."</td>";
		echo "<td style='text-align:center'>"." ".$p["end"]."</td>";
		echo "<td style='text-align:center'>"." ".$years."</td>";
		echo "</tr>";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<?php new_header("Presidents"); ?>

<div class="row">
<label for="left-label" class="left inline">
<h2>Presidents</h2>
<?php
	//*******************  Add Code here to list presidents *******************
	 echo "<table border = '1'>";
     echo "<thead><tr><th>Name</th><th>State</th><th>Party</th><th>Term(s)</th><th>Starting Year</th><th>Ending Year</th><th>Total Years</th></tr></thead>";
     echo "<tbody>";
	 if(isset($_POST['ID'])&& ($_POST['ID']!=="")){
		 $ID=$_POST['ID'];
		$query="SELECT * FROM presidents WHERE number=?";
		$stmt=$mysqli->prepare($query);
		$stmt->execute([$ID]);
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					printPresInfo($row);
				}
		
    }
	else if (isset($_POST['Fname']) && $_POST['Fname']!==""){
        $FNAME=$_POST['Fname'];
		$query="SELECT * FROM presidents WHERE fname LIKE ?";
		$stmt=$mysqli->prepare($query);
		$stmt->execute(["%".$FNAME."%"]);
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					printPresInfo($row);
				}
      }
      else if (isset($_POST['Lname']) && $_POST['Lname']!==""){
        $LNAME=$_POST['Lname'];
		$query="SELECT * FROM presidents WHERE lname like ?";
		$stmt=$mysqli->prepare($query);
		$stmt->execute(["%".$LNAME."%"]);
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					printPresInfo($row);
				}
      }
      else if (isset($_POST['State']) && $_POST['State']!==""){
        $STATE=$_POST['State'];
		$query="SELECT * FROM presidents WHERE state=?";
		$stmt=$mysqli->prepare($query);
		$stmt->execute([$STATE]);
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					printPresInfo($row);
				}
      }
      else if (isset($_POST['Party']) && $_POST['Party']!==""){
        $PARTY=$_POST['Party'];
		$query="SELECT * FROM presidents WHERE party=?";
		$stmt=$mysqli->prepare($query);
		$stmt->execute([$PARTY]);
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					printPresInfo($row);
				}
      }
      else if (isset($_POST['Term']) && $_POST['Term']!==""){
        $TERM=$_POST['Term'];
		$query="SELECT * FROM presidents WHERE term=?";
		$stmt=$mysqli->prepare($query);
		$stmt->execute([$TERM]);
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					printPresInfo($row);
				}
      }
      else if (isset($_POST['Start']) && $_POST['Start']!==""){
        $START=$_POST['Start'];
		$query="SELECT * FROM presidents WHERE start=?";
		$stmt=$mysqli->prepare($query);
		$stmt->execute([$START]);
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					printPresInfo($row);
				}
      }
      else if (isset($_POST['End']) && $_POST['End']!==""){
        $END=$_POST['End'];
		$query="SELECT * FROM presidents WHERE end=?";
		$stmt=$mysqli->prepare($query);
		$stmt->execute([$END]);
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					printPresInfo($row);
				}
      }
	echo "</tbody>";
	echo "</table>";
?>

</label>
</div>
<?php new_footer("Suraj Shrestha"); 
	$stmt -> close();
    Database::dbDisconnect();
?>