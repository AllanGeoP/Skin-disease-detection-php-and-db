<?php
include("connection.php");
$id=$_POST['id'];
$name =$_POST["name"];
$email =$_POST["email"];
$phonenumber =$_POST["phonenumber"];
$height =$_POST["specialization"];
$password =$_POST["password"];


$query="update register set name='$name',email='$email',phonenumber='$phonenumber',email='$email',phonenumber='$phonenumber',specialization='$height',password='$password' where id='$id'";
$result=mysqli_query($con,$query);
if($result){
    $response["status"]="1";
    $response["message"]=" updation successful";
}
else{
    $response["status"]="0";
    $response["message"]="updation failed";
}
echo json_encode($response);
?>