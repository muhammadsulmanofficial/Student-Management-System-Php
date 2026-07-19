<?php
// include("./connection.php");

// $search = "";
// if (isset($_GET['search'])) {
//     $search = $_GET['search'];
// }

// // LIKE ke liye wildcard add kar rahe hain
// $searchTerm = "%" . $search . "%";

// $sql = "SELECT * FROM studenttable  /* is queries ka matlab agar kisi ik me bhi match mil gya chahey firstname ho lastname ho email ho program ho row show ho jai gi */
//         WHERE firstname LIKE ? 
//         OR lastname LIKE ?  
//         OR email LIKE ?  
//         OR pos LIKE ?";

// $stmt = $conn->prepare($sql);
// $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
// $stmt->execute();

// $result = $stmt->get_result();  /*  get_result() database say returned rows fetch karta ha. ek result set object deta hai. $result ab data container hai. */




include("./connection.php");


$search="";
if(isset($_GET['search'])){
    $search = $_GET['search'];
}

$searchTerm = "%".$search."%";

$stmt = $conn->prepare("SELECT * FROM studenttable
        WHERE firstname LIKE ?
        OR lastname LIKE ? 
        OR email LIKE ? 
        OR pos LIKE ?
        ");


$stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();

$result = $stmt->get_result();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container my-5 shadow-lg p-3 mb-5 bg-white rounded">

    <h1 class="text-center shadow-lg p-3 mb-5 bg-white rounded">
        Student Management System
    </h1>

    <div class="d-flex justify-content-between align-items-center mb-3">

        <a href="insert.php" class="btn btn-primary">Add Student</a>

        <form method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2"
                placeholder="Search student..." value="<?php echo htmlspecialchars($search); ?>"> <!-- is may jo value attribute diya howa iska purpose : Search ke baad input empty na ho. -->

            <button class="btn btn-success" type="submit">Search</button>
        </form>

    </div>

    <table class="table mt-5">
        <thead>
            <tr>
                <th>Student Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Program</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>

        <?php
        if ($result) { /* query sucessful howi ya nai  */
            while ($row = $result->fetch_assoc()) { /* fetch_assoc() yeah ik ik row uthata hai, associative array bnata ha */

                $student_id = $row['id'];
                $fname = $row['firstname'];
                $lname = $row['lastname'];
                $email = $row['email'];
                $program = $row['pos'];

                echo '
                    <tr>
                        <td>'.$student_id.'</td>
                        <td>'.$fname.'</td>
                        <td>'.$lname.'</td>
                        <td>'.$email.'</td>
                        <td>'.$program.'</td>
                        <td><a class="btn btn-primary text-white text-decoration-none" href="update.php?updateid=' . $student_id . '">Update</a>
                        <a class="btn btn-danger text-white text-decoration-none" href="delete.php?deleteid=' . $student_id . '" onclick="return confirm(\'Are you sure you want to delete this student?\')">Delete</a></td>
                    </tr>
                ';
                        
                            }
                        }
                        ?>

</tbody>
</table>

</div>
</body>
</html>