<?php include("header.php"); ?>
<?php include("dbCon.php"); ?>

<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    die("Some error occurred while retrieving the id");
}

$query = "SELECT * FROM `students` WHERE `id` = '$id'";
$result = mysqli_query($dbConnection, $query);

if (!$result) {
    die("Error retrieving data: " . mysqli_error($dbConnection));
} else {
    $row = mysqli_fetch_assoc($result);
}
?>

<?php
if (isset($_POST["update_Student"])) {
    $new_id = $_GET["id"];
    $firstName = $_POST["fName"];
    $lastName = $_POST["lName"];
    $age = $_POST["age"];

    $updateQuery = "UPDATE `students` SET first_name = '$firstName', last_name = '$lastName', age = '$age' WHERE id = '$new_id'";
    $update = mysqli_query($dbConnection, $updateQuery);

    if (!$update) {
        die("Error updating data: " . mysqli_error($dbConnection));
    } else {
        header('Location: index.php?update_message=Updated Successfully ✅');
        exit();
    }
}
?>

<form action="UpdatePage.php?id=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="fName">First Name</label>
        <input type="text" name="fName" class="form-control" value="<?php echo $row['first_name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="lName">Last Name</label>
        <input type="text" name="lName" class="form-control" value="<?php echo $row['last_name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" class="form-control" value="<?php echo $row['age']; ?>" required>
    </div>
    <div class="modal-footer">
        <input type="submit" class="btn btn-outline-success update-std-btn" name="update_Student" value="Update">
    </div>
</form>

<?php include("footer.php"); ?>
