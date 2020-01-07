<?php
    include("../html/header.html");
    require_once("functions.php");
    verify_login();
    require_once("../../database.php");
    $mysqli = Database::dbConnect();
    $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

#submit_button ,a{
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  border-radius:0;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}


button:hover, a:hover {
  opacity: 0.7;
}
input, select {
    width:100%;
    background-color:white;
    border-radius:10px;
    text-align:center;
    padding:2px 2px 2px 2px;
    margin:5px 0px 5px 0px;
    margin-bottom:30px;
}

</style>
      <div class="container-fluid" align="center">
	  <?php
            if (isset($_POST['submit'])){
              if (isset($_POST['game_type']) && $_POST['game_type']!=="" && isset($_POST['date']) && $_POST['date']!=="" && isset($_POST['start']) && $_POST['start']!=="" && isset($_POST['end']) && $_POST['end']!=="" && isset($_POST['game_prize']) && $_POST['game_prize']!==""){
                $query="INSERT INTO customevents VALUES (?,?,?,?,?,?)";
                $stmt=$mysqli->prepare($query);
                $stmt->execute([$_SESSION['id'],$_POST['game_type'],$_POST['date'],$_POST['start'],$_POST['end'],$_POST['game_prize']]);
                header("Location:myevents.php");  
              }
              header("Location:events.php");
            }
            else{
              echo "
              <p>Sorry there are no events around you. Create your own event?</p>
	  
              <div style='height:10px'></div>
                    <div class='card' align='center'>
                    <h2 style='text-align:center;background-color:red;padding:5px;'> Create Game Event</h2>
                        <form action='events.php' method='POST'>
                            <p class='title' style='margin:0;'>Game Type </p>
                            <select name='game_type'>
                              <option></option>
                              <option value='Solo'>Solo</option>
                              <option value='Duo'>Duo</option>
                              <option value='Squad'>Squad</option>
                            </select>
                            <p class='title' style='margin:0;'>Game Event Date</p>
                            <input name ='date' type='text' placeholder='YYYY-MM-DD'/>
                            <p class='title' style='margin:0;'>Start Time (UTC)</p>
                            <input name ='start' type='text' placeholder='HH:MM:SS'/>
                            <p class='title' style='margin:0;'>End Time (UTC)</p>
                            <input name ='end' type='text' placeholder='HH::MM:SS'/>
                            <p class='title' style='margin:0;'>Game Prize </p>
                            <select name='game_prize'>
                              <option></option>
                              <option value='Amazon Gift Card ($100)'>Amazon Gift Card  ($100)</option>
                              <option value='Play Station 4 ($200)'>Play Station 4 ($200)</option>
                              <option value='Lenovo Thinkpad Monitor ($120)'>Lenovo Thinkpad Monitor ($120)</option>
                              <option value='Razor Elite Mouse ($80)'>Razor Elite Mouse ($80)</option>
                              <option value='Gigabyte Gaming CPU ($380)'>Gigabyte Gaming CPU ($380)</option>
                              <option value='Starbucks Gift Card ($120)'>Starbucks Gift Card ($120)</option>
                              <option value='Logitech Gaming Chair ($60)'>Logitech Gaming Chair ($60)</option>
                              <option value='Dell Wireless Mouse+Keyboard ($135)'>Dell Wireless Mouse+Keyboard ($135)</option>
                              <option value='X-Box One ($190)'> X-Box One ($190)</option>
                              <option value='Sony 1000 XM2 ($199)'>Sony 1000 XM2 ($199)</option>
                            </select>
                  <input type='submit' name='submit' style='background-color:green;color:white' value='Create Event'>
                  </form>
                        </div>
            </div>";
            }
          ?>
     

  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>