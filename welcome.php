<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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

            //getting first name and last name
            $sql = "select first_name,last_name from users where id=$id";
            
            $result=mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            
            $first_name=$row['first_name'];
            $last_name=$row['last_name'];

            echo "<br><h1>Hello, $first_name $last_name<h1>";
            
            //closing the connection
            mysqli_close($conn);
        ?>
        <br>
        <h1>
            <a href="view.php?id=<?php echo $id ?>">View Info</a>
        </h1>
        <br><br>
        <h1>
            <a href="update.php?id=<?php echo $id ?>">Update Info</a>
        </h1>
        <br><br>
        <h1>
            <a href="delete.php?id=<?php echo $id ?>">Delete Account</a>
        </h1>
        <br><br>
        <h1>
            <a href="login.php">Logout</a>
        </h1>
    </center>
</body>
</html>