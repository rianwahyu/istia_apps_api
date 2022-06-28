<?php

include 'connection.php';

$query = "SELECT * FROM (
    SELECT c.itemID, a.variantID, c.itemName, b.color, b.size, SUM(a.vote) as vote, SUM(IF(a.vote=3, 1, 0)) as totalLaris
    FROM analyticsItem a 
    INNER JOIN variantItem b ON a.variantID=b.variantID
    INNER JOIN masterItem c ON b.itemID=c.itemID
    WHERE 1 GROUP BY c.itemName, b.color, b.size ) a 
    ORDER BY vote DESC 
    ";
$result = mysqli_query($dbc, $query);

if (mysqli_num_rows($result) >= 1) {
    while ($data = mysqli_fetch_assoc($result)) {
        $myArray[] = $data;
    }
    echo json_encode(array(
        "success" => true,
        "message" => "Sukses",
        "data" => $myArray
    ));
} else {
    echo json_encode(array(
        "success" => false,
        "message" => "Tidak ada data"
    ));
}

//echo $query;
