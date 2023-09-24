
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    //password get encrypted 
    $pass = password_hash($password, PASSWORD_DEFAULT);

    // reading file data as string (--file handling )
    $jsonString = @file_get_contents('user.json');  // @ error control operator used to suppresses error message 

    // converting string to php array or object
    $users = json_decode($jsonString);

    if (!$users) {
        $users = array(); // Initialize an empty array if "users.json" is empty or doesn't exist
    }

    $newUser = array(
        "name" => $name,
        "email" => $email,
        "password" => $pass
    );

    // appending the new user data in the old data (in old array)
    array_push($users, $newUser);
    // another method to push or append on the php array 
    // $users[] = $newUser;


    // to convert php array back to JSON formate
    $updatedJson = json_encode($users,  JSON_PRETTY_PRINT); //  JSON_PRETTY_PRINT is to make formate json data looks helps to  beautyfull 

    // to write on file (--file handling )
    if (file_put_contents('user.json', $updatedJson) !== false){
        echo'<div> <p>'. $name. ', You have Successfully Registerd </p> </div>';
        echo '<div> <a href="login.php">login<a/> </div>';
    } else{
        echo "not Registered";
    }
} else {
    echo " else part";
}




?>