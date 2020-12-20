<?php
if(isset($_POST['email'])){
    //action
    $conn=$con->koneksi();
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql = "SELECT * FROM login where email ='$email' and password ='$password'";
    $user = $conn->query($sql);
    if($user->num_rows>0){
        $sess=$user->fetch_array();
        $_SESSION['login']['email']=$sess['email'];
        $_SESSION['login']['id']=$sess['id'];
        header('Location: http://localhost/guru/admin/index.php?mod=guru');
    }else{
        $msg="Email dan Password tidak cocok";
        include_once 'views/v_login.php';
    }
}else{
    include_once 'views/v_login.php';
}
?>