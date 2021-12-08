<?php

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password =$_POST['c_password'];

    if(file_exists('users/'. $email . '.xml')){
        $errors[]='Email already exists';
    }

    if($email == ''){
        $errors[] = 'Email is blank';
    }

    if($password =='' || $c_password == ''){
        $errors[] = 'Passwords are blank';
    }

    if($password != $c_password){
        $errors[] = 'Passwords do not match';
    }
    if(count($errors) == 0){
        $xml = new SimpleXMLElement('<user></user>');
        $xml->addChild('password', $password);
        $xml->addChild('email', $email);
        $xml->asXML('users/' . preg_replace('/@.*/','',$_POST['email']) . '.xml');
        header('Location login1.php');
        die;
    }
}

?>

<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="styles.css" rel="stylesheet" >
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<html lang="en">
  <head>
    <title>TheCosmicBodega</title>
    <meta charset="utf-8">
  </head>

  <div class="header container-fluid" id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">
      <img src="images/logo.png" width="30" height="30">
      The Cosmic Bodega
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login1.php">Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.html">Sign Up</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="orders.html">The dark side of the Bodega</a>
          </li>

        </ul>
      </div>
    </nav>
    <div class="container bagel">
      <link href="styles.css" rel="stylesheet" >
    <form method="post" action="">


      <div class="signup"> <h2> Sign up </h2> </div>
       <p>

      </p>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <label for="confirmPassword"></label>
        <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Confirm password">
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Alienticity</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>Martian</option>
          <option>Earthling</option>
          <option>Plutonian</option>
          <option>OuterGalactian</option>
        </select>
      </div>

        <button type="submit" name="submit" class="btn btn-info signup">Sign up</button>
        <button type="reset" class="btn btn-info reset">Reset</button>

      </form>

    </div>
    </html>
