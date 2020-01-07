<?php 

//Add beginning code to 
//1. Require the needed 3 files
//2. Connect to your database
//3. Output a message, if there is one
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
	
	echo "<h3>Update to Who's who!</h3>";
	echo "<div class='row'>";
	echo "<label for='left-label' class='left inline'>";

	if (isset($_POST["submit"])) {
		if( (isset($_POST["FirstName"]) && $_POST["FirstName"] !== "") && (isset($_POST["LastName"]) && $_POST["LastName"] !== "") &&(isset($_POST["Birthdate"]) && $_POST["Birthdate"] !== "") &&(isset($_POST["BirthCity"]) && $_POST["BirthCity"] !== "") &&(isset($_POST["BirthState"]) && $_POST["BirthState"] !== "") &&(isset($_POST["Region"]) && $_POST["Region"] !== "") ) {
					echo "Log1";
					$query="UPDATE people SET FirstName=?,LastName=?,Birthdate=?,BirthCity=?,BirthState=?,Region=? WHERE PersonID=?";
					echo "Log2";
					$stmt=$mysqli->prepare($query);
					echo "Log3";
					if ($stmt->execute([$_POST["FirstName"],$_POST["LastName"],$_POST["Birthdate"],$_POST["BirthCity"],$_POST["BirthState"],$_POST["Region"],$_POST["ID"]])){				
						echo "Log4";
						$_SESSION["message"]=$_POST["FirstName"]." ".$_POST["LastName"]." has been changed";
					}
					else{
						$_SESSION["message"]="Error! Could not change ".$_POST["FirstName"]." ".$_POST["LastName"];
					}
					header("Location:readPeople.php");
		}
		else {
				$_SESSION["message"] = "Unable to add person. Fill in all information!";
				redirect("readPeople.php");
		}
		

	}
	else {
///////////////////////////////////////////////////////////////////////////////////////////
	  //Step 1.
	  if (isset($_GET["id"]) && $_GET["id"] !== "") {
	  //Prepare and execute a query to SELECT * using GET id in criterion - WHERE PersonID = ?
		$query="SELECT * FROM people WHERE PersonID=?";
		$stmt=$mysqli->prepare($query);
		//Verify statement successfully executed - I assume that results are returned to variable $stmt
		if ($stmt->execute([$_GET["id"]]))  {
			//Fetch associative array from executed prepared statement
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			//Output whose profile we are updating
			//UNCOMMENT ONCE YOU'VE COMPLETED THE FILE
			echo "<h3>".$row["FirstName"]." ".$row["LastName"]."'s Profile</h3>";
			//Create form with inputs for each field in people table, pre-populating the values
			//DON'T FORGET your submit button - use class attribute (i.e., class='button tiny round')
			echo "<form action='editPeople.php' method='POST'>";
			echo "<input type='hidden' name='ID' value='".$row['PersonID']."'/>";
			echo "First Name:<br/> <input type='text' name='FirstName' value='".$row['FirstName']."'/><br/>";
			echo "Last Name:<br/> <input type='text' name='LastName' value='".$row['LastName']."'/><br/>";
			echo "Birthdate:<br/> <input type='text' name='Birthdate' placeholder='YYYY-MM-DD' value='".$row['Birthdate']."'/><br/>";
			echo "Birth City:<br/> <input type='text' name='BirthCity' value='".$row['BirthCity']."'/><br/>";
			echo "Birth State:<br/> <input type='text' name='BirthState' value='".$row['BirthState']."'/><br/>";
			echo "Region:<br/> <input type='text' name='Region' value='".$row['Region']."'/><br/>";
			echo "<input type='submit' name='submit' class='tiny round button' value='Update Person'/>";
			echo "</form>";
///////////////////////////////////////////////////////////////////////////////////////////
			echo "<br /><p>&laquo:<a href='readPeople.php'>Back to Main Page</a>";
			echo "</label>";
			echo "</div>";
					

		}
		//Query failed. Return to readPeople.php and output error
		else {
			$_SESSION["message"] = "Person could not be found!";
			redirect("readPeople.php");
		}
	  }
    }
					
//Define footer with the phrase "Who's Who"
//Release query results
//Close database
new_footer("Who's Who");
$stmt->close();
Database::dbDisconnect();
?>