<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Payments.controller.php");

$payments = new PaymentsController();

if (isset($_POST['add'])) {
    //lengkapi

    header("location:Payments.php");
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //lengkapi
    $id = $_GET['id_hapus'];

    header("location:Payments.php");
}
else if (!empty($_GET['id_edit'])) {
    //lengkapi
    $id = $_GET['id_edit'];
    
    header("location:Payments.php");
}
else{
    $payments->index();
}

