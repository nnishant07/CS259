<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <center>
        <br><br>
        <h2>User Registration</h2>
        <br><br>
        <form name="form" action="insert.php" method="post">
            <div>
                <div>
                    <label>First Name:</label> 
                    <input type="text" name="first_name" value="" required/>
                </div>
                <br>
                <div>
                    <label>Last Name:</label>
                    <input type="text" name="last_name" value=""/>    
                </div>
                <br>
                <div>
                    <label>Email:</label>
                    <input type="text" name="email" value="" required/>    
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
                    <input type="Submit">
                </div>
            </div>
        </form>
        <br><br>
        <h1>
            <a href="login.php">Login</a>
        </h1>
    </center>
</body>
</html>