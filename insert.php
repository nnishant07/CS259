<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion</title>
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

            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $confirm_password=$_POST['confirm_password'];

            //checking first name
            if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)){
                echo "<h1> Only letters allowed in First Name !<h1>";
                echo '<br><br><h1><a href="reg.php">Register Again</a></h1>';
                exit();
            }

            //checking last name
            if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)){
                echo "<h1> Only letters allowed in Last Name !<h1>";
                echo '<br><br><h1><a href="reg.php">Register Again</a></h1>';
                exit();
            }

            //validating email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<h1> Invalid email format !<h1>";
                echo '<br><br><h1><a href="reg.php">Register Again</a></h1>';
                exit();
            }

            //password strength
            $number=preg_match('@[0-9]@',$password);
            $uppercase=preg_match('@[A-Z]@',$password);
            $lowercase=preg_match('@[a-z]@',$password);
            $specialChars=preg_match('@[^\w]@',$password);
            
            if(strlen($password)<8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
                echo '<br><br><h1><a href="reg.php">Register Again</a></h1>';
                exit();
            }

            //confirmation match
            if($password!=$confirm_password){
                echo "<h2>Password and Confirm password not matching !<h2>";
                echo '<br><br><h1><a href="reg.php">Register Again</a></h1>';
                exit();
            }

            //checking duplicate email
            $sql1 = "select id from users where email='$email'";
            
            $result=mysqli_query($conn,$sql1);
            $count = mysqli_num_rows($result);

            if($count==0){
                //Inserting the data into database
                $sql="insert into users values(NULL,'$first_name','$last_name','$email','$password')";
                if(mysqli_query($conn,$sql)){
                    echo "<br><h1> Insertion Successful ! <h1>";
                    echo '<br><br><h1><a href="login.php">Login</a></h1>';
                }else{
                    echo "<br><h1> Insertion Failed ! <h1>";
                    echo '<br><br><h1><a href="reg.php">Register Again</a></h1>';
                }
            }else{
                echo "<br><h1> Insertion Failed ! <h1>";
                echo "<br><h1>Duplicate Email . This Email is already in use .</h1>";
                echo '<br><br><h1><a href="reg.php">Register Again</a></h1>';
            }

            //closing the connection
            mysqli_close($conn);
        ?>
    </center>
</body>
</html>