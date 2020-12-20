<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=guru&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Nama siswa</label>
            <input type="text" name="namasiswa" required value="<?=(isset($_POST['namasiswa']))?$_POST['namasiswa']:'';?>" class="form-control">
            <input type="hidden" name="idsiswa"  value="<?=(isset($_POST['idsiswa']))?$_POST['idsiswa']:'';?>" class="form-control">
            <input type="hidden" name="photos_old"  value="<?=(isset($_POST['photos']))?$_POST['photos']:'';?>">
            <span class="text-danger"><?=(isset($err['namasiswa']))?$err['namasiswa']:'';?></span>
        </div>
        <div class="form-group">
        <label for="">NIs</label>
            <input type="text" name="nis" value="<?=(isset($_POST['nis']))?$_POST['nip']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['nip']))?$err['nis']:'';?></span>
        </div>
    <div class="col-md-6">
    <div class="form-group">
            <label for="">Jurusan</label>
            <select name="idjurusan" class="form-control" required id="" >
            <option value="">Pilih Jurusan</option>
                <?php if($jurusan != NULL){
                    foreach($jurusan as $row){?>
                        <option <?=(isset($_POST['idjurusan']) && $_POST['idjurusan']==$row['idjurusan'] )?"selected":'';?> value="<?=$row['idjurusan'];?>"> <?=$row['namajurusan'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($err['idjurusan']))?$err['idjurusan']:'';?></span>
    </div>
    <div class="form-group">
        <label for="">Email</label>
            <input type="text" name="email" value="<?=(isset($_POST['email']))?$_POST['email']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['email']))?$err['email']:'';?></span>
        </div>
    </div>
    <div class="form-group">
        Pilih file:
        <img src="../media/<?=$_POST['photos']?>" width="100">
        <input type="file" name="photos" id="photos" value="Upload Image">
        <span class="text-danger"><?=(isset($err['photos']))?$err['photos']:'';?></span>
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </div>
</form>