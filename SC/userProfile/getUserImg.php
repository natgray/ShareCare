<?php
include '../dbConnect.php';
$conn = getDatabaseConnection();


$email = $_GET['email'];
$np = array();
$np[":email"] = $email;
$sql = "SELECT * FROM users WHERE email = :email";


$stmt = $conn->prepare($sql);
$stmt->bindColumn('picture', $data, PDO::PARAM_LOB);
$stmt->execute($np); 
$img = $stmt->fetch(PDO::FETCH_BOUND);

if (!empty($img))
{
    header('Content-Type:' . $record['picture']);   //specifies the mime type
    header('Content-Disposition: inline;');
    echo $data;
    // echo "hello ";
    // echo json_encode($records);
}