<?php
    
    $conn = new mysqli("localhost","root",null,"studentdb");

    if($conn -> connect_error){
        die("Connnection failed".$conn ->connect_error);
    }

    // echo "Database connection success";

?>