<?php

 include '../dbConnect.php';
$dbConn = getDatabaseConnection();

 $sql = "SELECT bits, content_type FROM images WHERE image_id = :id";
 $stmt = $dbConn->prepare($sql);
 $stmt->execute( array(":id"=> $_GET['id']));

 $stmt->bindColumn('bits', $data, PDO::PARAM_LOB);
 $record = $stmt->fetchAll(PDO::FETCH_ASSOC);

 if (!empty($record) && count($record) > 0){
    header('Content-Type:' . $record[0]['content_type']);   //specifies the mime type
    header('Content-Disposition: inline;');
    echo $data;
  }
?>
