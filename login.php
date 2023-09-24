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
            <form action="login.php" method="POST">

                <div class="row">
                    <label for="email">Email</label>
                    <input type="text" name="email">
                </div>

                <div class="row">
                    <label for="pass">Password</label>
                    <input type="password" name="pass">
                </div>

                <button type="submit">Login</button>

            </form>
        </div>
    </div>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // echo ($email);

    // reading file data as string (--file handling )
    $jsonString = @file_get_contents('user.json');  // @ error control operator used to suppresses error message 

    // converting string to php array or object
    $users = json_decode($jsonString);

    if (!$users) {
        $users = array(); // Initialize an empty array if "users.json" is empty or doesn't exist
    }

    $loginSucess = false; // Initalize a flag to tack login sucess
    // to get all array data using loop
    foreach ($users as $user) {
        $db_email = $user->email; // '$user->email' is just like "$user['email']" as this is object we are using $user->email
        $db_password  = $user->password;

        // to check if passwrord and email matched
        if (password_verify($pass, $db_password) and $email === $db_email) {

            $loginSucess = true; // set flag to true if login sucessfull;
            break; // exit the loop
        }

        if ($loginSucess) {
            echo "Login sucessfully ";
        } else {
            echo "Invalid email or passwrod";
        }
    }
} else {
    echo "<br> New User? =><a href='register.html'>Sign up </a> ";
}




?>