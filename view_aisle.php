<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="styles.css" rel="stylesheet" >
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<html lang="en">
  <head>
    <title>TheCosmicBodega</title>
    <meta charset="utf-8">
  </head>

<?php

$aisle = $_GET['aisle'];
$aisle_formatted = $_GET['aisle_name'];
$xml = simplexml_load_file("products.xml");
?>

<div class="header container-fluid" id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">
      <img src="images/logo.png" width="30" height="30">
      <img src="images/back_arrow.png" width="20" height="20">
        <?php echo $aisle_formatted;?>
      </a>

    </nav>
</div>

<div class="aisle container">
  <div class="row">
  <?php
  $counter = 0;
  foreach ($xml->$aisle->children() as $product) {
    echo '<div class="col-sm">' . "<br>";
    echo '<h6 class="text-center">' . $product->name . '</h6>';
    echo '<a href="view_product.php?aisle=' . $aisle . '&product_index=' . $counter . '">';
    echo '<img src="'. $xml->$aisle->product[$counter]->image . '"  ' . $xml->$aisle->product[$counter]->i_width . ' '. $xml->$aisle->product[$counter]->i_height . '>';
    echo '</a>' . '<br>';
    echo '</div>';
    $counter++;

    if ($counter % 3 == 0){
      echo '<div class="w-100"></div>' . '<br>';
    }

  }
?>

<div class="w-100"></div>
