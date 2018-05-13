<?php

if(!isset($_GET['page'])){
    header("location:http://localhost/crudbaseoop/index.php?page=read");
}
require "handler.php";


?>

    <html>

    <head>
        <title>Simple-BaseCRUD with OOP</title>

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <script src="assets/js/jquery-3.3.1.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </head>
    <style>
        .container {
            padding-top: 50px;
        }

    </style>

    <body>
        <?php if($_GET['page'] == "read") : ?>
        <div class="container">
            <h1>Simple Crud - Read</h1>
            <a href="<?php echo url.'index.php?page=create' ?>">
                <button class="btn btn-info"><i class="fa fa-plus"></i> &nbsp; Add</button>
            </a>
            <table class="table" id="data">
                <tr>
                    <th onclick="prosesSortSiswa('nisn', 'DESC', this)" id="sortByNISN">No</th>
                    <th onclick="prosesSortSiswa('nama', 'DESC', this)" id="sortByNama">Nama Siswa</th>
                    <th onclick="prosesSortSiswa('kelas', 'DESC', this)" id="sortByKelas">Kelas</th>
                    <th onclick="prosesSortSiswa('alamat', 'DESC', this)" id="sortByAlamat">Alamat</th>
                    <th></th>
                </tr>
                <?php if($c->tampilData() != null) : ?>
                <?php foreach($c->tampilData() as $s) : ?>
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
            </table>
        </div>
        <script>
            function prosesSortSiswa(sortBy, sortType, column) {

                $.ajax({
                    type: 'POST',
                    url: 'handler.php',
                    data: {
                        "sortBy": sortBy,
                        "sortType": sortType
                    },
                    success: function(response) {
                        $(".rowdata").remove();
                        $("#data").append(response);
                        console.log(response);
                    }
                });
                if (sortType == "ASC") {
                    $(column).attr("onclick", "prosesSortSiswa('" + sortBy + "', 'DESC', this)");
                } else {
                    $(column).attr("onclick", "prosesSortSiswa('" + sortBy + "', 'ASC', this)");
                }

            }

        </script>
        <?php elseif($_GET['page'] == "create") : ?>
        <div class="container">
            <h1>Simple Crud - Create</h1>
            <form action="" method="post">
                <table class="table">
                    <tr>
                        <td>NISN</td>
                        <td colspan="2"><input type="text" class="form-control" placeholder="NISN" name="nisn" maxlength="15"></td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td colspan="2"><input type="text" class="form-control" placeholder="Nama" name="nama" maxlength="50"></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td colspan="2">
                            <input type="text" class="form-control" placeholder="Kelas" name="kelas" maxlength="15">
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td colspan="2"><input type="text" class="form-control" placeholder="Alamat" name="alamat" maxlength="50"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn btn-success" style="width:100%" name="tambahdata"> <i class="fa fa-save "></i>&nbsp;Simpan</button></td>
                        <td><a href="<?php echo url.'index.php?page=read' ?>"><button type="button" class="btn btn-danger" style="width:100%">  <i class="fa fa-times-circle "></i>&nbsp;Batal</button></a></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php elseif($_GET['page'] == "update") : ?>
        <div class="container">
            <h1>Simple Crud - Update</h1>
            <?php foreach($c->tampilDataSpesifik($_GET['nisn']) as $s) : ?>
            <form action="" method="post">
                <table class="table">
                    <tr>
                        <td>NISN</td>
                        <td colspan="2"><input type="text" class="form-control" placeholder="NISN" name="nisn" value="<?php echo $s->nisn ?>" maxlength="15" readonly></td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td colspan="2"><input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $s->nama ?>" maxlength="50"></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td colspan="2">
                            <input type="text" class="form-control" placeholder="Kelas" name="kelas" value="<?php echo $s->kelas ?>" maxlength="15">
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td colspan="2"><input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $s->alamat ?>" maxlength="50"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn btn-success" style="width:100%" name="editdata"><i class="fa fa-save "></i>&nbsp;Simpan</button></td>
                        <td><a href="<?php echo url.'index.php?page=read' ?>"><button type="button" class="btn btn-danger" style="width:100%"><i class="fa fa-times-circle "></i>&nbsp;Batal</button></a></td>
                    </tr>
                </table>
            </form>
            <?php endforeach ?>
        </div>
        <?php endif ?>
    </body>

    </html>
