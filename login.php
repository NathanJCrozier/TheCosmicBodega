<?php
include('database.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email=trim($_POST['email']);
    $password=trim($_POST['password']);

    $search="select * from users where email='".$email."' limit 1";

    $result=$conn->query($search);
    $row = $result->fetch_assoc();
if ($result->num_rows > 0) {

   if ($row['password']==$password){
       session_start();
                 $_SESSION['name'] = $row['first_name'].$row['last_name'];


                $_SESSION['id'] = $row['id'];
                // print_r($_SESSION);
                // die();
                   header("Location: ../user_list.php");

   }else{
       header('Location: ' . $_SERVER['HTTP_REFERER']);
   }
    die();



} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


}else{
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}
