<?php 
include("connection.php");

$name=$_POST["name"];
$password=$_POST["password"];
$query="SELECT * FROM `docregister` WHERE name='$name' && password='$password'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_row($result);
if(mysqli_num_rows($result)>0)
{
    $response["status"]="1";
    $response["message"]="Login Successful";

 


    $response['id']=$row[0];
  $response['name']=$row[1];
  $response['email']=$row[2];
  $response['phone']=$row[3];
  $response['specialization']=$row[4];
  $response['password']=$row[5];

  

}
else
 {
    $response["status"]="0";
    $response["message"]="Login failed";

    

    $response['id']="";
  $response['name']="";
  $response['email']="";
  $response['phone']="";
  $response['specialization']="";
  $response['password']="";
 }
echo json_encode($response);
?>