<?php 
include '../dbConnect.php';
$conn = getDatabaseConnection();
$sql = "SELECT image_id FROM listings ORDER BY RAND() LIMIT 4";
$stmt = $conn->prepare($sql);
$stmt->execute(); 
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($records);

?>