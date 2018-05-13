<?php if($data != null) : ?>
<?php foreach($data as $s) : ?>
<tr class="rowdata">
    <td>
        <?php echo $s->nisn ?>
    </td>
    <td>
        <?php echo $s->nama ?>
    </td>
    <td>
        <?php echo $s->kelas ?>
    </td>
    <td>
        <?php echo $s->alamat ?>
    </td>
    <td>
        <div class="row">
            <div class="col-sm-6">
                <a href="<?php echo url .'index.php?page=update&&nisn='.$s->nisn ?>"><button class="btn btn-success" style="width:100%"><i class="fa fa-edit"></i>&nbsp; Edit</button></a>
            </div>
            <div class="col-sm-6">
                <a href="<?php echo url.'index.php?deletedata='.$s->nisn ?>"><button class="btn btn-danger" style="width:100%"> <i class="fa fa-trash-alt "></i>&nbsp; Delete</button></a>
            </div>
        </div>
    </td>
</tr>
<?php endforeach ?>
<?php else : ?>
<tr>
    <td colspan="4" style="text-align:center">Data Kosong.</td>
</tr>
<?php endif ?>
