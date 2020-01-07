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
	
  	if (isset($_GET["id"]) && $_GET["id"] !== "") {
//////////////////////////////////////////////////////////////////////////////////////				
	  //Prepare and execute a query to DELETE FROM using GET id in criterion - WHERE PersonID = ?
		$query="DELETE FROM people WHERE PersonID=?";
		$stmt=$mysqli->prepare($query);
		if ($stmt->execute([$_GET['id']])){
			$_SESSION["message"]="Person was successfully been deleted."; 
		}
		else{
			$_SESSION["message"]="Error! Could not delete person";
					}
			header("Location:readPeople.php");
	  
		
		
//////////////////////////////////////////////////////////////////////////////////////				
	}
	else {
		$_SESSION["message"] = "Person could not be found!";
		redirect("readPeople.php");
	}

			
			
//Define footer with the phrase "Who's Who"
//Release query results
//Close database
?>
<?php 
//Define footer with the phrase "Who's Who"
//Release query results
//Close database
new_footer("Who's Who");
$stmt -> close();
Database::dbDisconnect();

 ?>