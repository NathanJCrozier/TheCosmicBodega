<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type= "text/css" href="user.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

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
                    <a class="nav-link" href="index.php">Online Store</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://www.kindpng.com/picc/m/421-4212623_gd-avatar-alien-circle-hd-png-download.png"><span class="font-weight-bold"></span><span> </span></div>


<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="text-right"><h2>Profile Settings</h2></h4>
</div>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>


<body>






<div class="container mt-6 mb-5">
    <div class="row">



        </div>
        <?php include('database/database.php');
        $q=$_GET['q'];

        if (isset($_GET['q'])){
            if ($q=='e'){
                $url='database/edit.php';
                $id=$_GET['id'];
                $query="select * from users where id=".$id;
                $result = $conn->query($query);
                $row = $result->fetch_assoc();

                if ($result->num_rows == 0){
                    $url="database/add.php";
                }

            }
            else{
                $url="database/add.php";
            }

        }else{

            $url="database/add.php";
        }
        ?>
            <form method="POST" action="<?php echo $url; ?>">
            <div class="p-3 py-5">
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">First Name</label><input required name="first_name" type="text" class="form-control" placeholder="enter first name"
                    value="<?php if ($result->num_rows > 0){echo $row['first_name'];} ?>
                    "></div>
                    <?php if ($result->num_rows > 0){
                        echo "<input required type='hidden' value='".$row['id']."' name='id'>";
                    } ?>

                    <div class="col-md-6"><label class="labels">Last Name</label><input required type="text" class="form-control" name="last_name" value="<?php if ($result->num_rows > 0){echo $row['last_name'];} ?>" placeholder="enter last name"></div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12"><label class="labels">Phone Number</label><input required type="text" class="form-control" name="number" placeholder="enter phone number" value="<?php if ($result->num_rows > 0){echo $row['number'];} ?>"></div>

                    <div class="col-md-12"><label class="labels">Street Address</label><input required type="text" class="form-control" name="address" placeholder="enter street address" value="<?php if ($result->num_rows > 0){echo $row['address'];} ?>"></div>

                    <div class="col-md-12"><label class="labels">Postal Code</label><input required type="text" class="form-control" name="postal" placeholder="enter postal code" value="<?php if ($result->num_rows > 0){echo $row['postal'];} ?>"></div>


                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Area</label><input required type="text" class="form-control" placeholder="enter area" name="area" value="<?php if ($result->num_rows > 0){echo $row['area'];} ?>"></div>

                         <div class="col-md-6"><label class="labels">Planet</label><input required type="text" class="form-control" value="<?php if ($result->num_rows > 0){echo $row['planet'];} ?>" name="planet"placeholder="enter planet"></div>
                    </div>

                    <div class="col-md-12"><label class="labels">Email Address</label><input required type="text" class="form-control" name="email" placeholder="enter email address" value="<?php if ($result->num_rows > 0){echo $row['email'];} ?>"></div>
                    <div class="col-md-12"><label class="labels">Password</label><input required type="text" class="form-control" name="password" placeholder="enter password" value="<?php if ($result->num_rows > 0){echo $row['password'];} ?>"></div>

                </div>

                <div class="mt-6 text-center"><button class="btn btn-primary profile-button" type="submit">Save Changes</button></div>
            </div>
        </div>
        </form>


</body>


</html>
