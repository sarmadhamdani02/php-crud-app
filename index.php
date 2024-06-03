<?php include("header.php"); ?>
<?php include("dbCon.php"); ?>

<div class="btn-container">
  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#add-student-modal">Add a Student</button>
</div>

<form action="InsertData.php" method="post">
  <!-- Modal -->
  <div class="modal fade" id="add-student-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add a Student</h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="fName">First Name</label>
            <input type="text" name="fName" class="form-control">
          </div>
          <div class="form-group">
            <label for="lName">Last Name</label>
            <input type="text" name="lName" class="form-control">
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-outline-success" name="addStudent" value="Add Student">
        </div>
      </div>
    </div>
  </div>
</form>

<table class="table table-striped table-hover">
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Age</th>
    <th>Update</th>
    <th>Delete</th>
  </tr>

  <?php
  $query = "SELECT * FROM students";
  $result = mysqli_query($dbConnection, $query);

  if (isset($_GET['message'])) {
    echo '<h6 class="error-message">' . $_GET['message'] . '</h6>';
  }

  if (isset($_GET['insertMessage'])) {
    echo '<h6 class="success-message">' . $_GET['insertMessage'] . '</h6>';
  }

  if (!$result) {
    die("Something went wrong connecting to the database");
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row["age"] < 19) { ?>
        <tr style="background-color: red !important;">
          <td><?php echo $row["id"]; ?></td>
          <td><?php echo $row["first_name"]; ?></td>
          <td><?php echo $row["last_name"]; ?></td>
          <td><?php echo $row["age"]; ?></td>
          <td><a href="./UpdatePage.php?id=<?php echo $row['id'] ?>" class="button btn btn-outline-success" name="updateStudent">Update</a></td>
          <td><a href="./DeletePage.php?id=<?php echo $row['id'] ?>" class="button btn btn-outline-danger" name="deleteStudent">Delete</a></td>
        </tr>
      <?php } else { ?>
        <tr>
          <td><?php echo $row["id"]; ?></td>
          <td><?php echo $row["first_name"]; ?></td>
          <td><?php echo $row["last_name"]; ?></td>
          <td><?php echo $row["age"]; ?></td>
          <td><a href="./UpdatePage.php?id=<?php echo $row['id'] ?>" class="button btn btn-outline-success" name="updateStudent">Update</a></td>
          <td><a href="./DeletePage.php?id=<?php echo $row['id'] ?>" class="button btn btn-outline-danger" name="deleteStudent">Delete</a></td>
        </tr>
      <?php }
    }
  }
  ?>
</table>

<?php include("footer.php"); ?>
