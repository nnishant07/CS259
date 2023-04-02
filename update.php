<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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

            //closing the connection
            mysqli_close($conn);
        ?>
        <br><br>
        <h2>Update Information Form</h2>
        <br><br>
        <form name="update_form" action="update_info.php?id=<?php echo $_GET['id'] ?>" method="post">
            <div>
                <div>
                    <label>First Name:</label> 
                    <input type="text" name="first_name" value="<?php echo $first_name ?>" required/>
                </div>
                <br>
                <div>
                    <label>Last Name:</label>
                    <input type="text" name="last_name" value="<?php echo $last_name ?>"/>    
                </div>
                <br>
                <div>
                    <label>Password:</label>
                    <input type="password" name="password" value="" required/>    
                </div>
                <br>
                <div>
                    <label>Confirm Password:</label>
                    <input type="password" name="confirm_password" value="" required/>    
                </div>
                <br>
                <div>
                    <input type="submit">
                </div>
            </div>
        </form>
        <br><br>
        <h1>
            <a href="welcome.php?id=<?php echo $id ?>">Return Home</a>
        </h1>
    </center>
</body>
</html>