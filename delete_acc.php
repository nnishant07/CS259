<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting Account</title>
</head>
<body>
    <center>
        <?php
            $dbhost="localhost";
            $dbuser="root";
            $dbpass="Nishant@0710";
            $dbname="db";

            //Creating a DB connection
            $conn=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error . "\n");
            }

            $id=$_GET['id'];
            
            //Deleting the data from database
            $sql="delete from users where id=$id";
        
            if(mysqli_query($conn,$sql)){
                echo "<br><br><h1> Account Deleted ! <h1>";
            }else{
                echo "<br><br><h1> Deletion Failed ! <h1>";
            }

            //closing the connection
            mysqli_close($conn);
        ?>
        <br>
        <h1>
            <a href="reg.php">Register Again</a>
        </h1>
    </center>
</body>
</html>