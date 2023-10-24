<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'password1234') {
        $_SESSION['username'] = $username;
        header('Location: home.php');
        exit();
    } else {
        echo "Invalid username or password. <a href='index.php'>Try Again</a>";
    }
}
?>
