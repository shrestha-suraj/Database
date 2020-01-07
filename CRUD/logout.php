<?php 
//Add beginning code to 
//1. Require the needed 3 files
//2. Connect to your database
require_once("session.php"); 
	require_once("included_functions.php");
	require_once("../database.php");
	$mysqli = Database::dbConnect();
	$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

verify_login();

if(!isset($_SESSION["admin"])) {
	$_SESSION["message"] = "You must login in first!";
	redirect("indexSHR.php");  //***********  REPLACE ABC with first 3 letters of your last name
}

//3. Output a message, if there is one
if (($output = message()) !== null) {
	echo $output;
}
/////////////////////////////////////////////////////////////////////////////////////////
// Step 10.  Kill the session by setting the username and admin_id to null
$_SESSION['username']==NULL;
$_SESSION['admin']==NULL;
////////////////////////////////////////////////////////////////////////////////////////

header("Location:indexSHR.php");	//*************  REPLACE ABC with first 3 letters of your last name
//Define footer with the phrase "Who's Who"
//Release query results
//Close database
new_footer("Who's Who");
	$stmt -> close();
	Database::dbDisconnect();

 ?>
