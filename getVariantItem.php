<?php

include 'connection.php';


$itemID = $_POST['itemID'];

$query = "SELECT a.variantID, a.itemID, b.itemName, a.color, a.size, a.price 
FROM 
variantItem a 
INNER JOIN masterItem b ON a.itemID=b.itemID
WHERE a.itemID='210001'";
$result = mysqli_query($dbc, $query);
if(mysqli_num_rows($result) >=1){
    while($data = mysqli_fetch_assoc($result)){
        $myArray[] = $data;
    }
    echo json_encode(array(
        "success" => true,
        "message" => "Sukses",
        "data" => $myArray
    ));
}else{
    echo json_encode(array(
        "success" => false,
        "message" => "Tidak ada data"
    ));
}