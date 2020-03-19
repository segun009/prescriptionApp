<?php
include 'server.php';
$id = $_POST['id'];
$user_id = $_SESSION['user_id'];
$used = 'used';
$sql = "UPDATE prescription_item SET status='{$used}' WHERE user_id='{$user_id}' AND id='{$id}'";
mysqli_query($db,$sql);
