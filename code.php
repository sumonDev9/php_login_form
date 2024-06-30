<?php
$errors = [];
if($_SERVER["REQUEST_METHOD"] !== "POST")
{

    echo json_encode(["success"=>false, "message"=> "invalid request method"]);
    exit;
}
    $conn = new mysqli("localhost","root","","m_form");

    if($conn->connect_error)
    {
        echo "Connect Error: " . $conn->connect_error;
        exit;
    }

  $s_name = trim($_POST["s_name"]);
 $s_email = trim($_POST["s_email"]);
 $s_password = trim($_POST["s_password"]);

 if(empty($s_name))
 {
    $errors['s_name'] = "Name is required";
 }
 else if(strlen($s_name)< 3)
 {
    $errors['s_name'] = "name is too short";
 }


 if(empty($s_email))
 {
    $errors['s_email'] = "email is required";
 }


 if(empty($s_password))
 {
    $errors['s_password'] = "password is required";
 }

 if(!empty($errors))
 {
    echo json_encode(['success' => false, "errors" => $errors]);
    exit;
 }


$sql = $conn->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");

if($sql == false)
{
  echo "prepared statement failed".$conn->error;  
}
$sql->bind_param("sss",$s_name,$s_email,$s_password);

if($sql->execute())
{
    // echo "Registered successfully";
    echo json_encode(["success" => true, "message"=> "Registered successfully"]);

}
else
{
   
    echo json_encode(["success" => false, "message"=> "Registered failed"]);
}













?>