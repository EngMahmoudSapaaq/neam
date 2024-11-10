<?php

session_start();
if(!(isset($_SESSION['password']))){
	header('Location:../login.php');
}

$id = $_SESSION['id'];

include('../connect.php');  

$ben_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = $con->prepare("UPDATE beneficiaries SET  status = ? WHERE id = ?");
$stmt->execute(array(2 , $ben_id));


header('location:index.php?edit=2');