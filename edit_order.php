<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS + JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link href="backstore_styles.css" rel="stylesheet">

    <!-- Icons font -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Edit Order</title>
</head>
<body>
    <!-- Import order and product listing XML -->
    <?php
        $dom_orders = new DomDocument('1.0', 'utf-8');
        $dom_orders->load('orders.xml', LIBXML_NOBLANKS);
        $dom_orders->formatOutput = true;
        $all_orders = $dom_orders->getElementsByTagName('order');
        $all_orderIDs = $dom_orders->getElementsByTagName('id');
        $xpath = new DOMXPath($dom_orders);

        $productListing = new DomDocument('1.0', 'utf-8');
        $productListing->load('products.xml', LIBXML_NOBLANKS);
        $productListing->formatOutput = true;
        $products = $productListing->getElementsByTagName('product');
        $orderID = $_COOKIE['edit_id'];
    ?>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)">The Cosmic Bodega</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="view_orders.php">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product_list.html">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_list.html">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://nathanjcrozier.github.io/TheCosmicBodega/">Online Store</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Content -->
    <form method="post" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="container-fluid pt-4 px-5">
        <!-- Top Bar -->
        <div class="row mb-4">
            <div class="col">
                <h2>
                    <?php
                        echo "Edit Order #$orderID";
                    ?>
                </h2>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a href="view_orders.php"><button type="button" class="btn btn-danger ms-2">Back</button></a>
                    <button type="submit" form="add" name="add" class="btn btn-primary ms-2">Add a product</button>
                    <input type="submit" class="btn btn-primary ms-2" value="Save" name="save"></button>
                </div>
            </div>
        </div>
        <div class="container-fluid table-container shadow-sm p-4 mb-4">
            <!-- Order Table -->
            <div class="table-responsive-lg">
                <table>
                    <!-- Header -->
                    <thead>
                        <tr>
                            <th scope="col" width="30%">Product</th>
                            <th scope="col" width="25%">Price (GS)</th>
                            <th scope="col" width="25%">Quantity</th>
                            <th scope="col" width="20%">Total (GS)</th>
                            <!-- remove button column -->
                            <th scopt="col" width="5%"></th>
                        </tr>
                    </thead>
                    <!-- Body -->
                    <tbody>
                        <!-- Data -->
                        <?php
                            // find the right order (it's inefficient but I have no time)
                            foreach ($all_orderIDs as $id) {
                                if ($id->nodeValue == $orderID) {
                                    $thisOrder = $id->parentNode;
                                }
                            }
                            // display items in the order and give them unique ids
                            $counter = 0;
                            $currentItems = $thisOrder->childNodes->item(5);
                            foreach ($currentItems->childNodes as $item) {
                                echo "<tr>";
                                echo '<td><input class="form-control form-control-sm" type="text" value="' . $item->childNodes->item(0)->nodeValue . '" name="product_' . $counter . '">';
                                echo '<td><input class="form-control form-control-sm" type="text" value="' . $item->childNodes->item(1)->nodeValue . '" name="price_' . $counter . '">';
                                echo '<td><input class="form-control form-control-sm" type="text" value="' . $item->childNodes->item(2)->nodeValue . '" name="quantity_' . $counter . '">';
                                echo '<td><input class="form-control form-control-sm" type="text" value="' . $item->childNodes->item(3)->nodeValue . '" name="itemTotal_' . $counter . '">';
                                echo '<td><button type="submit" form="delete" name="delete" value="' . $item->childNodes->item(0)->nodeValue . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\nThis action cannot be undone.\')">X</button></td>';
                                $counter++;
                            }
                            if (isset($_POST['add'])) {
                                echo "<tr>";
                                echo '<td><input class="form-control form-control-sm" type="text" name="product_' . $counter . '">';
                                echo '<td><input class="form-control form-control-sm" type="text" name="price_' . $counter . '">';
                                echo '<td><input class="form-control form-control-sm" type="text" name="quantity_' . $counter . '">';
                                echo '<td><input class="form-control form-control-sm" type="text" name="itemTotal_' . $counter . '">';
                                echo '<td><button type="submit" form="delete" name="delete" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\nThis action cannot be undone.\')">X</button></td>';
                                $counter++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Checkout Info -->
            <div class="d-flex mt-5">
                <div class="col-6 checkout"></div>
                <div class="row row-cols-2">
                    <div class="col fw-500 mb-3"><select class="form-select" name="delivery">
                        <?php
                            if ($thisOrder->childNodes->item(6)->nodeValue == "In-Store Pickup") {
                                echo '<option selected="In-Store Pickup">In-Store Pickup</option>';
                            } else {
                                echo '<option value="In-Store Pickup">In-Store Pickup</option>';
                            }
                            if ($thisOrder->childNodes->item(6)->nodeValue == "Free Shipping") {
                                echo '<option selected="Free Shipping">Free Shipping</option>';
                            } else {
                                echo '<option value="Free Shipping">Free Shipping</option>';
                            }
                            if ($thisOrder->childNodes->item(6)->nodeValue == "Express Delivery") {
                                echo '<option selected="Express Delivery">Express Delivery</option>';
                            } else {
                                echo '<option value="Express Delivery">Express Delivery</option>';
                            }
                        ?>
                    </select></div>
                    <div class="col"><select class="form-select" name="fulfillment">
                        <?php
                            if ($thisOrder->childNodes->item(3)->nodeValue == "Fulfilled") {
                                echo '<option selected="Fulfilled">Fulfilled</option>';
                            } else {
                                echo '<option value="Fulfilled">Fulfilled</option>';
                            }
                            if ($thisOrder->childNodes->item(3)->nodeValue == "Unfulfilled") {
                                echo '<option selected="Unfulfilled">Unfulfilled</option>';
                            } else {
                                echo '<option value="Unfulfilled">Unfulfilled</option>';
                            }
                            if ($thisOrder->childNodes->item(3)->nodeValue == "Ready for pickup") {
                                echo '<option selected="Ready for pickup">Ready for pickup</option>';
                            } else {
                                echo '<option value="Ready for pickup">Ready for pickup</option>';
                            }
                            if ($thisOrder->childNodes->item(3)->nodeValue == "Ready for delivery") {
                                echo '<option selected="Ready for delivery">Ready for delivery</option>';
                            } else {
                                echo '<option value="Ready for delivery">Ready for delivery</option>';
                            }
                            if ($thisOrder->childNodes->item(3)->nodeValue == "Cancelled") {
                                echo '<option selected="Cancelled">Cancelled</option>';
                            } else {
                                echo '<option value="Cancelled">Cancelled</option>';
                            }
                        ?>
                    </select></div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <?php
        if (isset($_POST['delete'])) {
            foreach ($currentItems->childNodes as $item) {
                if ($item->childNodes->item(0)->nodeValue == $_POST['delete']) {
                    $item->parentNode->removeChild($item);
                    $dom_orders->save('orders.xml');
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=edit_order.php\">";
                }
            }
        }
        if (isset($_POST['save'])){
            $itemIndex = 0;
            foreach ($currentItems->childNodes as $item) {
                $item->childNodes->item(0)->nodeValue = $_POST['product_' . $itemIndex];
                $item->childNodes->item(1)->nodeValue = $_POST['price_' . $itemIndex];
                $item->childNodes->item(2)->nodeValue = $_POST['quantity_' . $itemIndex];
                $item->childNodes->item(3)->nodeValue = $_POST['price_' . $itemIndex] * $_POST['quantity_' . $itemIndex];

                $itemIndex++;

                echo "<meta http-equiv=\"refresh\" content=\"0;URL=edit_order.php\">";
            }

            for ($i = 0; $i < 1; $i++) {
                if ($_POST['product_' . $itemIndex] != null) {
                    $newItem = $dom_orders->createElement('item');
                    $newItem = $currentItems->appendChild($newItem);

                    $newItem->appendChild($dom_orders->createElement('name', $_POST['product_' . $itemIndex]));
                    $newItem->appendChild($dom_orders->createElement('price', $_POST['price_' . $itemIndex]));
                    $newItem->appendChild($dom_orders->createElement('quantity', $_POST['quantity_' . $itemIndex]));
                    $newItem->appendChild($dom_orders->createElement('total', $_POST['total_' . $itemIndex]));
                    $itemIndex++;

                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=edit_order.php\">";
                }
            }

            $thisOrder->childNodes->item(3)->nodeValue = $_POST['fulfillment'];
            $thisOrder->childNodes->item(6)->nodeValue = $_POST['delivery'];
            $dom_orders->save('orders.xml');
        }
    ?>
    <script src="editOrder.js"></script>
</body>
<form id="delete" action="" method="post"></form>
<form id="add" action="" method="post"></form>
</html>
