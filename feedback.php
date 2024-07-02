<?php 
include("connection.php");
$rating = $_POST['rating'];
$name = $_POST['name'];
$pan = $_POST['mobile_no'];
$feedback = $_POST['feedback'];




$query="insert into feedback(name,mobile_no,feedback,rating)
values('$name', '$pan','$feedback','$rating')";
$result = mysqli_query($con, $query);
if($result){
$response["status"]="1";
$response["message"]="feedback Added successfully";
}
else{
$response["status"]="0";
$response["message"]="failed";
}

echo json_encode($response);
?>