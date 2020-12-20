<div class="row">
    <div class="pull-left">
        <h4>Daftar jurusn</h4>
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
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>