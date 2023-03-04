<?php
include_once "./data/data.php";
include_once "./function.php";
$obj = new Products();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Products filters</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="https://icon-library.com/images/icon-for-products/icon-for-products-20.jpg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center text-dark font-weight-bold text-capitalize my-3"><a href="./">Products Filters</a></h1>
    <div class="container">
        <div class="row">
            <form class="form-inline mx-auto" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="category" placeholder="Filter by category...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary mb-2">Filter</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <?php
            if (isset($_GET['category']) && $_GET['category'] != '') {
                $obj->filterProduct(strtolower($_GET['category']), $products);
            } else {
                $obj->displayProduct($products);
            }
            ?>
        </div>
    </div>
</body>

</html>