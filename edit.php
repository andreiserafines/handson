<?php
require_once('conn.php');

$id = $username = $password = "";
$row = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM user WHERE id='$id'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $password = $row['password'];
        $image = $row['image'];
    } else {
        echo 'User not found';
        exit(0);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE user SET username='$username', password='$password'";
    
    if (!empty($_FILES['image']['name'])) {
        $directory = "images/";
        $newimage = $_FILES['image']['name'];
        $image = $directory . basename($newimage);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
        
        $sql .= ", image='$image'";
    }

    $sql .= " WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Account Updated"); setTimeout(function(){ window.location.href = "output.php"; }, 500);</script>';
    } else {
        echo 'Error updating account';
        exit(0);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="edit.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
    <center>
    <table>
    <div class="login-card">
            <label>Username:&nbsp;</label>
            <input type="text" name="username" value="<?php echo $username; ?>"><br>
            <br>
            <label>Password:</label>
            <input type="text" name="password" value="<?php echo $password; ?>"><br>
             <br>
            <input type="hidden" id="image" name="image" value="<?php echo $image; ?>">
            <input type="file" id="image" name="image"><br><br>
        
        <input type="submit" value="edit" class="btn" name="submit"><br><br>
        <a class="btn" href="output.php">Cancel</a>
        </div>
    </form>
</table>
</enter>
</body>
</html>
