<?php

include 'connection.php';

$itemName = $_POST['itemName'];
$itemDescription = $_POST['itemDescription'];
$itemID = $_POST['itemID'];

$query = "UPDATE `masterItem` SET `itemName`='$itemName',`itemDescription`='$itemDescription' WHERE itemID='$itemID'";
$result = mysqli_query($dbc, $query);

if ($result === TRUE) {
    echo json_encode(array(
        "success" => true,
        "message" => "Sukses edit master item"
    ));
} else {
    echo json_encode(array(
        "success" => false,
        "message" => "Gagal"
    ));
}