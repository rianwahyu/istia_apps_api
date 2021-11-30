<?php 

include 'connection.php';

$itemID = $_POST['itemID'];

$query = "SELECT DISTINCT(color) FROM variantItem WHERE itemID='$itemID' ";
$result = mysqli_query($dbc, $query);
if(mysqli_num_rows($result) >=1){
    while($data = mysqli_fetch_array($result)){
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