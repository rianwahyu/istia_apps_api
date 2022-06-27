<?php

include 'connection.php';


$itemID = $_POST['itemID'];

$query = "SELECT a.variantID, a.itemID, b.itemName as merek, a.color, a.size, a.price 
FROM 
variantItem a 
INNER JOIN masterItem b ON a.itemID=b.itemID
WHERE a.itemID='$itemID'";
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
        "message" => "Belum ada data, tambahkan data"
    ));
}