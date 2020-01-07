<?php 
	require_once("included_functions.php");
	require_once("database.php");
	$mysqli=Database::dbConnect();
	$mysqli->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<?php new_header("Pick Your President"); ?>

    <form method="POST" action="listPresidentDB_2019.php">
	    <div class="row">
		  <label for="left-label" class="left inline">

			<h2>Pick Your President</h2>
			Choose your president:<select name="ID">
			<option></option>
			<?php
				$stmt=$mysqli->prepare("SELECT * from presidents");
				$stmt->execute();
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					echo "<option value='".$row['number']."'>".$row['number']."</option>";
				}
			?>			
			</select><p />		
			<hr>&nbsp;&nbsp;&nbsp;<b>OR</b> &nbsp;&nbsp;&nbsp; fill in zero or more values below<hr> <p />

				<p>First Name: <input name="Fname" type=text ></p>
				<p>Last Name: <input name="Lname" type=text ></p>
				<p>State:<select name="State">
			<option></option>
			<?php
				$stmt=$mysqli->prepare("SELECT DISTINCT state from presidents");
				$stmt->execute();
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					echo "<option value='".$row['state']."'>".$row['state']."</option>";
				}
			?>			
			</select><p />
				
				<p>Party:<select name="Party">
			<option></option>
			<?php
				$stmt=$mysqli->prepare("SELECT DISTINCT party from presidents");
				$stmt->execute();
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					echo "<option value='".$row['party']."'>".$row['party']."</option>";
				}
			?>			
			</select><p />
				<p>Term Number: <select name="Term">
			<option></option>
			<?php
				$stmt=$mysqli->prepare("SELECT DISTINCT term from presidents");
				$stmt->execute();
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					echo "<option value='".$row['term']."'>".$row['term']."</option>";
				}
			?>			
			</select><p />
				<p>Starting year of presidency (YYYY): <select name="Start">
			<option></option>
			<?php
				$stmt=$mysqli->prepare("SELECT DISTINCT start from presidents");
				$stmt->execute();
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					echo "<option value='".$row['start']."'>".$row['start']."</option>";
				}
			?>			
			</select><p />
				<p>Ending year of presidency (YYYY): <select name="End">
			<option></option>
			<?php
				$stmt=$mysqli->prepare("SELECT DISTINCT end from presidents");
				$stmt->execute();
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					echo "<option value='".$row['end']."'>".$row['end']."</option>";
				}
			?>			
			</select><p />
		  <input type="submit" name="submit" class="button tiny round" value="Find a President" />
		  </label>
      </div>
    </form>
<?php new_footer("Suraj Shrestha"); 
    $stmt -> close();
    Database::dbDisconnect();
?>
