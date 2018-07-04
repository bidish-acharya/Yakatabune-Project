<?php
session_start();
include "functions.php";

if(isset($_POST['_createUser'])){
    unset($_POST['_createUser']);

    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt=$conn->prepare('INSERT INTO users (full_name, email, username, password, role) VALUES(?,?,?,?,?)');
    $stmt->bind_param('sssss', $fullName, $email, $username, $password, $role);

    if($stmt->execute()){
        $_SESSION["message"] = "New user added";
        $_SESSION["messageType"] = "success";
        redirect("../user/list.php");
    }
}

if(isset($_POST['delete'])){

    $id = $_POST['deleteId'];

    $stmt=$conn->prepare('DELETE FROM users WHERE id = ?');
    $stmt->bind_param('i', $id);

    if($stmt->execute()){
        $_SESSION["message"] = "User has been deleted";
        $_SESSION["messageType"] = "success";
        redirect("../user/list.php");
    }
}

if(isset($_POST['_updateUser'])){

    unset($_POST['_updateUser']);

    $id = $_POST['id'];
    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt=$conn->prepare('UPDATE users SET full_name = ?, username = ?, password = ?, email = ?, role = ? WHERE id = ?');
    $stmt->bind_param('sssssi', $fullName, $username, $password, $email, $role, $id);

    if($stmt->execute()){
        $_SESSION["message"] = "User has been updated";
        $_SESSION["messageType"] = "success";
        redirect("../user/list.php");
    }
}


?>