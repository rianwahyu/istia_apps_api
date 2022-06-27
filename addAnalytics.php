<?php

include 'connection.php';

//$variantID = $_POST['variantID'];
$itemID = $_POST['itemID'];
$color = $_POST['color'];
$size = $_POST['size'];
$vote = $_POST['vote'];
$username = $_POST['username'];


$variantID = getVariantID($itemID, $color, $size);

//echo $variantID;

if (!empty($variantID)) {
    $query = "INSERT INTO `analyticsItem`(`itemID`,`variantID`, `vote`, `analyticsDate`, `analyticsBy`) VALUES ('$itemID','$variantID', '$vote', NOW(), '$username')";
    $result = mysqli_query($dbc, $query);

    if ($result === TRUE) {
        echo json_encode(array(
            "success" => true,
            "message" => "Data berhasil di simpan"
        ));
    } else {
        echo json_encode(array(
            "success" => false,
            "message" => "Gagal"
        ));
    }
}



function getVariantID($itemID, $color, $size)
{
    include 'connection.php';    
    $querys = "SELECT `variantID` FROM `variantItem` WHERE `itemID`='$itemID' AND `color`='$color' AND size='$size'";
    $result = mysqli_query($dbc, $querys) or die("Unable to verify user because : " . mysqli_error($dbc));
    $rows = mysqli_fetch_assoc($result);
    if (!empty($rows)) {
        return $rows['variantID'];
    }
}
