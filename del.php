<?php
include('database.php');

 $id=$_GET['id'];

$query="DELETE FROM users WHERE id=".$id;

if ($conn->query($query) === TRUE) {
  echo "Deleted successfully";
  header("Location: ../user_list.php");
die();
}

else {
  echo "Error: " . $sql . "<br>" . $conn->error;
   header('Location: ' . $_SERVER['HTTP_REFERER']);
}

$conn->close();








?>
