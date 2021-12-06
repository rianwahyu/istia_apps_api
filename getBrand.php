<?php 

include 'connection.php';

$query = "SELECT itemID, itemName, itemDescription FROM masterItem WHERE 1";
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
