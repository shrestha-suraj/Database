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

///////////////////////////////////////////////////////////////////////////////////
//  Step 9  -  invoke verify_login
//				Will redirect to indexABC.php if there is not a SESSION admin_id set
//				**************** NOTE:  REPLACE ABC with the first 3 letters of your last name


/////////////////////////////////////////////////////////////////////////////////// 

//3. Output a message, if there is one
	if (($output = message()) !== null) {
		echo $output;
	}

	  
	  
///////////////////////////////////////////////////////////////////////////////////////////////
//  Step 4.  Check to see if form submitted username and password text boxes are filled in.
//           If it has, verify username and password have been set and are not empty fields
	if(isset($_POST['submit'])){
		if (isset($_POST['username']) && $_POST['username']!=='' && isset($_POST['password']) &&$_POST['password']!==""){
			$query="SELECT * FROM admins WHERE username=?";
			$stmt=$mysqli->prepare($query);
			$stmt->execute([$_POST['username']]);
			if ($stmt){
				$rows=$stmt->rowCount();
				if ($rows===1){
					$_SESSION['message']="The username already exists";
					header("Location:addLogin.php");
				}
				else{
					$encryptPassword=password_encrypt($_POST['password']);					
					$query="INSERT INTO admins(username,hashed_password) VALUES (?,?)";
					$stmt=$mysqli->prepare($query);
					$stmt->execute([$_POST['username'],$encryptPassword]);
					if ($stmt){
						$_SESSION['message']='Added Admin Successfully';
					}
					else{
						$_SESSION['message']='Couldnot add admin.';
					}
					header("Location:addLogin.php");
				}
			}
		}
	}



	    //Grab posted values for username and password, encrypting the password
		//so that it is set up to compare with the encrypted password in the database
		//Use password_encrypt

		
		
		//Query database for this "new" username

		
		
		//If the username DOES exist in table, create a session message - "The username already exists"
		//Reidrect back to addLogin.php

		
		
		
		//If the username DOES NOT exist in table, insert into table
		//Verify stmt successfully executes
		// If successful, create a session message - "User successfully added"
		// If NOT successful, create a session message - "Could not add user"
		//In both cases, redirect back to addLogin.php

		
		

			
			
////////////////////////////////////////////////////////////////////////////////////////////////
?>
		
		<div class='row'>
		<label for='left-label' class='left inline'>

		<h3>Add an administrator to Who's Who!</h3>

<!--//////////////////////////////////////////////////////////////////////////////////////////////// -->
<!--    Step 2. Create a form with textboxes for adding both a username and password -->
<form action="addLogin.php" method="POST">
	<p>Username:<input type="text" name="username" value=""/> </p> 
	<p>Password:<input type="password" name="password" value=""/></p>
	<input type="submit" name="submit" value="Add Administrator" />
</form>

	
	
	
<!--///////////////////////////////////////////////////////////////////////////////////////////////// -->


			<p><br /><br /><hr />
			<h2>Current Admins</h2>

<!--//////////////////////////////////////////////////////////////////////////////////////////////// -->
<!--    Step 3. Display current Administrators.  Also provide a link next to each person that allows you to delete -->
<!--            them from your database This requires including their id # in the query string -->
<?php
	$query="SELECT * FROM admins";
	$stmt=$mysqli->prepare($query);
	$stmt->execute();		 
	if ($stmt) {
		echo "<div class='row'>";
		echo "<center>";
		echo "<table>";
		echo "  <thead>";
		echo "    <tr><th>Username</th><th></th></tr>";
		echo "  </thead>";
		echo "  <tbody>";
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			$name=$row['username'];
			echo "<td value='".$name."'>".$name."</td>";
			echo "<td ><a onclick='return confirm('Are you sure you want to delete?')' href='deleteLogin.php?id=".urlencode($row['id'])."'>Delete</a></td>";			
			echo "</tr>";		}
		echo "  </tbody>";
		echo "</table>";
		echo "</center>";
		echo "</div>";
	}
			
?>		
			
			
			

<!--//////////////////////////////////////////////////////////////////////////////////////////////// -->
			
  	  <?php echo "<br /><p>&laquo:<a href='readPeople.php'>Back to Main Page</a>"; ?>
			
	</div>
	</label>

<?php 
//Define footer with the phrase "Who's Who"
//Release query results
//Close database
?>