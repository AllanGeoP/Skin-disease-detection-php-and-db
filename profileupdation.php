<?php
include("connection.php");
$id=$_POST['id'];
$name =$_POST["name"];
$address =$_POST["address"];
$email =$_POST["email"];
$phonenumber =$_POST["phonenumber"];
$height =$_POST["height"];
$weight  =$_POST["weight"];
$age =$_POST["age"];
$gender =$_POST["gender"];
$password =$_POST["password"];


$query="update register set name='$name',address='$address',email='$email',phonenumber='$phonenumber',email='$email',phonenumber='$phonenumber',height='$height',weight='$weight',age='$age',gender='$gender',password='$password' where id='$id'";
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