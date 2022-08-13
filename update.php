<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "select * from `crud` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['e-mail'];
$mobile  = $row['mobile'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['e-mail'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $sql = "update `crud` set `id`= '$id',`name`='$name',`e-mail`='$email',`mobile`='$mobile',`password`='$password' where id=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // echo "Data Updated Successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Crud Operation</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <div class="container my-5">
        <form method="POST" autocomplete="off">
            <div class="mb-3">
                <label>Enter Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" value="<?php
                                                                                                            echo $name; ?>">
            </div>
            <div class="mb-3">
                <label>E-mail</label>
                <input type="email" class="form-control" placeholder="Enter your e-Mail" name="e-mail" value="<?php
                                                                                                                echo $email; ?>">
            </div>
            <div class="mb-3">
                <label>Mobile</label>
                <input type="text" class="form-control" placeholder="Enter your mobile " name="mobile" value="<?php
                                                                                                                echo $mobile; ?>">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter your password " name="password" value="<?php echo $password; ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>