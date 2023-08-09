<?php

require'conn.php';

if(isset($_POST['delete'])){
    $id = $_POST['delete'];

$query="DELETE FROM user WHERE id='$id'";
if($conn->query($query) === true){
    echo '<script>alert("Account deleted"); setTimeout(function(){ window.location.href = "output.php"; }, 1000);</script>';
}else{
    echo'failed';
}
}
?>
