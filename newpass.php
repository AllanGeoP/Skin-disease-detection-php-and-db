<?php
include ("connection.php");
$phonenumber = $_POST['phonenumber'];
$password = $_POST['password'];

$q = "update register set password = '$password' where phonenumber ='$phonenumber'";
$result = mysqli_query($con,$q) or die(mysqli_errror($con));
if($result)
{
    $response['status'] ="1";
    $response['message'] = "Password changed successfully";
}
else
{
    $response['status'] ="0";
    $response['message'] = "Failed";
}
echo json_encode($response);
?>