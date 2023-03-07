<?php

namespace Property;

include "./autoload/autoload.php";

use \Property\DB\Property;

$obj = new Property();
//get all properties
$properties = $obj->getProperty();

//remove property
if (isset($_GET['propertyId'])) {
    $obj->removeProperty($_GET['propertyId']);
    header("Location: ./index.php");
}
//add To cart
if (isset($_GET['addToCartId'])) {
    $obj->addToCart($_GET['addToCartId']);
    header("Location: ./index.php");
}
//get all cart
$allCart = $obj->getCart();
//remove cart
if (isset($_GET['removeCart'])) {
    $obj->removeCart($_GET['removeCart']);
    header("Location: ./addtocart.php");
}
//total cart price

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dream House</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>

<body>

    <body>
        <div class="container">
            <!-- Navigation area -->
            <nav>
                <div class="logo">
                    <a href="./"><img src="./img/logo.png" alt="Logo"></a>
                </div>
                <ul>
                    <li class="active"><a href="./">Home</a><span></span></li>
                    <li><a href="./addtocart.php">Cart</a><span></span></li>
                </ul>
            </nav>