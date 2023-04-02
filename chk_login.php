<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking Login</title>
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

            $email=$_POST['email'];
            $password=$_POST['password'];

            //Checking the data into database
            $sql = "select id from users where email='$email' and password='$password'";
            
            $result=mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            
            // If result matched $email and $password, table row must be 1 row
            if($count==1){
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $id=$row['id'];
                header("Location: welcome.php?id=$id");
            }else{
                echo "<br><br><h1>Wrong Email or Password<h1>";   
            }
            //closing the connection
            mysqli_close($conn);
        ?>
        <br><br>
        <h1>
            <a href="login.php">Login Again</a>
        </h1>
    </center>
</body>
</html>