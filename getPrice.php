<?php 

include 'connection.php';

$itemID = $_POST['itemID'];
$color = $_POST['color'];
$size = $_POST['size'];

$query = "SELECT DISTINCT(price) FROM variantItem WHERE itemID='$itemID' AND color='$color' AND size='$size'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);

if (!empty($row)) {
    echo json_encode(array(
        "success" => true,
        "message" => "Sukses",
        "price" => $row['price']
    ));
}else{
    echo json_encode(array(
        "success" => false,
        "message" => "Gagal"        
    ));
}
