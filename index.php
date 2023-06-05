<?php 
    require_once('clases/Database.php');
    $db = new Database();
    $conn = $db->getConnection('db2');
    if (is_array($conn)){
        echo json_encode($conn);
    }else{
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>