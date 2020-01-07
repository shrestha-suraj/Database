<?php
    require_once ("admin.php");
    class Database{
        private static $db =null;
        public function __construct(){
            die ("Init function error");
        }
        public static function dbConnect(){
            $db= new mysqli(DBHOST,USERNAME,PASSWORD,DBNAME);
            if ($db->connect_errno){
                echo "Cannot connect to the database.";
                return null;
            }
            echo "Yes connection";
            return $db;
        }

        public static function dbDisconnect(){
            $db->close();
        }

    }

?>