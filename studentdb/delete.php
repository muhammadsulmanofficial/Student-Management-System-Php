<?php
include("./connection.php");


    // if (isset($_GET['deleteid'])) {
    //     $studentId = $_GET['deleteid'];
    // }
    
    // $stmt = $conn->prepare("DELETE FROM studenttable WHERE id=?");
    // $stmt->bind_param("i",$studentId);
    // $result = $stmt->execute();
    
    // if ($result) {
    //     header('location:display.php');
    //     exit;
    // } else {
    //     echo $stmt->error;
    // }
















    if(isset($_GET['deleteid'])){
        $deleteId = $_GET['deleteid'];
        echo $deleteId;
    }

    $stmt = $conn->prepare("DELETE FROM studenttable WHERE id = ? ");
    $stmt->bind_param("i",$deleteId);

    if($stmt->execute()){
        header("location:display.php");
        exit;
    } else {
        echo "Error".$stmt->error;
    }


?>