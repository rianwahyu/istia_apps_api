<?php

include 'connection.php';

$itemName = $_POST['itemName'];
$itemDescription = $_POST['itemDescription'];

$itemID = getItemID();


$query = "INSERT INTO `masterItem`(`itemID`, `itemName`, `itemDescription`) VALUES ('$itemID', '$itemName', '$itemDescription')";
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

function getItemID()
{
    include 'connection.php';
    $curYear = date('y');
    $querys = "SELECT itemID FROM masterItem where 1  ORDER BY itemID DESC limit 1";
    $result = mysqli_query($dbc, $querys) or die("Unable to verify user because : " . mysqli_error($dbc));
    if (mysqli_num_rows($result) == 1) {
        $kode = "";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
            $kode = $row["itemID"];
        }

        $kode = substr($kode, 2);
        $itemID = "$curYear" . str_pad($kode + 1, 4, 0, STR_PAD_LEFT);
    } else {
        $itemID = $curYear . "0001";
    }

    return $itemID;
}
