<?php
session_start();
include 'connet.php';

$id= 0;
$name= '';
$location='';
$update=false;

// Inserting data
if (isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];

    $sql = "INSERT INTO data (name, location) VALUES('$name', '$location')";
    $conn->query($sql) or die($mysqli->error);

    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    header("location: index.php"); //redirecting to index.php
}

// Delete button function  
if (isset($_GET['delete'])){
    $id=$_GET['delete'];

    $sql="DELETE FROM data WHERE id=$id";
    $conn->query($sql) or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

// Edit button function

if (isset($_GET['edit'])) {
    $id= $_GET['edit'];
    $update = true;
    $sql="SELECT * FROM data WHERE id=$id ";
    $result = $conn->query($sql) or die($conn->error);

    if (count($result)==1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $location=$row['location'];
    }
}

if (isset($_POST['update'])) {
    $id =$_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];

    $sql = "UPDATE data SET name='$name', location='$location' WHERE id=$id";
    $conn->query($sql) or die($conn->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');

}