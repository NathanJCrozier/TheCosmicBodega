<?php
session_start();
?>



<!DOCTYPE html>
<html>



<head>

    <!-- Custom CSS -->
    <link href="P4.css" rel="stylesheet">

    <!-- Bootstrap CSS + JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <html lang="en">

    <head>
        <title>TheCosmicBodega</title>
        <meta charset="utf-8">


        <!-- Icons font -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />






        <title> Shopping Cart</title>
    </head>

<body>


    <?php
    $quantity = isset($_POST["qty"]) ? $_POST["qty"] : '';
    ?>




    <div class="header container-fluid" id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">
                <img src="https://image.flaticon.com/icons/png/512/124/124610.png" max-width="100" width="100" overflow: hidden margin-right: 1em;>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aisles
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="produce.html">
                                Produce
                            </a>
                            <a class="dropdown-item" href="#">
                                Pantry
                            </a>
                            <a class="dropdown-item" href="#">
                                Dairy and Eggs
                            </a>
                            <a class="dropdown-item" href="#">
                                Beverages
                            </a>
                            <a class="dropdown-item" href="#">
                                Snacks
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sign Up</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>







    <h1> Shopping Cart</h1>
    </div>




    <div class="row">




        <div class="col">
            <div class="table">

                <div class="table-header">
                    <div class="layout-inline row th">
                        <div class="col product">Product</div>
                        <div class="col price">Price</div>
                        <div class="col quantity">Quantity</div>
                        <div class="col removal">Remove</div>
                        <div class="col total">Total</div>
                    </div>
                </div>



                <div class="product" id="prod1">


                    <div class="layout-inline row">
                        <div class="col col-pro layout-inline ">
                            <div class="product-details">
                                <div class="product-image">
                                    <img src="<?php echo $_SESSION["img"]; ?>">
                                </div>
                                <div class="product-title"> <?php echo $_SESSION["title"]; ?></div>
                            </div>
                        </div>

                        <div class="col col-price col-numeric align-center ">
                            <div class="product-price"><?php echo $_SESSION["price"]; ?></div>
                        </div>

                        <div class="col col-qty layout-inline">
                            <div class="product-quantity">
                                <input type="number" id="myNumber1" value="<?php echo $quantity; ?>" min="1">
                            </div>
                        </div>


                        <div class="col col-product-removal">
                            <button class="remove-product" onclick="remove1()">Remove</button>
                        </div>

                        <div class="col product-line-price" id="total1">GS 9.98
                        </div>

                    </div>
                    <hr>
                </div>


                <?php
                $quantity2 = isset($_POST["qty2"]) ? $_POST["qty2"] : '';
                ?>




                <div class="product" id="prod2">


                    <div class="layout-inline row">

                        <div class="col col-pro layout-inline">
                            <div class="product-details">
                                <div class="product-image">
                                    <img src="<?php echo $_SESSION["img2"]; ?>">
                                </div>
                                <div class="product-title"> <?php echo $_SESSION["title2"]; ?></div>
                            </div>
                        </div>

                        <div class="col col-price col-numeric align-center ">
                            <div class="product-price"><?php echo $_SESSION["price2"]; ?></div>
                        </div>

                        <div class="col col-qty layout-inline">
                            <div class="product-quantity">
                                <input type="number" id="myNumber2" value="<?php echo $quantity2; ?>" min="1">
                            </div>
                        </div>


                        <div class="col product-removal">
                            <button onclick="Added()" class="remove-product" onclick="remove2()">Remove</button>
                        </div>

                        <div class="col product-line-price" id="total2">GS 3.39</div>

                    </div>
                    <hr>
                </div>







                <div class="product" id="prod3">


                    <div class="layout-inline row">

                        <div class="col col-pro layout-inline">
                            <div class="product-details">
                                <div class="product-image">
                                    <img src="https://user-images.githubusercontent.com/92217346/136717712-a677e262-b0cc-4504-98ee-a5960d3c7fcf.png">
                                </div>
                                <div class="product-title">Nitrain Extract</div>
                            </div>
                        </div>

                        <div class="col col-price col-numeric align-center ">
                            <div class="product-price">GS 1.99 ea.</div>
                        </div>

                        <div class="col col-qty layout-inline">
                            <div class="product-quantity">
                                <input type="number" id="myNumber3" value="3" min="1">
                            </div>
                        </div>


                        <div class="col product-removal">
                            <button class="remove-product" onclick="remove3()">Remove</button>
                        </div>

                        <div class="col product-line-price" id="total3">GS 5.97</div>

                    </div>
                    <hr>
                </div>
            </div>





            <div class="col">
                <div class="summary">
                    <div class="summary-components">
                        <label>Number of Items</label>
                        <div class="summary-value" id="cart-count">6</div>
                    </div>
                    <div class="summary-components">
                        <label>Subtotal</label>
                        <div class="summary-value" id="cart-subtotal">GS 19.34</div>
                    </div>
                    <div class="summary-components">
                        <label>IGT (7%)</label>
                        <div class="summary-value" id="cart-tax">GS 1.35</div>
                    </div>
                    <div class="summary-components">
                        <label>Delivery Fee</label>
                        <div class="summary-value" id="cart-shipping">GS 3.00</div>
                    </div>
                    <div class="summary-components">
                        <label>Discount</label>
                        <div class="summary-value" id="cart-discount">GS (0.00)</div>
                    </div>
                    <div class="summary-components">
                        <label>
                            <hr><b>Grand Total</b>
                        </label>
                        <div class="summary-value" id="cart-grand-total">
                            <hr b>GS 23.69</b>
                        </div>
                    </div>
                </div>
            </div>




















            <div class="buttons">
                <button class="update" onclick="myFunction()">Update Cart</button>
                <button class="checkout">Checkout</button>
            </div>



            <script src="cart.js"></script>


</body>


</html>
