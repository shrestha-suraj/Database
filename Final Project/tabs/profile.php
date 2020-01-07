<?php
    include("../html/header.html");
    require_once("../../database.php");
    require_once("functions.php");
	verify_login();
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
input{
    width:80%;
    background-color:white;
    border-radius:10px;
    text-align:center;
    padding:2px 2px 2px 2px;
    margin:5px 0px 5px 0px;
}
img{
  margin:10px;
}
</style>
  <?php
    if (isset($_POST['submit'])){
      if (isset($_POST['name']) && $_POST['name']!="" && isset($_POST['age']) && $_POST['age']!=="" && isset($_POST['address']) && $_POST['address']!=""){
        $query=$query="UPDATE userprofile SET Name=?,Age=?,Address=? WHERE Gameid=?";
        $stmt=$mysqli->prepare($query);
        $stmt->execute([$_POST["name"],$_POST["age"],$_POST["address"],$_SESSION['id']]);
        if($stmt){
          $_SESSION['name']=$_POST['name'];
          echo "Updated Information";
        }
        else {
          echo "Cannot update info.";
        }
      }
    }
  ?>

    <div class='container-fluid' align='center'>
          <!--Here lies the body code-->
          <?php
			if (isset($_GET['request']) && $_GET['request']=='delete' && isset($_SESSION['id'])){
			$query="DELETE FROM userprofile WHERE Gameid=?";
			$stmt=$mysqli->prepare($query);
			$stmt->execute([$_SESSION['id']]);
			$query="DELETE FROM accounts WHERE Gameid=?";
			$stmt=$mysqli->prepare($query);
			$stmt->execute([$_SESSION['id']]);
			if ($stmt){
				$_SESSION['id']="";
				header("Location:../index.php");
			}
			else{
				echo "Could not delete the account";
				header("Location:profile.php");
			}
		}
           if (isset($_GET['edit']) && $_GET['edit']==true){
              $query="SELECT * FROM userprofile WHERE Gameid=?";
              $stmt=$mysqli->prepare($query);
              $stmt->execute([$_SESSION['id']]);
              if ($stmt){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                echo "<div style='height:10px'></div>
                <div class='card' align='center'>
                <img src='../images/profile.png' alt='John' style='width:60%;'>
                    <form action='profile.php' method='POST'>
                    <p class='title'>GamerId : ".$row['Gameid']."</p>
                    <input name ='name' value='".$row['Name']."' style='font-size:40px; text-align:center;'/>
                    <p>".$row['Email']."</p>
                    <input name='age' value='".$row['Age']."'/>
                    <input name='address' value='".$row['Address']."'/>
                    <h4 style='text-align:center; text-decoration:underline'> Playing From</h4>
                    <h3 style='text-align:center;'>".$row['Country']."</h3>
                    <input type='submit' value='Update Info' id='submit_button' name='submit'/>
                    </form>
                </div>";
              }
            }
            else if (isset($_GET['delete']) && $_GET['delete']==true){
                echo "<script>
                if (confirm('Are you sure you want to delete this account?')) {
                    window.location.href = 'profile.php?request=delete';
                } else {
                    window.location.href = 'profile.php';
                }
                </script>";
            }
            else{
              $query="SELECT * FROM userprofile WHERE Gameid=?";
              $stmt=$mysqli->prepare($query);
              $stmt->execute([$_SESSION['id']]);
              if ($stmt){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                echo "<div style='height:10px'></div>
                <div class='card' align='center'>
                    <img src='../images/profile.png' style='width:60%;'>
                    <p class='title'>GamerId : ".$row['Gameid']."</p>
                    <h1>".$row['Name']."</h1>
                    <p>".$row['Email']."</p>
                    <p>Age: ".$row['Age']."</p>
                    <p style='font-weight:bold;text-align:center;width:80%;'>".$row['Address']."</p>
                    <h4 style='text-align:center; text-decoration:underline'> Playing From</h4>
                    <h3 style='text-align:center;'>".$row['Country']."</h3>
                    <a href='profile.php?edit=true'>Edit Profile Info</a>
                    <a href='profile.php?delete=true' style='background-color:red;'>Delete Profile</a>
                </div>";
              }
            }
          ?>
        
    </div>
</div>
</div>
  
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>