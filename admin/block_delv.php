<?php

session_start();
if(!(isset($_SESSION['password']))){
	header('Location:../login.php');
}

$id = $_SESSION['id'];

include('../connect.php');  

$delv_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = $con->prepare("UPDATE deliveries SET  status = ? WHERE id = ?");
$stmt->execute(array(2 , $delv_id));


header('location:delivery.php?edit=1');