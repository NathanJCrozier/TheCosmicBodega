<?php
include('database.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $number=$_POST['number'];
    $address=$_POST['address'];
    $postal=$_POST['postal'];
    $area=$_POST['area'];
    $planet=$_POST['planet'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="INSERT INTO users(first_name, last_name,number,address,postal, area,planet,email,password) VALUES ('".$first_name."','".$last_name."','".$number."',
    '".$address."','".$postal."','".$area."','".$planet."','".$email."','".$password."')";





if ($conn->query($query) === TRUE) {
  echo "New record created successfully";
  header("Location: ../user_list.php");
die();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


}else{
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}



?>
