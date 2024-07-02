
<?php 
include("connection.php");

$name =$_POST["name"];
$email =$_POST["email"];
$phone =$_POST["phone"];
$specialization =$_POST["specialization"];
$password =$_POST["password"];

$q ="INSERT INTO docregister  (name,email,phone,specialization,password) VALUES ('$name','$email','$phone','$specialization','$password')";

$result=mysqli_query($con,$q);
if($result){
    $response["status"]="1";
    $response["message"]=" Registration successful";
}
else{
    $response["status"]="0";
    $response["message"]="Registration failed";
}
echo json_encode($response);
?>