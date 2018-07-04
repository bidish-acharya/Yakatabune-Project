<?php
session_start();
include "functions.php";

if (isset($_POST['loginBtn'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt=$conn->prepare('SELECT * FROM users WHERE username=? AND password=? ');
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result=$stmt->get_result();

    if ($result->num_rows > 0) {

        $user = mysqli_fetch_all($result,MYSQLI_ASSOC);

        $_SESSION["username"] = $user[0]['username'];
        $_SESSION["role"] = $user[0]['role'];
        $_SESSION["user_id"] = $user[0]['id'];

        $_SESSION["message"] = "Successfully logged in!";
        $_SESSION["messageType"] = "success";
        redirect("../control/dashboard.php");
    } else {
        $_SESSION["message"] = "Incorrect username/password";
        $_SESSION["messageType"] = "error";
        redirect("../auth/login.php");
    }
}

if (isset($_POST['logoutBtn'])) {
    session_destroy();
    redirect("../auth/login.php");
}
?>