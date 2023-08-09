<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Exam.xls");
header("Pragma: no-cache");
header("Expires: 0");

require_once('conn.php');
$output = "";

$output .= "
    <table>
    <tbody>
    <tr>
        <th>id</th>
        <th>Username</th>
        <th>Password</th>
        <th>Image</th>
    </tr>
    ";

$stmt = $conn->prepare("SELECT * FROM user");
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    while($row = $result->FETCH_ASSOC()){
        $output .= "
            <tr>
                <td>".$row['id']."</td>
                <td>".$row['username']."</td>
                <td>".$row['password']."</td>
                <td>".$row['image']."</td>
            </tr>";
    }
}else{
    $output .="
        <tr>
            <td>No result found.</td>
        </tr>";
}
$output .="
    </tbody>
    </table>";

echo $output;
?>
