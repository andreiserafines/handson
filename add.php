<?php
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $directory = 'images/'; 

    if(isset($_FILES['image']['name'])){
        $image = $directory . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
      
        $query = "INSERT INTO user (username, password, image) VALUES ('$username', '$password', '$image')";
        
        if ($conn->query ($query) === TRUE) {
            echo '<script>alert("Account added"); setTimeout(function(){ window.location.href = "output.php"; }, 1000);</script>';
        } else {
            echo 'Failed';
        }
    } else {
        echo 'Image upload failed';
    }
}
?>
