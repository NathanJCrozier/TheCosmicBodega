<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS + JS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"
    ></script>

    <!-- Custom CSS -->
    <link href="styles.css" rel="stylesheet" />

    <!-- Icons font -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />

    <title>Products List</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)">The Cosmic Bodega</a>
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
              <a class="nav-link" href="orders.html">Orders</a>
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
                href="index.html"
                >Online Store</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Content -->
    <div class="container-fluid pt-4 px-5">
      <!-- Top Bar -->
      <div class="row mb-4">
        <div class="col">
          <h2>Products List</h2>
        </div>
        <div class="col ">
          <a href="add_product_form.php"><div class="btn btn-success add-product-btn">Add Product</div></a>
        </div>
      </div>




      <div class="container-fluid table-container shadow-sm p-4 mb-4">
        <!-- Order Table -->
        <div class="table-responsive-lg">
          <table class="table table-sm table-bordered" style="width: auto">
            <!-- Header -->
            <thead>
              <tr>
                <th scope="col" width="10%" class="text-center">Image</th>
                <th scope="col" width="5%" class="text-center">Product</th>
                <th scope="col" width="5%" class="text-center">Price (GS)</th>
                <th scope="col" width="15%" class="text-center">Inventory</th>
                <th scope="col" width="15%" class="text-center">Aisle</th>
                <!-- <th scope="col" width="10%" class="product-description">
                  Description
                </th> -->
                <th scope="col" width="1%" class="text-center">Edit</th>
                <th scope="col" width="1%" class="text-center">Delete</th>
              </tr>
            </thead>
            <!-- Body -->
            <tbody>
              <!-- Data -->

              <?php

              $xml = new DomDocument('1.0', 'utf-8');
              $xml->load('products.xml', LIBXML_NOBLANKS);
              $xml->formatOutput = true;
              $products = $xml->getElementsByTagName('product');
              $product_info = array('empty','empty','empty','empty','empty','empty','empty');

              foreach($products as $product){
                $counter = 0;
                $aisle_name = $product->parentNode->nodeName;

                foreach($product->childNodes as $element){
                  $product_info[$counter] = $element->textContent;
                  $counter++;
                }

                echo '<tr>';
                echo '<td>';
                echo '<img src="'. $product_info[4] . '" class="product-list-image">';
                echo '</td>';
                echo '<td>' . $product_info[1] . '</td>';
                echo '<td class="text-center">' . $product_info[2] . '</td>';
                echo '<td class="text-center"><span class="badge rounded-pill bg-success">In Stock</span></td>';
                echo '<td>' . $aisle_name . '</td>';
                echo '<td>
                  <button type="submit" form="edit" value =" ' . $product_info[0] . '" name="product_to_edit" class="btn btn-primary btn-sm ms-1">
                    <i class="bi bi-pencil"></i>
                  </button>';
                echo '</td>';
                echo '<td>';
                echo '<button type="submit" form="delete" value =" ' . $product_info[0] . '" onclick="return confirm(\'Are you sure?\nThis action cannot be undone.\')" class="btn btn-sm btn-danger" name="product_to_delete" ><i class="bi bi-trash-fill"></i></button></td>';
                echo '</tr>';

              }

               ?>



               <?php


               if (isset($_POST['product_to_delete'])) {
               foreach($products as $product){
                 $counter = 0;
                 $aisle_name = $product->parentNode->nodeName;

                 foreach($product->childNodes as $element){
                   $product_info[$counter] = $element->textContent;
                   $counter++;
                 }

                if ($product_info[0] == $_POST['product_to_delete']){
                  $product->parentNode->removeChild($product);
                  $xml->save('products.xml');
                  echo "<meta http-equiv=\"refresh\" content=\"0;URL=product_list.php\">";
                  break;
                }

               }
             }



               ?>


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
  <form id="edit" action="edit_product_form.php" method="post"></form>
  <form id="delete" action="" method="post"></form>
</html>
