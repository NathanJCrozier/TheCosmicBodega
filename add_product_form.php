
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

    <title>Add Product</title>
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
              <a class="nav-link" href="javascript:void(0)">Home</a>
            </li>
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
    </form>
    <!-- Content -->
    <div class="container-fluid pt-4 px-5">
      <!-- Top Bar -->
      <div class="row mb-4">
        <div class="col">
          <h2>Add Product</h2>
        </div>
      </div>
      <div class="container-fluid table-container shadow-sm p-4 mb-4">
        <form action="add_product.php" method="post" class="create">
          <div class="form-group row">
            <label for="imageURL" class="col-sm-2 col-form-label"
              >Image URL</label
            >
            <div class="col-sm-10">
              <input type="text" class="form-control" value="images/your_image.png" name="image" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="imageWidth" class="col-sm-2 col-form-label"
              >Image Width</label
            >
            <div class="col-sm-10">
              <input type="text" class="form-control" value='width="400px"' name="width" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="imageHeight" class="col-sm-2 col-form-label"
              >Image Height</label
            >
            <div class="col-sm-10">
              <input type="text" class="form-control" value='height="400px"' name="height" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="productName" class="col-sm-2 col-form-label"
              >Product Name</label
            >
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Name" name="name" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="productPrice" class="col-sm-2 col-form-label"
              >Product Price</label
            >
            <div class="col-sm-10">
              <input type="number" class="form-control" placeholder="Price" name="price" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="productID" class="col-sm-2 col-form-label"
              >Product ID</label
            >
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="ID" name="id" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="aisleName" class="col-sm-2 col-form-label"
              >Aisle</label
            >
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Aisle" name="aisle" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="productDescription" class="col-sm-2 col-form-label"
              >Product Description</label
            >
            <div class="col-sm-10">
              <textarea
                id="description"
                name="description"
                class="productDescriptionTextarea"
                placeholder="Description"
                cols="75"
                rows="3"
                required
              ></textarea>
            </div>
          </div>

          <div class="form-group row">
            <button type="submit" class="btn btn-success">Create</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
