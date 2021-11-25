<?php

include 'connection.php';

$itemID = $_POST['itemID'];
$color = $_POST['color'];
$size = $_POST['size'];
$price = $_POST['price'];

$variantID = getVariantID($itemID);

$query = "INSERT INTO `variantItem`(`variantID`, `itemID`, `color`, `size`, `price`) VALUES ('$variantID', '$itemID', '$color', '$size', '$price')";
$result = mysqli_query($dbc, $query);

if ($result === TRUE) {
    echo json_encode(array(
        "success" => true,
        "message" => "Sukses menambahkan Master Item"
    ));
} else {
    echo json_encode(array(
        "success" => false,
        "message" => $query
    ));
}

function getVariantID($itemID)
{
    include 'connection.php';
    $querys = "SELECT variantID FROM variantItem where itemID LIKE '$itemID%' ORDER BY variantID DESC limit 1";
    $result = mysqli_query($dbc, $querys) or die("Unable to verify user because : " . mysqli_error($dbc));
    if (mysqli_num_rows($result) == 1) {
        $kode = $itemID;
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
            $kode = $row["variantID"];
        }

        $kode = substr($kode, 6);
        $variatntID = "$itemID" . str_pad($kode + 1, 4, 0, STR_PAD_LEFT);
    } else {
        $variatntID = $itemID . "0001";
    }

    return $variatntID;
}
