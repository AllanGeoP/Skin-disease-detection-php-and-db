
<?php 
include("connection.php");

$name =$_POST["name"];
$address =$_POST["address"];
$email =$_POST["email"];
$phonenumber =$_POST["phonenumber"];
$height =$_POST["height"];
$weight  =$_POST["weight"];
$age =$_POST["age"];
$gender =$_POST["gender"];
$password =$_POST["password"];

$q ="INSERT INTO register  (name,address,email,phonenumber,height,weight,age,gender,password) VALUES ('$name','$address','$email','$phonenumber','$height','$weight','$age','$gender','$password')";

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