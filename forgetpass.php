<?php
include ("connection.php");
$phonenumber = $_POST['phonenumber'];
$q = "select * from register where phonenumber ='$phonenumber'";
$result = mysqli_query($con,$q) or die(mysqli_errror($con));
if($result)
{
    $response['status'] ="1";
    $response['message'] = "data fetched";
}
else
{
    $response['status'] ="0";
    $response['message'] = "enterd phone number is not registered";
}
echo json_encode($response);
?>