<?php
session_start();
include "functions.php";

if(isset($_POST['_createNews'])){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date("Y-m-d H:i:s", strtotime('today'));
    $user = $_POST['user'];
    $category = $_POST['category'];

    /* Image */

    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = round(microtime(true))%1000000 . basename($_FILES["image"]["name"]);
    $target_dir = "../uploads/";
    if(isset($_FILES['image']))
    {
        $target_file = $target_dir . $newfilename;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["_updateNews"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                //        echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
//                    session_start();
//                    $_SESSION['error'][] =  "File is not an image.";
                echo  "File is not an image.";
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file)) {
//                session_start();
//                $_SESSION['error'][] =  "Sorry, the file already exists.";
            echo "Sorry, the file already exists.";
            $uploadOk = 0;
        }

//             Check file size
//            if ($_FILES["image"]["size"] > 500000) {
//                $_SESSION['error'][] =  "Sorry, your file is too large.";
//                $uploadOk = 0;
//            }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "tif") {
            //    echo $imageFileType;
//                session_start();
//                $_SESSION['error'][] =  "Sorry, only JPG, JPEG, PNG, TIF & GIF files are allowed.";
            echo "Sorry, only JPG, JPEG, PNG, TIF & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your image was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $photo = $newfilename;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    /* -- */

    $stmt=$conn->prepare('INSERT INTO news(title, date, content, user, photo, category) VALUES(?,?,?,?,?,?)');
    $stmt->bind_param('sssisi', $title, $date, $content, $user, $photo, $category);

    if($stmt->execute()){

        $_SESSION['message'] = "Your news has been posted.";
        $_SESSION["messageType"] = "success";
        redirect("../news/list.php");
    }
}

if(isset($_POST['delete'])){

    $id = $_POST['deleteId'];

    $stmt=$conn->prepare('DELETE FROM news WHERE id = ?');
    $stmt->bind_param('i', $id);

    if($stmt->execute()){
        $_SESSION['message'] = "News has been deleted";
        $_SESSION["messageType"] = "success";
        redirect("../news/list.php");
    }
}

if(isset($_POST['_updateNews'])){


    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user = $_POST['user'];
    $date = date("Y-m-d H:i:s", strtotime('today'));
    $categoryList = $_POST['category'];

    /* Image */

    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = round(microtime(true))%1000000 . basename($_FILES["image"]["name"]);
    $target_dir = "../uploads/";

//        echo(isset($_FILES['image']));
    if(!empty($_FILES['image']['name']))
    {
        $target_file = $target_dir . $newfilename;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
        if(isset($_POST["_updateNews"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                //        echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
//                    $_SESSION['error'][] =  "File is not an image.";
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file)) {
            echo "Sorry, the file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
//                $_SESSION['error'][] =  "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "tif") {
            //    echo $imageFileType;
//                $_SESSION['error'][] =  "Sorry, only JPG, JPEG, PNG, TIF & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your image was not uploaded.";
            redirect("../news/list.php");
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $photo = $newfilename;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $stmt=$conn->prepare('UPDATE news SET title = ?, date = ?, content = ?, user  = ?, photo = ? WHERE id = ?');
        $stmt->bind_param('sssisi', $title, $date, $content, $user, $photo, $id);
    } else {
        $stmt=$conn->prepare('UPDATE news SET title = ?, date = ?, content = ?, user  = ? WHERE id = ?');
        $stmt->bind_param('sssii', $title, $date, $content, $user, $id);
    }

    /* -- */


    if($stmt->execute()){
        $_SESSION['message'] = "News has been updated";
        $_SESSION["messageType"] = "success";
        redirect("../news/list.php");
    }
}


?>