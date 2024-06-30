

<?php
$conn = new mysqli("localhost","root","","m_form");

if($conn->connect_error)
{
    die("Connection Error".$conn->connect_error);

}

$sql = "SELECT * FROM users";

$data = $conn->prepare($sql);

if($data == false)
{
    die("prepare Statement Error : ".$conn->error);
}

$data->execute();

$result = $data->get_result();

while( $row = $result->fetch_assoc())
{
  $users[]= $row;
}
 
echo json_encode($users);


$data->close();
$conn->close();





?>


