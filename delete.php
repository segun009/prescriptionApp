<?php
include 'server.php';
$id = $_POST['id'];
$user_id = $_SESSION['user_id'];
$sql = "DELETE FROM prescription_item WHERE user_id='{$user_id}' AND id='{$id}'";
mysqli_query($db,$sql);
