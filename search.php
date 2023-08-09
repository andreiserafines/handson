<html>
<head>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="container-sm">


<div class="search-container">
    <form method="GET" action="search.php">
        <input type="text" name="search" placeholder="Search by username">
        <input type="submit" value="Search"> <br><br>
        </div> 
</form>


<table>
        <tr>
        <th>image</th>
        <th>id</th>
    <th>username</th>
    <th>password</th>
        </tr>

</body>
<?php

require_once('conn.php');

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
        echo "</tr>";     
    }
    } else {
        echo 'no record found';
    
}
}

?>