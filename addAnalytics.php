<?php

include 'connection.php';

$variantID = $_POST['variantID'];
$vote = $_POST['vote'];
$username = $_POST['username'];

$query = "INSERT INTO `analyticsItem`(`variantID`, `vote`, `analyticsDate`, `analyticsBy`) VALUES ('$variantID', '$vote', NOW(), '$username')";
$result = mysqli_query($dbc, $query);

if ($result === TRUE) {
    echo json_encode(array(
        "success" => true,
        "message" => "Sukses"
    ));
} else {
    echo json_encode(array(
        "success" => false,
        "message" => "Gagal"
    ));
}