<?php
session_start();
include('database/database.php');

$query="select * from users";
$result = $conn->query($query);


        ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">The Cosmic Bodega</a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#mynavbar"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="view_orders.php">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="product_list.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_list.html">Customers</a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            href="index.php"
            >Online Store</a
          >
        </li>
      </ul>
    </div>
  </div>
</nav>
<a type="button" class="btn btn-info" href='user.php?q=a'>Add User</a>
<?php


if (isset($_SESSION['id']) && isset($_SESSION['name'])) {

  echo "<p>Login user ".$_SESSION['name']." </p>"  ;
  echo " <a class='btn btn-danger' href='database/logout.php'> Logout </a>";
}


?>

</br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th Scope="col">User Type</th>
      <th Scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
      if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '    <tr>
    <th scope="row">'.$row["id"].'</th>
    <td>'.$row["first_name"].'</td><td>'.$row["last_name"].'</td>
      <td>@'.$row["planet"].'</td>
      <td>User</td>
      <td><a type="button" href="user.php?q=e&id='.$row['id'].'"class="btn btn-info">Edit</a>
      <a type="button" class="btn btn-danger" href="database/del.php?id='.$row['id'].'">Delete</a></td>
    </tr>
';
  }
} else {
  echo "0 results";
}
?>
  </tbody>
</table>
