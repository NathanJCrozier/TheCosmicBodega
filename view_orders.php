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

    <title>Orders</title>
</head>
<body>
    <!-- Import order listing XML -->
    <?php
        $xml = simplexml_load_file("orders.xml");
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
                        <a class="nav-link" href="orders.html">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product_list.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_list.html">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Online Store</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Content -->
    <div class="container-fluid pt-4 px-5">
        <div class="container-fluid top-header">
            <h1 class="pb-3">Orders</h1>
            <!-- Order buttons -->
            <div class ="row pb-4">
                <div class="col">
                    <div class = "d-flex justify-content-end">
                        <div class="px-1 pt-1 bd-highlight">
                            <button type="button" class="btn btn-primary">Create order</button>
                            <button type="button" class="btn btn-danger check-reveal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid table-container shadow-sm p-4 mb-4">
            <!-- Table -->
            <div class="table-responsive-lg">
                <table>
                    <!-- Header -->
                    <thead>
                        <tr>
                            <th scope="col" width="3%"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col" width="5%">Order</th>
                            <th scope="col" width="15%">Date</th>
                            <th scope="col" width="15%">Customer</th>
                            <th scope="col" width="10%">Payment Status</th>
                            <th scope="col" width="10%">Fulfillment Status</th>
                            <th scope="col" width="5%">Total (GS)</th>
                            <th scope="col" width="3%">Items</th>
                            <th scope="col" width="10%">Delivery Method</th>
                            <th scope="col" width="5%"></th>
                        </tr>
                    </thead>
                    <!-- Body -->
                    <tbody>
                        <?php
                            foreach ($xml->children() as $order) {
                                echo "<tr>";
                                echo "<td><input class=\"form-check-input\" type=\"checkbox\">";
                                echo "<td>#$order->id</td>";
                                echo "<td>$order->date</td>";
                                echo "<td>$order->customer</td>";
                                if ($order->payment == "Paid") {
                                    echo "<td><span class=\"badge rounded-pill bg-success\">Paid</span></td>";
                                } elseif ($order->payment == "Pending") {
                                    echo "<td><span class=\"badge rounded-pill bg-warning\">Pending</span></td>";
                                } else {
                                    echo "<td><span class=\"badge rounded-pill bg-danger\">Cancelled</span></td>";
                                }
                                if ($order->fulfillment == "Fulfilled") {
                                    echo "<td><span class=\"badge rounded-pill bg-success\">Fulfilled</span></td>";
                                } elseif ($order->fulfillment == "Unfulfilled") {
                                    echo "<td><span class=\"badge rounded-pill bg-warning\">Unfulfilled</span></td>";
                                } elseif ($order->fulfillment == "Ready for delivery") {
                                    echo "<td><span class=\"badge rounded-pill bg-primary\">Ready for delivery</span></td>";
                                } else {
                                    echo "<td><span class=\"badge rounded-pill bg-danger\">Cancelled</span></td>";
                                }
                                echo "<td>$order->total</td>";
                                echo "<td>$order->items</td>";
                                echo "<td>$order->delivery</td>";
                                echo "<td><div class=\"d-flex\"><a href=\"edit-order-$order->id.html\"><button class=\"btn btn-sm btn-primary\"><i class=\"bi bi-pencil text-white\"></i></button></a>
                                <button class=\"btn btn-sm btn-danger ms-1\">X</button></div></td>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
