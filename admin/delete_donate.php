<?php

session_start();
if(!(isset($_SESSION['password']))){
	header('Location:../login.php');
}

$id = $_SESSION['id'];

include('../connect.php');  

$donate_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = $con->prepare("DELETE FROM donates WHERE id = :id");

$stmt->bindParam(":id" , $donate_id);

$stmt->execute();


header('location:reports.php?edit=1');