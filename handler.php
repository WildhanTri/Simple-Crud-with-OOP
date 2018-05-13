<?php
function loadControllers($class){
    $file = "controllers/".$class.".php";
    if(is_readable($file)){
        require $file;
    }
}
spl_autoload_register("loadControllers");
$c = new controller();

define("url","http://localhost/crudbaseoop/");


if(isset($_POST['tambahdata'])){
    $data = array (
        "nisn" => $_POST['nisn'],
        "nama" => $_POST['nama'],
        "kelas" => $_POST['kelas'],
        "alamat" => $_POST['alamat']
    );
    $c->prosesTambahData($data = (object) $data);
}
if(isset($_POST['editdata'])){
    $data = array (
        "nisn" => $_POST['nisn'],
        "nama" => $_POST['nama'],
        "kelas" => $_POST['kelas'],
        "alamat" => $_POST['alamat']
    );
    $c->prosesUpdateData($data = (object) $data);
}
if(isset($_POST['sortBy'])){
    $data = array (
        "sortBy" => $_POST['sortBy'],
        "sortType" => $_POST['sortType']
    );
    $c->prosesSortData($data = (object) $data);
}
if(isset($_GET['deletedata'])){
    $data = array (
        "nisn" => $_GET['deletedata']
    );
    $c->prosesDeleteData($data = (object) $data);
}

?>