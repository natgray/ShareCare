<?php 
include '../dbConnect.php';
$conn = getDatabaseConnection();
$namedParameters = array();
$sql = "SELECT * FROM listings WHERE 1";

if(!empty($_GET['title'])){
    $sql .= " AND Title LIKE :title";
    $namedParameters[":title"] = "%" . $_GET['title'] . "%";
}
if(!empty($_GET['description'])){
    $sql .= " AND Description LIKE :description";
    $namedParameters[":description"] = "%" . $_GET['description'] . "%";
}
if(!empty($_GET['category'])){
     $sql .= " AND Category_id = :categoryId";
    $namedParameters[":categoryId"] = $_GET['category'];
}

if(isset($_GET['orderBy'])){
    if($_GET['orderBy'] == "category"){
        $sql .= " ORDER BY Category_id";
    } else if ($_GET['orderBy'] == "name"){
         $sql .= " ORDER BY Title";
        
    }
}
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters); 
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($records);

?>