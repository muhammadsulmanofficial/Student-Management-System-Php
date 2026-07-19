<?php

include("./connection.php");


if(isset($_POST['btn'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $program = $_POST['pos'];

    $stmt = $conn->prepare("INSERT INTO studenttable
            (firstname, lastname, email, pos)
            VALUES
            (?, ?, ?, ?)
            ");
    $stmt->bind_param("ssss",$fname, $lname, $email, $program);

    if($stmt->execute()) {
        header("location:display.php");
        exit;
    } else {
        die("Error".$stmt->error);
    }
}

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <form method="post" id="studentForm">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input required type="text" name="fname" class="form-control" placeholder="Enter the Student First Name" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input required type="text" name="lname" class="form-control" placeholder="Enter the Student Last Name" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input required type="email" name="email" class="form-control" placeholder="Enter the Student Email Address" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Program of Study</label>
                <input required type="text" name="pos" class="form-control" placeholder="Enter the Student Program of Study" autocomplete="off">
            </div>
            <button type="submit" name="btn" class="btn btn-primary">Submit</button>
            <div id="message"></div>
        </form>
    </div>
    <!-- <script>
        document.getElementById("studentForm").addEventListener("submit",function(e){
            e.preventDefault();


            let formData = new FormData(this);

            fetch("insert.php", {
                method:"POST",
                body:formData
            })
            .then((res) => res.text())
            .then((data) => {
                document.getElementById("message").innerHTML = data;

                document.getElementById("studentForm").reset();
            })
        })
    </script> -->
</body>

</html>