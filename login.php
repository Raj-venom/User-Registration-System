<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="form">
            <form action="login.php" method="POST" >

                <div class="row">
                    <label for="email">Email</label>
                    <input type="text" name="email" >
                </div>

                <div class="row">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" >
                </div>

                <button type="submit">Login</button>
                
            </form>
        </div>
    </div>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    echo($email);
    
} else{
    echo "<br> New User? =><a href='register.html'>Sign up </a> ";
}




?>