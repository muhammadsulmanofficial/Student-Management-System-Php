<?php
include("./connection.php");


if(isset($_GET['updateid'])){
   $studentId = $_GET['updateid']; /* Agar IF run ho gaya, to variable poori file me available hota hai. */
}


/* =========================
   FETCH OLD DATA
========================= */

$stmt = $conn->prepare("SELECT * FROM studenttable WHERE id=?");

$stmt->bind_param("i", $studentId);

$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_assoc(); /* agar row mil jai return karey ga 
    $row = [
    "firstname" => "Ali",
    "lastname" => "Khan"
    ];  
    yeah ik array ha or php me non empty array = TRUE hota ha
*/

if($row) { /* is liyeye if($row) true ho jata ha */
    $fname = $row['firstname'];
    $lname = $row['lastname'];
    $email = $row['email'];
    $program = $row['pos'];
} else { /* agar row na miley to null aye ga or php me null false hota ha */
    die("Student not found");
}

/* =========================
   UPDATE DATA
========================= */

if(isset($_POST['btn'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $program = $_POST['pos'];


    $stmt = $conn->prepare("UPDATE studenttable 
    SET firstname=?, lastname=?, email=?, pos=? 
    WHERE id=?");


    $stmt->bind_param("ssssi",
    $fname,
    $lname,
    $email,
    $program,
    $studentId
    );


    $result = $stmt->execute();


    if($result){

        header("location:display.php");
        exit;

    } else {

        echo $stmt->error;

    }

}

?>


<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Update Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container my-5">

    <form method="post">

        <div class="mb-3">

            <label class="form-label">First Name</label>

            <input 
            type="text" 
            name="fname" 
            class="form-control"
            value="<?php echo $fname; ?>"
            required>

        </div>


        <div class="mb-3">

            <label class="form-label">Last Name</label>

            <input 
            type="text" 
            name="lname" 
            class="form-control"
            value="<?php echo $lname; ?>"
            required>

        </div>


        <div class="mb-3">

            <label class="form-label">Email</label>

            <input 
            type="email" 
            name="email" 
            class="form-control"
            value="<?php echo $email; ?>"
            required>

        </div>


        <div class="mb-3">

            <label class="form-label">Program</label>

            <input 
            type="text" 
            name="pos" 
            class="form-control"
            value="<?php echo $program; ?>"
            required>

        </div>


        <button type="submit" name="btn" class="btn btn-primary">

            Update

        </button>

    </form>

</div>

</body>
</html>


