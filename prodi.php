<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Prodi.controller.php");

$Prodi = new ProdiController();

if (isset($_POST['add'])) {
    $Prodi->add($_POST);
} 
// persiapan untuk add
else if (!empty($_GET['code'])) {
    $Prodi->PrepAdd();
}
else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $Prodi->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $Prodi->PrepUpdate($id);
// proses update
}else if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $Prodi->edit($id, $_POST);
} else{
    $Prodi->index();
}
?>

