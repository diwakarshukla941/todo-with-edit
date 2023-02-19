<?php
    include "db.php";
    if(isset($_POST['submit'])){
      $fname = $_POST["firstname"];
      $lname = $_POST["lastname"];
      $age = $_POST["age"];
      $sql = "INSERT INTO crud_update (firstname,lastname,age) VALUES ('$fname','$lname','$age')";
      $check = mysqli_query($conn,$sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>update</title>
  <meta charset="utf-8">
  <meta name="viewport" content= "width=device-width, user-scalable=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form method="post" >
    <fieldset>
      <legend>basic details</legend>
    <div class="mb-3 mt-3">
      <label for="firstname" class="form-label">firstname:</label>
      <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname" required>
    </div>
    <div class="mb-3">
      <label for="lastname" class="form-label">lastname:</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname" required>
    </div>
    <div class="mb-3">
      <label for="age" class="form-label">age:</label>
      <input type="number" class="form-control" id="age" placeholder="Enter age" name="age" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </fieldset>
  </form>
  <hr>
<!-- table -->
    <div class="container mt-3">         
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>age</th>
            <th>edit</th>
          </tr>
        </thead>
        <?php
          $select = "SELECT * FROM crud_update";
          $insert = mysqli_query($conn,$select);
          while($rows=mysqli_fetch_assoc($insert)){
            $fname = $rows['firstname'];
            $lname = $rows['lastname'];
            $age = $rows['age'];
            $id = $rows['id'];
        ?>
        <tbody>
          <tr>
            <td><?php echo $fname; ?></td>
            <td><?php echo $lname; ?></td>
            <td><?php echo $age; ?></td>
            <td><a href="master.php?id=<?php echo $id; ?>" name="edit" class="btn btn-primary">edit</a></td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
    </div>
</body>
</html>