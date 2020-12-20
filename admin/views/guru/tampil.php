<div class="row">
    <div class="pull-left">
        <h4>Daftar Guru</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=guru&page=add">
            <button class="btn btn-primary">Add</button>
        </a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <td>
                    No.
                </td>
                <td>Nama</td>
                <td>NIP</td>
                <td>Guru MP</td>
                <th>Jabatan</th>
                <th>Email</th>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($guru != NULL){  
                $no=1;
                foreach($guru as $row){?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$row['namaguru']?></td>
                        <td><?=$row['nip'];?></td>
                        <td><?=$row['mp']?></td>
                        <td><?=$row['namajabatan']?></td>
                        <td><?=$row['email']?></td>                        
                        <td>
                            <a href="index.php?mod=guru&page=edit&id=<?=$row['idguru']?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=guru&page=delete&id=<?=$row['idguru']?>"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>