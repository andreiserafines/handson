<?php

require'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['username']) || !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query="SELECT * FROM user WHERE username='$username' and password='$password'";
        $result=$conn->query($query);
        if($result->num_rows == 1){
           header('location:output.php');
        } else {
            echo "<script>alert('wrong username or password');</script>";
        }
    }
}
?>



<html>

<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form method="post" action="function.php">
    <center>
        <table>
                <div class="login">
                <label>username: &nbsp;</label>
                <input type="text" name="username"> <br>
        <br>
                <label>password: &nbsp;</label>
                <input type="text" name="password">
        <br>
                <input type="submit" value="login" class="btn">
                </div>
        </table>
    </center>
    </form>
</body>

</html>