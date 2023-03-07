<?php

namespace Property;

include "./autoload/autoload.php";

use \Property\DB\Property;

$obj = new Property();

//Create new property
if (isset($_POST['title'])) {
    $image = $_FILES['image']['name'];
    //upload image
    $img_tmp_name = $_FILES['image']['tmp_name'];
    $upload_dir = './upload/';
    $upload_file = $upload_dir . basename($image);
    move_uploaded_file($img_tmp_name, $upload_file);
    //Property array
    $property = [
        "title"       => $_POST['title'],
        "image"       => $image != "" ? "./upload/" . basename($image) : "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
        "description" => $_POST['description'] != "" ? $_POST['description'] : "Lorem Ipsum is simply dummy text of the Lorem Ipsum Lorem Ipsum",
        "price"       => $_POST['price'],
        "location"    => $_POST['location'],
        "bedroom"      => $_POST['bedroom'] != "" ? $_POST['bedroom'] : 2,
        "bathroom"      => $_POST['bathroom'] != "" ? $_POST['bathroom'] : 1,
        "square"      => $_POST['square'],
        "garage"      => $_POST['garage'] != "" ? $_POST['garage'] : 1,
    ];
    $obj->addProperty($property);
    header("Location: ./index.php");
}
