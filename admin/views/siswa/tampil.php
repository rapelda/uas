<div class="row">
    <div class="pull-left">
        <h4>Daftar siswa</h4>
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
                <td>NIs</td>
                <th>Jurusan</th>
                <th>Email</th>
                <td>no hp</td>
            </tr>
        </thead>
        <tbody>
            <?php if($siswa != NULL){  
                $no=1;
                foreach($siswa as $row){?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$row['namasiswa']?></td>
                        <td><?=$row['nis'];?></td>
                        <td><?=$row['namajurusan']?></td>
                        <td><?=$row['email']?></td>     
                        <td><?=$row['nohp']?></td>                      
                        <td>
                            <a href="index.php?mod=guru&page=edit&id=<?=$row['idsiswa']?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=guru&page=delete&id=<?=$row['idsiswa']?>"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>