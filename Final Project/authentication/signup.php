<?php
    session_start();
    require_once("../../database.php");
    require_once("../tabs/functions.php");
    $mysqli = Database::dbConnect();
	$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$name=$_POST['name'];
	$age=$_POST['age'];
	$email=$_POST['email'];
	$username=$_POST['username'];
    $password=password_encrypt($_POST['pass']);
    $address=$_POST['address'];
	$country=$_POST['country'];
	$query="SELECT * FROM userprofile WHERE Email=?";
    $stmt=$mysqli->prepare($query);
    $stmt->execute([$email]);
	if ($stmt){
		$rowcount = $stmt->rowCount();
        if ($rowcount==0){
            $query="INSERT INTO accounts (Username,Password) VALUES (?,?)";
			$stmt=$mysqli->prepare($query);
			$stmt->execute([$username,$password]);
			$query="SELECT Gameid FROM accounts WHERE Username=?";
			$stmt=$mysqli->prepare($query);
			$stmt->execute([$username]);
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$query="INSERT INTO userprofile VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt=$mysqli->prepare($query);
			$stmt->execute([$row['Gameid'],$email,$name,$age,$address,$country,0,0,0]);
			Database::dbDisconnect();
            header("Location:../index.php?registered=true");
        }
        else{
			echo "6";
            Database::dbDisconnect();
            header("Location:../index.php?account=1");
        }
    }
    else{
		echo "7";
        echo "Connection Error";
    }
?>