<?php
    session_start();
    require_once("../../database.php");
    require_once("../tabs/functions.php");
    $mysqli = Database::dbConnect();
    $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $username=$_POST['username'];
    $password=$_POST['pass'];
    $query="SELECT * FROM accounts WHERE Username=?";
    $stmt=$mysqli->prepare($query);
    $stmt->execute([$username]);
	if ($stmt){
        $rowcount = $stmt->rowCount();
        if ($rowcount==1){
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
			$matchPassword=password_check($password,$row['Password']);
			if ($matchPassword){
				$_SESSION['id']=$row["Gameid"];
				$_SESSION['username']=$row["Username"];
				$query="SELECT Name,Email FROM userprofile WHERE Gameid=?";
				$stmt=$mysqli->prepare($query);
				$stmt->execute([$row["Gameid"]]);
				$rowData=$stmt->fetch(PDO::FETCH_ASSOC);
				$_SESSION['name']=$rowData['Name'];
				$_SESSION['email']=$rowData['Email'];
                Database::dbDisconnect();
                header("Location:../tabs/home.php");
            }
			else{
				header("Location:../index.php?account=false");
			}
        }
        else{
            header("Location:../index.php?account=0");
        }
    }
    else{
        echo "Connection Error";
    }
?>