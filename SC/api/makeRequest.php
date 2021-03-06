<?php 
include '../dbConnect.php';
$conn = getDatabaseConnection();

$namedParameters = array();

$namedParameters[":userEmail"] = $_GET['userEmail'];
$namedParameters[":lId"] = $_GET['listingId'];
$namedParameters[":checkout"] = $_GET['checkout'];
$namedParameters[":checkin"] = $_GET['checkin'];
$namedParameters[":message"] = $_GET['message'];
$sql = "INSERT INTO `reserveration_requests` (`Request_Id`, `User`, `Listing_Id`, `Checkout_Date`, `Return_date`, `Request_Message`) 
        VALUES (NULL, :userEmail, :lId, :checkout, :checkin, :message)";
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters); // We NEED to include $namedParameters here
echo "Value assigned to Primary Key"  .  $conn->lastInsertId();

?>