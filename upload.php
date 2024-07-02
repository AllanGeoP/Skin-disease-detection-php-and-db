<?php
include("connection.php");
$name=$_POST['name'];

$phonenumber=$_POST['phonenumber'];



$originalImgName=$_FILES['filename']['name'];
$tempName=$_FILES['filename']['tmp_name'];
$folder="uploads/";

if(move_uploaded_file($tempName,$folder.$originalImgName)){
   // $query="insert into uploadmedicalrecords set medicalreports='$originalImgName' where id='$userid',";

   $query="insert into upload(name,phonenumber,img) 
values('$name','$phonenumber','$originalImgName')";

     if(mysqli_query($con,$query)){
   $response['status']="1";
   $response['message']="file uploaded successfully";  

}
else{
    $response['status']="0";
    $response['message']="Data insertion failed";
}
}
else{
    $response['status']="0";
    $response['message']="File moving failed";
}
echo json_encode($response);
?>