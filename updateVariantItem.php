<?php

include 'connection.php';

$color = $_POST['color'];
$size = $_POST['size'];
$price = $_POST['price'];

$variantID = $_POST['variantID'];

$query = "UPDATE `variantItem` SET `color`='$color',`size`='$size',`price`='$price' WHERE variantID='$variantID' ";
$result = mysqli_query($dbc, $query);

if ($result === TRUE) {
    echo json_encode(array(
        "success" => true,
        "message" => "Sukses edit varian item"
    ));
} else {
    echo json_encode(array(
        "success" => false,
        "message" => "Gagal"
    ));
}
