<?php 
session_start();
include_once '../config/Config.php';
$con = new Config();
if($con->auth()){
    //panggil fungsi
    switch (@$_GET['mod']){
        case 'guru':
        include_once 'controller/guru.php';
        break;
        case 'data':
        include_once 'views/guru/jabatan.php';
        break;
        default:
        include_once 'controller/login.php';
        case 'siswa':
            include_once 'controller/siswa.php';
            break;
            case 'data':
            include_once 'views/guru/jurusan.php';
            break;
    }
}else{
    //panggil cont login
    include_once 'controller/login.php';
}
?>