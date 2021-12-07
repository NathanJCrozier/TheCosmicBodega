<?php
// Start the session
session_start();
?>


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

<div class="header container-fluid" id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="beverages.html">
        <img src="https://github.com/NathanJCrozier/TheCosmicBodega/blob/main/images/logo.png?raw=true" width="30" height="30">
        <img src="https://github.com/NathanJCrozier/TheCosmicBodega/blob/main/images/back_arrow.png?raw=true" width="20" height="20">
      Alloy Drum
      </a>

    </nav>
</div>
  
  <body>
    <?php
    // Set session variables
    $_SESSION["title"] = "Alloy Drum";
    $_SESSION["price"] = "GS 4.99 ea.";
    $_SESSION["img"] = "https://user-images.githubusercontent.com/92217346/136717356-9e3ad837-2568-427a-800e-fae31e8215d8.png";

    if (isset($_POST['Add'])) {
        $quantity = $_POST["qty"];
    }

    ?>

 <div class="product container">
        <div class="row">
            <div class="col">
                <form action="" method="post" name="myform">
                    <img src="https://user-images.githubusercontent.com/92217346/136717356-9e3ad837-2568-427a-800e-fae31e8215d8.png" name="image">
            </div>
            <div class="col">
                <h3 class="item_title display-3" name="title">
                    Alloy Drum
                </h3>
                <h5 class="text-secondary" name="price">
                    Price: GS 4.99 ea.
                </h5>
                <details>
                    <summary>Description:</summary>
                    <p class="item_description text-wrap">
                        Alloy Drum® non-alcoholic beer is imported from Venus, Jupiter and Cedna. This full bodied crisp beer starts with a gentle maltiness and clean finish. <br>
                        Product Number: 8716700016297
                    </p>
                </details>
                <button onclick="Added()" type="submit" name="Add" placeholder="Add" class="btn btn-secondary btn-lg">
                    Add to cart
                </button>
                Quantity:
                <input type="number" id="quantity" name="qty" min="1" max="99">
                </form>
            </div>
        </div>
    </div>

    <script>
src="storeInputLocally.js">
        function Added() {
            if (confirm('Item added to cart! \nProceed to checkout?')) {
                document.myform.action = "example1.php";
            } else {}
        }
    </script>


</body>



</html>