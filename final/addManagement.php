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

if (isset($_POST["submit"])) {
	echo "Log1";
  if (isset($_POST["username"]) && $_POST["username"] !== "" && isset($_POST["password"]) && $_POST["password"] !== "") {
	echo "Log2";
	$username = $_POST["username"];
	$password = $_POST["password"];
	$hashedPassword=password_encrypt($password);
		$query = "SELECT * FROM login2019 WHERE username=?";
		$stmt=$mysqli->prepare($query);
		$stmt->execute([$username]);
		if($stmt){
			echo "Log3";
			$row=$stmt->rowCount();
			if ($row===1){
				echo "Log4";
					$_SESSION['message']='Username already exists in system.';
					header('Location:addManagement.php');
			}
			else{
				echo "Log5";
				$query1='INSERT into login2019 VALUES(?,?,?)';
				$stmt1->$mysqli->prepare($query);
				$stmt1->execute([$username,$hashedPassword,'y']);
				if($stmt1){
					$_SESSION['message']='Employee has been created.';
				}
				else{
					$_SESSION['message']="Error! Couldnot create the employee.";
				}
				header('Location:addManagement.php');
			}
			
		}
		else{
			echo "Log6";
			$_SESSION['message']='Username already exists';
			header('Location:addManagement.php');
		}
		
	

	 }
	}
?>

		<?php echo "Log1"?>
			<h3>Creata a New Management Member</h3>
			<label  for='center-label' class='center'>

			<form action="addManagement.php" method="post">
			  <p>&nbsp;&nbsp;Username:&nbsp;&nbsp;
				<input type="text" name="username"  />
			  </p>
			  <p>&nbsp;&nbsp;Password:&nbsp;&nbsp;
				<input type="password" name="password" value="" />
			  </p>
			  <input type="submit" name="submit" value="Submit" class="tiny round button" />
			</form>
			</label>

<?php 
new_footer(); 
///////////////////////////////////////////////////////////
// UNCOMMENT once code implemented and assuming you used this variable names
// for your prepared statements
   $stmt1 -> close();
   $stmt->close();
///////////////////////////////////////////////////////////
Database::dbDisconnect();
?>