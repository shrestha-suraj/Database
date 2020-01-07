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

///*****************  Uncomment once code is complete *************************
/*
if (!isset($_SESSION["username"]) || !isset($_SESSION["admin"])) {
	$_SESSION["message"] = "Admin login required";
	redirect("index2019.php");
}
*/
//****************************************************************************/

?>

   <div id="page">
   <br /><br />
   <h2>Manager Page Under Construction</h2>
   	<br /><p>&laquo:<a href='index2019.php'>Back to Main Page</a>

   </div>

<?php 
new_footer(); 
Database::dbDisconnect();
?>