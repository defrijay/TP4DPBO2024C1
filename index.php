<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();

if (isset($_POST['add'])) {
    //lengkapi
    header("location:index.php");
} else if (!empty($_GET['id_hapus'])) {
    //lengkapi
    $id = $_GET['id_hapus'];
    header("location:index.php");
} else if (!empty($_GET['id_edit'])) {
    //lengkapi
    $id = $_GET['id_edit'];
    header("location:index.php");
} else{
    $members->index();
}
