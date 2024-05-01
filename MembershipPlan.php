<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/MembershipPlan.controller.php");

$membershipPlan = new MembershipController();

if (isset($_POST['add'])) {
    //lengkapi

    header("location:MembershipPlan.php");
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //lengkapi
    $id = $_GET['id_hapus'];

    header("location:MembershipPlan.php");
}
else if (!empty($_GET['id_edit'])) {
    //lengkapi
    $id = $_GET['id_edit'];
    
    header("location:MembershipPlan.php");
}
else{
    $membershipPlan->index();
}

