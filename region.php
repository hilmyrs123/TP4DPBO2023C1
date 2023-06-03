<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/region_controller.php");

$region = new RegionController();

//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $team->delete($id);
} else {
    $region->region();
}
