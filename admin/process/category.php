<?php
session_start();
include "functions.php";

if(isset($_POST['_createCategory'])){
    unset($_POST['_createCategory']);

    $category = $_POST['category'];
    $description = $_POST['description'];

    $stmt=$conn->prepare('INSERT INTO category(category, description) VALUES(?,?)');
    $stmt->bind_param('ss', $category, $description);

    if($stmt->execute()){
        $_SESSION['message'] = "New category has been added.";
        $_SESSION["messageType"] = "success";
        redirect("../category/list.php");
    }
}

if(isset($_POST['delete'])){

    $id = $_POST['deleteId'];

    $stmt=$conn->prepare('DELETE FROM category WHERE id = ?');
    $stmt->bind_param('i', $id);

    if($stmt->execute()){
        $_SESSION['message'] = "Category has been deleted.";
        $_SESSION["messageType"] = "success";
        redirect("../category/list.php");
    }
}

if(isset($_POST['_updateCategory'])){

    unset($_POST['_updateCategory']);

    $id = $_POST['id'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    $stmt=$conn->prepare('UPDATE category SET category = ?, description = ? WHERE id = ?');
    $stmt->bind_param('ssi', $category, $description, $id);

    if($stmt->execute()){
        $_SESSION['message'] = "Category has been updated.";
        $_SESSION["messageType"] = "success";
        redirect("../category/list.php");
    }
}


?>