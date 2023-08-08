<?php

include 'config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM users where id = $id";

$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$address = $row['address'];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    //sql query...
    $sql = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE id = $id";

    $result = mysqli_query($connect, $sql);

    if($result){
        // echo "User has been created";
        header('location:index.php');
    }
    else{
        die(mysqli_error($connect));
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2>User Create</h2>
        <a href="index.php" class="btn btn-sm btn-info float-end">Manage User</a>
        <form method="POST" action="">
        <div class="mb-3">
                <label for="name" class="form-label">User Name</label>
                <input type="text" value="<?php echo $name; ?>" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" value="<?php echo $email; ?>" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">User Phone</label>
                <input type="tel" value="<?php echo $phone;?>" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
            </div>
            <!-- <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div> -->
            <div class="mb-3">
                <label for="password" class="form-label">Address</label>
                <textarea name="address" id="address" class="form-control" cols="30" rows="10"><?php echo $address;?></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>