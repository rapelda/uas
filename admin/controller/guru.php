<?php
$con->auth();
$conn=$con->koneksi();
switch (@$_GET['page']){
    case 'add':
        $jabatan="select * from jabatan";
        $jabatan=$conn->query($jabatan);
        $content="views/guru/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['namaguru'])){
                $err['namaguru']="Nama Guru Wajib";
            }
            if(empty($_POST['nip'])){
                $err['nip']="NIP Wajib diisi";
            }
            if(!is_numeric($_POST['idjabatan'])){
                $err['idjabatan']="Jabatan Wajib Terisi";
            }
            if(!empty($_FILES['photos']['name'])){
            $target_dir = "../media/";
            $photos=basename($_FILES["photos"]["name"]);
            $target_file = $target_dir . $photos;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["photos"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["photos"]["size"] > 500000000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
            if (move_uploaded_file($_FILES["photos"]["tmp_name"], $target_file)) {
                //echo "The file ". htmlspecialchars( basename( $_FILES["photos"]["name"])). " has been uploaded.";
                $_POST['photos']=$photos;
                //if(isset($_POST['photos_old']) && $_POST['photos_old']!=''){
                //    unlink($target_dir.$_POST['photos_old']);
                //}else{
                //    echo "Succses";
                //}
            } else {
                //echo "Sorry, there was an error uploading your file.";
                $err["photos"]="Sorry";
            }
            }
            }
            if(!isset($err)){
                $idguru=$_SESSION['login']['id'];
                if(!empty($_POST['idguru'])){
                    //update
                    if (isset($_POST['photos'])){
                        $sql="UPDATE guru SET nip='$_POST[nip]',namaguru='$_POST[namaguru]', idjabatan='$_POST[idjabatan]',mp='$_POST[mp]',
                    email='$_POST[email]',photos='$_POST[photos]' WHERE idguru='$_POST[idguru]'";
                    }else{
                    $sql="UPDATE guru SET nip='$_POST[nip]',namaguru='$_POST[namaguru]', idjabatan='$_POST[idjabatan]',mp='$_POST[mp]',
                    email='$_POST[email]' WHERE idguru='$_POST[idguru]'";
                }
            }
                else{
                    //save
                    if(isset($_POST['photos'])){
                    $sql = "INSERT INTO guru (namaguru,nip,idjabatan,mp,email,photos) 
                    VALUES ('$_POST[namaguru]','$_POST[nip]','$_POST[idjabatan]','$_POST[mp]','$_POST[email]','$_POST[photos]')";
                    }else{
                    $sql = "INSERT INTO guru (namaguru,nip,idjabatan,mp,email) 
                    VALUES ('$_POST[namaguru]','$_POST[nip]','$_POST[idjabatan]','$_POST[mp]','$_POST[email]')";
                    }
                    
            }
            if ($conn->query($sql) === TRUE) {
                header('Location:http://localhost/guru/admin/index.php?mod=guru');
            } else {
                $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        }else{
            $err['msg']="tidak diijinkan";
        }
        if(isset($err)){
            $jabatan="select * from jabatan";
            $jabatan=$conn->query($jabatan);
            $content="views/guru/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $guru="select * from guru where idguru='$_GET[id]'";
        $guru=$conn->query($guru);
        $_POST=$guru->fetch_assoc();
        $_POST['idjabatan']=$_POST['idjabatan'];
        $_POST['idguru']=$_POST['idguru'];
        //var_dump($guru);
        $jabatan="select * from jabatan";
        $jabatan=$conn->query($jabatan);
        $content="views/guru/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete';
        $guru ="delete from guru where idguru='$_GET[id]'";
        $guru=$conn->query($guru);
        header('Location: '.$con->site_url().'/admin/index.php?mod=guru');
    break;
    default:
        $sql="SELECT*FROM guru INNER JOIN jabatan ON guru.idjabatan=jabatan.idjabatan";
        $guru=$conn->query($sql);
        $conn->close();
        $content="views/guru/tampil.php";
        include_once 'views/template.php';
}
?>
