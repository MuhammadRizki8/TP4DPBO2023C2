<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();

if (isset($_POST['add'])) {
    //memanggil add
    $members->add($_POST);
}
// persiapan untuk add
else if (!empty($_GET['code'])) {
    $members->PrepareAdd();
}
else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $members->delete($id);
}
// pindah ke page update
else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $members->PrepareUpdate($id);
}
// proses update
else if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $members->edit($id, $_POST);
}
// tampil 
else{
    $members->index();
}
