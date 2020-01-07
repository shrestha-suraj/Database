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
  if (isset($_POST["username"]) && $_POST["username"] !== "" && isset($_POST["password"]) && $_POST["password"] !== "") {
	$username = $_POST["username"];
	$password = $_POST["password"];
/////////////////////////////////////////////////////////////////////////////////////
//IMPLEMENT FOR TAKE-HOME Part c.
//  Prepare and execute the query to verify that this username is in the database table login2019 
		//USE the variables $query and $stmt
		$query = "SELECT * FROM login2019 WHERE username=?";
		$stmt=$mysqli->prepare($query);
		$stmt->execute([$username]);
		if($stmt){
			$row=$stmt->rowCount();
			if ($row===1){
				$rowData=$stmt->fetch(PDO::FETCH_ASSOC);
				$matchPassword=password_check($password,$rowData['password']);
				if($matchPassword){
					$_SESSION['username']=$username;
					if($rowData['permission']==='y'){
						$_SESSION['admin']=$username;
						redirect("manage.php");
					}
					else if ($rowData['permission']==='n'){
						redirect('customer.php');
					}
				}
				else{
					$_SESSION['message']='Wrong Password Entered';
					redirect('index2019.php');
				}
			}
			else{
				$_SESSION['message']='Username/Password not found.';
				redirect('index2019.php');
			}
		}
		else{
			$_SESSION['message']='Username/Password not found.';
			redirect('index2019.php');
		}
		
		
		
		
		
		
///////////////////////////////////////////////////////////////////////////////////

		
	  //Check that the $stmt is true (username found) 
	  //If not, create a session message "Username/Password not fount"  and
	  //redirect to index2019.php


	  //First check whether the password entered matches the hashed password in the database - 
	  //This is an if-statement using password_check (do not hash entered password)
			
			
				//If the passwords match, assign the $_SESSION['username'] variable to $username
				//If NOT then create session message "Username/Password not found" and redirect to
				// index2019.php


					//Redirect depending on permission.  
					// If permission from the database for this user is 'y', 
					// create a session admin -> $_SESSION["admin"], assigning it $username, and
					// redirect to notImplementedManage.php
					
					// Otherwise permission from the database for this user is 'n', redirect to notImplementedCustomer.php

				
				
				
////////////////////////////////////////////////////////////////////////////////////

	 }
	}
?>

	
			<h3>Welcome to Wheely Cheap Car Rentals</h3>
			<label  for='center-label' class='center'>

			<form action="index2019.php" method="post">
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
   //$stmt -> close();
///////////////////////////////////////////////////////////
Database::dbDisconnect();
?>