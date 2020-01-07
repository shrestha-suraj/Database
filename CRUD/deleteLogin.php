<?php 
//Add beginning code to 
//1. Require the needed 3 files
//2. Connect to your database
require_once("session.php"); 
require_once("included_functions.php");
require_once("../database.php");
verify_login();
new_header("Who's who Admin");
$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
new_header("Delete from Who's who!"); 
	
///////////////////////////////////////////////////////////////////////////////////
//  Step 9  -  invoke verify_login
//			   Will redirect to indexABC.php if there is not a SESSION admin_id set   
//             NOTE:  REPLACE ABC with the first 3 letters of your last name


///////////////////////////////////////////////////////////////////////////////////

//3. Output a message, if there is one
	if (($output = message()) !== null) {
		echo $output;
	}
///////////////////////////////////////////////////////////////////////////////////
// Step 5.  Get this admins ID and delete from the database
	if(isset($_GET['id']) && $_GET['id']!==""){
		$query="DELETE FROM admins WHERE id=?";
		$stmt=$mysqli->prepare($query);
		if ($stmt->execute([$_GET['id']])){
			$_SESSION["message"]="Person was successfully been deleted."; 
		}
		else{
			$_SESSION["message"]="Error! Could not delete person";
					}
			header("Location:addLogin.php");
//////////////////////////////////////////////////////////////////////////////////////				
	}
	else {
		$_SESSION["message"] = "Person could not be found!";
		redirect("addLogin.php");
	}
// Execute query and create a session message
// If successful (i.e., $stmt is true), output "Successfully deleted user"
// If unsuccessful, output "Unable to delete user"

//////////////////////////////////////////////////////////////////////////////////




redirect("addLogin.php");	
	
//Define footer with the phrase "Who's Who"
//Release query results
//Close database

?>