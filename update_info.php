<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating Info</title>
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
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $password=$_POST['password'];
            $confirm_password=$_POST['confirm_password'];

            //checking first name
            if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)){
                echo "<h1> Only letters allowed in First Name !<h1>";
                exit();
            }

            //checking last name
            if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)){
                echo "<h1> Only letters allowed in Last Name !<h1>";
                exit();
            }

            //password strength
            $number=preg_match('@[0-9]@',$password);
            $uppercase=preg_match('@[A-Z]@',$password);
            $lowercase=preg_match('@[a-z]@',$password);
            $specialChars=preg_match('@[^\w]@',$password);
            
            if(strlen($password)<8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
                exit();
            }

            //confirmation match
            if($password!=$confirm_password){
                echo "<h2>Password and Confirm password not matching !<h2>";
                exit();
            }

            //Updating the data into database
            $sql="update users set first_name='$first_name',last_name='$last_name',password='$password' where id=$id";
        
            if(mysqli_query($conn,$sql)){
                echo "<h1> Info Updated ! <h1>";
            }else{
                echo "<h1> Update Failed ! <h1>";
            }

            //closing the connection
            mysqli_close($conn);
        ?>
        <br>
        <h1>
            <a href="welcome.php?id=<?php echo $id ?>">Return Home</a>
        </h1>
    </center>
</body>
</html>