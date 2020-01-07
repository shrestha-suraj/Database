<?php
  //SELECT Eventid,Gametype,Gamedate,Start,End,Prize FROM gamerecord NATURAL JOIN gamedata NATURAL JOIN accounts WHERE accounts.Gameid=1 AND gamerecord.Eventid=gamedata.Eventid AND accounts.Gameid=gamedata.Gameid;
    include("../html/header.html");
    require_once("../../database.php");
    require_once("functions.php");
    verify_login();
?>
<style>
table{
    border:solid 3px;
  }
  table td,tr,th{
    border:solid red;
  }
</style>

      <div class="container-fluid" >
        <?php
      $mysqli = Database::dbConnect();
      $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query="SELECT Gameid from accounts WHERE Username=?";
      $stmt=$mysqli->prepare($query);
      $stmt->execute([$_SESSION['username']]);
      if ($stmt){
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $id=$row['Gameid'];
        $query="SELECT Gametype,Gamedate,Start,End,WinnerId,Prize_Name,Prize_Cost FROM gamerecord NATURAL JOIN gamedata NATURAL JOIN Prize_Record WHERE gamedata.Gameid=? AND gamedata.Eventid=gamerecord.Eventid AND gamerecord.Prizeid=Prize_Record.Prize_Id";
		$stmt=$mysqli->prepare($query);
        $stmt->execute([$id]);
        if ($stmt) {
          echo "<div style='width:100%;' align='center'>";
          echo "<center>";
          echo "<h2>Your Game History</h2>";
          echo "<table>";
          echo "  <thead>";
          echo "    <tr><th>Game Name</th><th>Game Type</th><th>Gamedate</th><th>Start Time</th><th>End Time</th><th>Prize</th><th>Prize Worth</th><th>My Winnings</th></tr>";
          echo "  </thead>";
          echo "  <tbody>";
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td value='PUBG'>PUBG</td>";
            echo "<td value='".$row['Gametype']."'>".$row['Gametype']."</td>";
            echo "<td value='".$row['Gamedate']."'>".$row['Gamedate']."</td>";
            echo "<td value='".$row['Start']."'>".$row['Start']."</td>";
            echo "<td value='".$row['End']."'>".$row['End']."</td>";
            echo "<td value='".$row['Prize_Name']."'>".$row['Prize_Name']."</td>";
			echo "<td value='".$row['Prize_Cost']."'>".$row['Prize_Cost']."</td>";
			if ($_SESSION['id']===$row['WinnerId']){
			echo "<td value='You Won'>You Won</td>";
			}
			else{
			echo "<td value='You Lost'>You Lost</td>";
			}
			
            echo "</tr>";
      }
      echo "  </tbody>";
      echo "</table>";
      echo "</center>";
      echo "</div>";
      
    }
      }
      else{
        echo "Error! Couldnot execute query.";
      }
      
	    
  ?>
    </div>

  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>