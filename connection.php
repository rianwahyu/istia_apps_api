<?php

date_default_timezone_set('Asia/Jakarta');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$dbc = mysqli_connect('localhost', 'u1687666_root', '8umx9E5#RyNepdda', 'u1687666_istia_apps') 
OR die('Cannot Conect to database because '.mysqli_connect_error());

?>