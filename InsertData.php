<?php include ("dbCon.php"); ?>
<?php

if (isset($_POST["addStudent"])) {
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $age = $_POST["age"];

    if ($fName == "" || $lName == "" || $age == "") {
        header("location:index.php?message=Could'nt submit. Pease fill all inputs.❌");
    } else {
        $query = "INSERT INTO students (first_name, last_name, age) VALUES ('$fName', '$lName', '$age')";

        $result = mysqli_query($dbConnection, $query);

        if (!$result) {
            die("error");
        } else {
            header("location:index.php?insertMessage=Student added successfully. ✅");
        }
    }
}
