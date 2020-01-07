<?php
    include("../html/header.html");
    require_once("functions.php");
    require_once("../../database.php");
    verify_login();
    $mysqli = Database::dbConnect();
    $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
      <div class="container-fluid">
          <p>  Your Custom Created Game Events are here</p>
          <?php
                    $query="SELECT * FROM customevents WHERE Gameid=?";
			        $stmt=$mysqli->prepare($query);
                    $stmt->execute([$_SESSION['id']]);
                    if ($stmt){
                        $countRow=$stmt->rowCount();
                        if ($countRow>0){
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<div style='width:200px;height:fit-content;border:solid red;margin:20px;padding:10px;' align='left'>";
                                echo "<p>Game Type: ".$row['Gametype']."</p>";
                                echo "<p>Game Date: ".$row['Date']."</p>";
                                echo "<p>Start Time (UTC): ".$row['Start']."</p>";
                                echo "<p>End Time (UTC)".$row['End']."</p>";
                                echo "<p>Prize<br/>".$row['Prize']."</p>";
                                echo "</div>";
                            }
                        }
                    }
                    Database::dbDisconnect();
          ?>
    </div>

  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>