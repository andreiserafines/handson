
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<title>User</title>
</head>

<body class="container-sm">

<?php
require 'conn.php';

$query = "SELECT * FROM user";
$result = $conn->query($query);
?>

<div class="output">
<div class="row">
    <div class="col">
        <h1><span class="user">User</span></h1>
    </div>
    <div class="col">
        <h1><a href="login.html" class="del-btn">logout</a></h1>
    </div>
</div>


<div class="search-container">
    <form method="GET" action="output.php">
        <input type="text" name="search" placeholder="Search by username">
        <input type="submit" value="Search"> <br><br>
<a class="add-link" href="add.html">Add New User</a><br>
<a class="add-link" href="export.php">Export all data</a>
</div> 
</form>
 
        

<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='" . $row['image'] . "' width='50'></td>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>
                        <form action='delete.php' method='post'>
                            <input type='hidden' name='delete' value='" . $row['id'] . "'>
                            <button type='submit' class='delete-btn'>Delete</button>
                        </form> 

                        <a href='edit.php?id=" . $row['id'] . "' class='update-btn'>Edit</a>
                       
                    </td>";
                  
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No results</td></tr>";
        }
        ?>
    </tbody>
</table>





<table>
        <tr>
        <th>image</th>
        <th>id</th>
    <th>username</th>
    <th>password</th>
    <th>Action</th>
        </tr>

        <br><br>
        <h2>Search Result</h2>  
</div>

<?php

if(isset($_GET['search'])){

$search = $_GET['search'];
$query = "SELECT * FROM user WHERE username LIKE '%$search%'";
$result = $conn->query($query);
if ($result->num_rows == 1){
    while ($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td><img src='" . $row['image'] . "' width='50'></td>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>
                        <form action='delete.php' method='post'>
                            <input type='hidden' name='delete' value='" . $row['id'] . "'>
                            <button type='submit' class='delete-btn'>Delete</button>
                        </form> 

                        <a href='edit.php?id=" . $row['id'] . "' class='update-btn'>Edit</a>
                       
                    </td>";
        echo "</tr>";     
    }
    } else {
        echo 'no record found';
    
}
}

?>
