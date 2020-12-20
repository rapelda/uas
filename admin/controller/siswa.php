<?php
$con->auth();
$conn=$con->koneksi();
switch (@$_GET['page']){
    case 'add':
        $jurusan="select * from jurusan";
        $jurusan=$conn->query($jurusan);
        $content="views/siswa/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['namasiswa'])){
                $err['namasiswa']="Nama siswa Wajib";
            }
            if(empty($_POST['nis'])){
                $err['nip']="NIS Wajib diisi";
            }
            if(!is_numeric($_POST['idjurusan'])){
                $err['idjurusan']="jurusan Wajib Terisi";
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
                $idsiswa=$_SESSION['login']['id'];
                if(!empty($_POST['idsiswa'])){
                    //update
                    if (isset($_POST['photos'])){
                        $sql="UPDATE siswa SET nis='$_POST[nip]',namasiswa='$_POST[namasiswa]', idurusan='$_POST[idjurusan]',mp='$_POST[mp]',
                    email='$_POST[email]',photos='$_POST[photos]' WHERE idsiswa='$_POST[idsiswa]'";
                    }else{
                    $sql="UPDATE siswa SET nis='$_POST[nis]',namasiswa='$_POST[namasiswa]', idjurusan='$_POST[idjurusan]',mp='$_POST[mp]',
                    email='$_POST[email]' WHERE idsiswa='$_POST[idsiswa]'";
                }
            }
                else{
                    //save
                    if(isset($_POST['photos'])){
                    $sql = "INSERT INTO siswa (namasiswa,nis,idjurusan,mp,email,photos) 
                    VALUES ('$_POST[namasiswa]','$_POST[nis]','$_POST[idjurusan]','$_POST[mp]','$_POST[email]','$_POST[photos]')";
                    }else{
                    $sql = "INSERT INTO siswa(namasiswa,nis,idjurusan,mp,email) 
                    VALUES ('$_POST[namasiswa]','$_POST[nip]','$_POST[idjurusan]','$_POST[mp]','$_POST[email]')";
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
            $jurusan="select * from jurusan";
            $jursan=$conn->query($jurusan);
            $content="views/guru/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $siswa="select * from siswa where idsiswa='$_GET[id]'";
        $siswa=$conn->query($siswa);
        $_POST=$siswa->fetch_assoc();
        $_POST['idjurusan']=$_POST['idjurusan'];
        $_POST['idsiswa']=$_POST['idsiswa'];
        //var_dump($guru);
        $jurusan="select * from jurusan";
        $jurusan=$conn->query($jurusan);
        $content="views/siswa/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete';
        $siswa ="delete from siswa where idsiswa='$_GET[id]'";
        $siswa=$conn->query($siswa);
        header('Location: '.$con->site_url().'/admin/index.php?mod=siswa');
    break;
    default:
        $sql="SELECT*FROM siswa INNER JOIN jurusan ON siswa.idjurusan=jurusan.idjurusan";
        $siswa=$conn->query($sql);
        $conn->close();
        $content="views/siswa/tampil.php";
        include_once 'views/template.php';
}
?>
