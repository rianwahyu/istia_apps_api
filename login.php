<?php

include 'connection.php';


class usr
{
}

$username = $_POST["username"];
$password = $_POST["password"];

if ((empty($username)) || (empty($password))) {
    $response = new usr();
    $response->success = false;
    $response->message = "Kolom tidak boleh kosong";
    die(json_encode($response));
}

$sql = "SELECT * FROM users WHERE username='$username' AND password ='$password'";
$query = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($query);

if (!empty($row)) {
    if ($row["password"] == $password) {

        $response = new usr();
        $response->success = true;
        $response->message = "Selamat datang " . $row['username'];
        $response->userID = $row['userID'];
        $response->username = $row['username'];
        $response->fullname = $row['fullname'];
        $response->role = $row['role'];
        die(json_encode($response));
    } else {
        $response = new usr();
        $response->success = false;
        $response->message = "Mohon maaf, periksa kembali password anda ";
        die(json_encode($response));
    }
} else {
    $response = new usr();
    $response->success = 0;
    $response->message = "Username belum terdaftar / Tidak ada akses login kasir";
    die(json_encode($response));
}

mysqli_close($con);
