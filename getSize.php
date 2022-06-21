<?php 

include 'connection.php';

$itemID = $_POST['itemID'];
$color = $_POST['color'];

$query = "SELECT DISTINCT(size) FROM variantItem WHERE itemID='$itemID' AND color='$color'";
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