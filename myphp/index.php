<?php
    require_once("database.php");
?>
<?php
/*
    function printData($result){
        echo "<style>
                td{
                    border:solid green;
                }
        </style>";
        echo "<table style='border:solid;'><tr><th>Name</th><th>Pubg Name</th><th>Email</th><th>Password</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["Name"]."</td><td>".$row["Pubg_Name"]."</td><td>".$row["Email"]."</td><td>".$row["Password"]."</td></tr>";
        }
        echo "</table>";
    }*/
?>

<?php
    if (isset($_POST['submit'])){
        $db=Database::dbConnect();
        if (isset($_POST['email']) && $_POST['email']===""){
            header("Location:index.php?usermail=0");
        }
        if (isset($_POST['password']) && $_POST['password']===""){
            header("Location:index.php?pass=0");
        }
        if (isset($_POST['email']) && $_POST['email']!==""){
            if (isset($_POST['password']) && $_POST['password']!==""){
                $email =$_POST['email'];
                $password = $_POST['password'];
                $query = "SELECT * FROM players WHERE Email='".$email."' AND Password='".$password."'";
                $result = $db->query($query);
                $rows=$result->num_rows;
                if ($rows===1) {
                    header("Location:home.php");
                }
                else{
                    header("Location:index.php?account=0");
                }
            }
        }
    }
else{
    echo "<form action='index.php' method='POST' style='border:solid green;background-color:green;'>";
    echo "<input type='text' name='email' placeholder='USER EMAIL'/><br/>";
    if (isset($_GET["usermail"])){
        echo "<p>Please enter an email.</p>";
    }
    echo "<input type='text' name='password' placeholder='PASSWORD'/><br/>";
    if (isset($_GET["pass"])){
        echo "<p>Please enter password.</p>";
    }
    echo "<input type='submit' name='submit' value='Login'>";
    if (isset($_GET["account"])){
        echo "<p>There is no account with this email.</p>";
    }
    echo "</form>";
}
?>