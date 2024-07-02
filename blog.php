<?php
include("connection.php");
$stmt=$con->prepare("SELECT * FROM blogs");
$stmt->execute();
    
    
    $stmt->bind_result($id,$name,$details1,$details2,$img);
    
    $products = array(); 
    

    while($stmt->fetch()){
        $temp = array();
        $temp['id'] = $id;
        $temp['name'] =$name; 
        $temp['details1']=$details1;
        $temp['details2'] = $details2;
        $temp['img'] = $img; 
            
        
        array_push($products, $temp);
    }
    
     
    echo json_encode($products);
?>