<?php

session_start();
if(!(isset($_SESSION['password']))){
	header('Location:../login.php');
}

$id = $_SESSION['id'];

include('../connect.php');  

$section_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = $con->prepare("DELETE FROM sections WHERE id = :id");

$stmt->bindParam(":id" , $section_id);

$stmt->execute();


header('location:sections.php?edit=1');