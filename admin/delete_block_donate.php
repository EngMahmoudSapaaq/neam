<?php

session_start();
if(!(isset($_SESSION['password']))){
	header('Location:../login.php');
}

$id = $_SESSION['id'];

include('../connect.php');  

$donate_id = isset($_GET['donate_id']) && is_numeric($_GET['donate_id']) ? intval($_GET['donate_id']) : 0;
$donor_id = isset($_GET['donor_id']) && is_numeric($_GET['donor_id']) ? intval($_GET['donor_id']) : 0;


$stmt = $con->prepare("DELETE FROM donates WHERE id = :id");

$stmt->bindParam(":id" , $donate_id);

$stmt->execute();


$stmt12 = $con->prepare("UPDATE donors SET  status = ? WHERE id = ?");
$stmt12->execute(array(2 , $donor_id));


header('location:reports.php?edit=4');