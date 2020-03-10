<?php
include 'include/config.php';

$code = $_POST["code"];
echo $code;
$sql = "SELECT * FROM wine.product";
$result = $conn->query($sql);
?>