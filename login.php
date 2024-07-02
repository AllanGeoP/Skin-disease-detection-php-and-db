<?php 
include("connection.php");

$name=$_POST["name"];
$password=$_POST["password"];
$query="SELECT * FROM `register` WHERE name='$name' && password='$password'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_row($result);
if(mysqli_num_rows($result)>0)
{
    $response["status"]="1";
    $response["message"]="Login Successful";

 


    $response['id']=$row[0];
  $response['name']=$row[1];
 $response['address']=$row[2];
  $response['email']=$row[3];
  $response['phonenumber']=$row[4];
  $response['height']=$row[5];
  $response['weight']=$row[6];
  $response['age']=$row[7];
  $response['gender']=$row[8];
  $response['password']=$row[9];

  

}
else
{
    $response["status"]="0";
    $response["message"]="Login failed";

    

    $response['id']="";
  $response['name']="";
 $response['address']="";
  $response['email']="";
  $response['phonenumber']="";
  $response['height']="";
  $response['weight']="";
  $response['age']="";
  $response['gender']="";
  $response['password']="";
}
echo json_encode($response);
?>