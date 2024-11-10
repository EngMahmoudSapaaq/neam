<?php

session_start();
if(!(isset($_SESSION['password']))){
	header('Location:../login.php');
}

$id = $_SESSION['id'];

include('../connect.php');  

if(isset($_GET['test']) && $_GET['test'] == 1){

    $donor_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

    $stmt = $con->prepare("UPDATE donors SET  status = ? WHERE id = ?");
    $stmt->execute(array(1 , $donor_id));


    header('location:index.php?edit=3');
    
}elseif(isset($_GET['test']) && $_GET['test'] == 2){
    
    
    $donor_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

    $stmt = $con->prepare("UPDATE donors SET  status = ? WHERE id = ?");
    $stmt->execute(array(1 , $donor_id));


    header('location:reports.php?edit=3');
    
    
}