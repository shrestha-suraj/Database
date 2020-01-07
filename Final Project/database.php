<?php
	require_once("/home/sshrest4/DBShresthaSuraj.php");
class Database {
  private static $mysqli = null;

  public function __construct() {
    die('Init function error');
  }

  public static function dbConnect() {
	//try connecting to your database
	try {
		$mysqli=new PDO("mysql:host=localhost;dbname=project",USERNAME,PASSWORD);
		echo "Successful Connection";
	}

//catch exception
	catch(Exception $e) {
		echo "Could not connect";
	}
	
	//catch a potential error, if unable to connect
 
 
    return $mysqli;
  }

  public static function dbDisconnect() {
    $mysqli = null;
  }
}
?>
