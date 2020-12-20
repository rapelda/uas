<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=guru&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Nama Guru</label>
            <input type="text" name="namaguru" required value="<?=(isset($_POST['namaguru']))?$_POST['namaguru']:'';?>" class="form-control">
            <input type="hidden" name="idguru"  value="<?=(isset($_POST['idguru']))?$_POST['idguru']:'';?>" class="form-control">
            <input type="hidden" name="photos_old"  value="<?=(isset($_POST['photos']))?$_POST['photos']:'';?>">
            <span class="text-danger"><?=(isset($err['namaguru']))?$err['namaguru']:'';?></span>
        </div>
        <div class="form-group">
        <label for="">NIP</label>
            <input type="text" name="nip" value="<?=(isset($_POST['nip']))?$_POST['nip']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['nip']))?$err['nip']:'';?></span>
        </div>
        <div class="form-group">
        <label for="">Mata Pelajaran</label>
            <input type="text" name="mp" value="<?=(isset($_POST['mp']))?$_POST['mp']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['mp']))?$err['mp']:'';?></span>
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
            <label for="">Jabatan</label>
            <select name="idjabatan" class="form-control" required id="" >
            <option value="">Pilih Jabatan</option>
                <?php if($jabatan != NULL){
                    foreach($jabatan as $row){?>
                        <option <?=(isset($_POST['idjabatan']) && $_POST['idjabatan']==$row['idjabatan'] )?"selected":'';?> value="<?=$row['idjabatan'];?>"> <?=$row['namajabatan'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($err['idjabatan']))?$err['idjabatan']:'';?></span>
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