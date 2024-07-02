<?php
include("connection.php");
$stmt=$con->prepare("SELECT * FROM docregister");
$stmt->execute();
    
    
    $stmt->bind_result($id,$name,$email,$phone,$specialization,$password);
    
    $products = array(); 
    

    while($stmt->fetch()){
        $temp = array();
        $temp['id'] = $id;
        $temp['name'] =$name; 
        $temp['email']=$email;
        $temp['phone'] = $phone;
        $temp['specialization']=$specialization;
        $temp['password']=$password;
        
        
        array_push($products, $temp);
    }
    
     
    echo json_encode($products);
?>