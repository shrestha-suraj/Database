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

	echo "<h3>Add to Who's who!</h3>";
	echo "<div class='row'>";
	echo "<label for='left-label' class='left inline'>";

	if (isset($_POST["submit"])) {
		if( (isset($_POST["FirstName"]) && $_POST["FirstName"] !== "") && (isset($_POST["LastName"]) && $_POST["LastName"] !== "") &&(isset($_POST["Birthdate"]) && $_POST["Birthdate"] !== "") &&(isset($_POST["BirthCity"]) && $_POST["BirthCity"] !== "") &&(isset($_POST["BirthState"]) && $_POST["BirthState"] !== "") &&(isset($_POST["Region"]) && $_POST["Region"] !== "") ) {
//////////////////////////////////////////////////////////////////////////////////////////////////
					//STEP 2.
					//Create and prepare query to insert information that has been posted
					$query="INSERT INTO people(FirstName,LastName,Birthdate,BirthCity,BirthState,Region) VALUES (?,?,?,?,?,?)";
					$stmt=$mysqli->prepare($query);
					if ($stmt->execute([$_POST["FirstName"],$_POST["LastName"],$_POST["Birthdate"],$_POST["BirthCity"],$_POST["BirthState"],$_POST["Region"]])){
						$_SESSION["message"]=$_POST["FirstName"]." ".$_POST["LastName"]." has been added."; 
					}
					else{
						$_SESSION["message"]="Error! Could not add person";
					}
					header("Location:readPeople.php");
					
//////////////////////////////////////////////////////////////////////////////////////////////////


		}
		else {
				$_SESSION["message"] = "Unable to add person. Fill in all information!";
				header("Location:createPeople.php");
		}
	}
	
//////////////////////////////////////////////////////////////////////////////////////////////////
					// STEP 1.  Create a form that will post to this page: createPeople.php
					//          
					//          Include <input> tags for each of the attributes in person:
					//                  First Name, Last Name, Birthdate, Birth City, Birth State, Region
					//
					//			Finally, add a submit button - include the class 'tiny round button'
					echo "<form action='createPeople.php' method='POST'>";
					echo "First Name:<br/> <input type='text' name='FirstName'/><br/>";
					echo "Last Name:<br/> <input type='text' name='LastName'/><br/>";
					echo "Birthdate:<br/> <input type='text' name='Birthdate' placeholder='YYYY-MM-DD'/><br/>";
					echo "Birth City:<br/> <input type='text' name='BirthCity'/><br/>";
					echo "Birth State:<br/> <input type='text' name='BirthState'/><br/>";
					echo "Region:<br/> <input type='text' name='Region'/><br/>";
					echo "<input type='submit' name='submit' class='tiny round button' value='Add Person'/>";
					echo "</form>";
					
					
					
//////////////////////////////////////////////////////////////////////////////////////////////////
				
	
	echo "</label>";
	echo "</div>";
	echo "<br /><p>&laquo:<a href='readPeople.php'>Back to Main Page</a>";
	?>


<?php 
//Define footer with the phrase "Who's Who"
//Release query results
//Close database
new_footer("Who's Who");
$stmt -> close();
Database::dbDisconnect();

 ?>