<?php
session_start();
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

      
        $_SESSION['user'] = [
            'name' => $user['name'],
            'email' => $user['email'],
        ];

        
        header("Location: homepage.php");
        exit();
    } else {
        echo "Invalid login credentials!";
    }
}
?>
