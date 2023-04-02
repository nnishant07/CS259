<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Delete</title>
</head>
<body>
    <center>
        <?php
            $id=$_GET['id'];
        ?>
        <br><br>
        <h1>Do you really want to delete your account ?</h1>
        <br>
        <h1>
            <a href="delete_acc.php?id=<?php echo $id ?>">YES</a>
        </h1>
        <br><br>
        <h1>
            <a href="welcome.php?id=<?php echo $id ?>">NO</a>
        </h1>
        <br><br>
        <h1>
            <a href="login.php">Logout</a>
        </h1>
    </center>
</body>
</html>