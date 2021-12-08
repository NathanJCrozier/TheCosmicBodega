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
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Aisles
            </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="view_aisle.php?aisle_name=Produce&aisle=Produce">
              Produce
            </a>
            <a class="dropdown-item" href="view_aisle.php?aisle_name=Pantry&aisle=Pantry">
              Pantry
            </a>
            <a class="dropdown-item" href="view_aisle.php?aisle_name=Dairy and Eggs&aisle=Dairy_and_Eggs">
              Dairy and Eggs
            </a>
            <a class="dropdown-item" href="view_aisle.php?aisle_name=Beverages&aisle=Beverages">
              Beverages
            </a>
          </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.html">Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.html">Sign Up</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="orders.html">The Dark Side of the Bodega</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="shopping_cart.html">Your Cart (3)</a>
          </li>

        </ul>
      </div>
    </nav>

  <div class="badge bg-info text-wrap" id="mission_statement">
      Here at the cosmic bodega we strive to provide our customers with the freshest ingredients across the universe. Known for our perfectly ripe frumbles and versatile gadoobagorps, the cosmic bodega has been serving lifeforms for thousands of parsecs. From the milky way to GN-Z11 we carry anything and everything you might require. At the cosmic bodega you can rest assured that you're in good hands*.

  </div>
  <p class="text-center" id="slogan">
        From alpha to omega, we've got it at the bodega.
      </p>
</div>

<div class="container-fluid bg-primary text-white text-center text">
  <h4>
    Item of the day
  </h4>
</div>

<div class="container-fluid" id="item_of_the_day">
  <img src="images/cantaloupe.jpg" class="rounded mx-auto d-block" width="200px" height="200px">
  <p class="text-center fw-light fst-italic" id="iotd_description">
    An earth delicacy called a "cantaloupe".
  </p>
</div>

<nav class="footer navbar navbar-light bg-light">
  <ul class="nav-item active">

   <p>
     Get to know us better
     <img src="images/footer_icon.png" width="30" height="30">
   </p>


   <a class="nav-link" href="about_us.html">
     About us
   </a>

   <a class="nav-link" href="careers.html">
     Careers
   </a>
   <p class="fw-light">
  *TheCosmicBodega™	is a non-discriminatory organization and welcomes all lifeforms regardless of appendage.
  </p>
  </ul>
</nav>
</html>
