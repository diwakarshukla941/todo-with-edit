<?php
    include "db.php";
    if(isset($_POST['submit'])){
        $fname =$_POST['firstname'];
        $lname = $_POST['lastname'];
        $age = $_POST['age'];
        $id = $_POST['fid'];
        // $sql = "INSERT INTO latesttodo(title,context)VALUES('$title','$context')";
        $sql = "UPDATE crud_update SET firstname='$fname',lastname='$lname',age='$age' WHERE id='$id'";
        $check = mysqli_query($conn,$sql);
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>master page</title>
    <style>
        form{
            max-width:450px;
            margin:auto;
            margin-top: 45px;
            padding: 30px;
            border-radius:35px;
            border:2px solid black;
            
        }
    </style>
</head>
<body><?php
            $getid =$_GET['id'];
            $select = "SELECT * FROM crud_update WHERE id='$getid'";
            $connect = mysqli_query($conn,$select);
            $row = mysqli_fetch_assoc($connect);
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $age = $row['age'];
            $id = $row['id'];
        ?>
        <form method="post">
            <fieldset>
                <legend>edit details</legend>
                    <div class="mb-3 mt-3">
                        <label for="firstname" class="form-label">firstname:</label>
                        <input type="text" class="form-control" id="firstname" value="<?php echo $fname; ?>" name="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">lastname:</label>
                        <input type="text" class="form-control" id="lastname" value="<?php echo $lname; ?>" name="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">age:</label>
                        <input type="number" class="form-control" id="age" value="<?php echo $age; ?>" name="age" required>
                    </div>
                    <input type="hidden" name="fid" value="<?php echo $id; ?>">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>
</body>
</html>