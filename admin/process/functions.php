<?php
date_default_timezone_set("Asia/Kathmandu");
/* Database connection */

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "yakatabune");

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($conn,'utf8');

if (mysqli_connect_errno()) {
    die("Database Connection Failed!" .
        mysqli_connect_error() .
        "(" . mysqli_connect_errno() .")"
    );
}

/* -- */

/* functions */

function redirect($address){
    header('Location: ' . $address);
}

function redirectifnotloggedin(){
    if(!isset($_SESSION['username'])){
        $_SESSION["message"] = "You must login first!";
        $_SESSION["messageType"] = "warning";
        redirect("../auth/login.php");
        return;
    }
    return;
}

/* Category */

function getCategoryList($conn){

    $stmt=$conn->prepare("SELECT * FROM category ");

    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows >0){
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
    }
    return [];
}

function getCategory($conn, $id) {

    $stmt=$conn->prepare("SELECT * FROM category WHERE id = ?");
    $stmt->bind_param('i', $id);

    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows >0){
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
    }
    return [];
}

/* News */


function getNewsCount($conn) {

    $stmt=$conn->prepare("SELECT * from news");

    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows >0){
            return mysqli_num_rows($result);
        }
    }
    return [];
}

if (isset($_GET['pageNo'])) {
    $pageNo = $_GET['pageNo'];
} else {
    $pageNo = 1;
}

$noOfRecordsPerPage = 12;
$offset = ($pageNo - 1) * $noOfRecordsPerPage;

$totalPages = 10;
//(getNewsCount($conn)/$noOfRecordsPerPage);

function getNewsList($conn){

    $stmt=$conn->prepare("SELECT * FROM news ORDER BY date DESC");

    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows >0){
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
    }
    return [];
}

function getNewsListLimit($conn, $pageNo, $noOfRecordsPerPage){

    $stmt=$conn->prepare("SELECT * FROM news ORDER BY date DESC LIMIT ?,?");
    $stmt->bind_param('ii', $pageNo, $noOfRecordsPerPage);

    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows >0){
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
    }
    return [];
}

function getNews($conn, $id) {

    $stmt=$conn->prepare("SELECT * FROM news WHERE id = ?");
    $stmt->bind_param('i', $id);

    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows >0){
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
    }
    return [];
}

function getNewsFromTitle($conn, $title) {

    $statement=$conn->prepare("SELECT * FROM news WHERE title = ?");
    $statement->bind_param('s', $title);

    if($statement->execute()){
        $result=$statement->get_result();
        if($result->num_rows > 0){
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
    }
    return [];
}

/* User */

function getUserList($conn){

    $stmt=$conn->prepare("SELECT * FROM users ");

    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows >0){
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
    }
    return [];
}

function getUser($conn, $id) {

    $stmt=$conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param('i', $id);

    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows >0){
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
    }
    return [];
}

?>