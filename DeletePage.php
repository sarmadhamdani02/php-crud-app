<?php include("header.php"); ?>
<?php include("dbCon.php"); ?>

<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    die("Some error occurred while retrieving the id");
}

$query = "Delete from `students` where id= '$id'";
$result = mysqli_query($dbConnection, $query);

if (!$result) {
    die("Error retrieving data: " . mysqli_error($dbConnection));
} else {
    header("location:index.php?delete_message= Deleted Successfully ❌");
}
?>

<?php include("footer.php"); ?>
