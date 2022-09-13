<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Siswa</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/jquery.dataTables.css' ?>">
</head>

<body>
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <h1 class="page-header">Data
                <small>Siswa</small>
                <div class="pull-right"><a href="<?= base_url('auth/logout') ?>" class="btn btn-sm btn-danger"><span class="fa fa-sign-out"></span> Logout</a></div>
                <div class="pull-right"><a href="<?= base_url('siswa/export') ?>" class="btn btn-sm btn-primary"><span class="fa fa-download"></span> Export Excel</a></div>
                <div class="pull-right"><a href="<?= base_url('siswa/export_pdf') ?>" class="btn btn-sm btn-warning"><span class="fa fa-download"></span> Export PDF</a></div>
                <?php if ($_SESSION['level'] == 'Admin') : ?>
                    <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah Siswa</a></div>
                <?php endif; ?>
            </h1>
        </div>
        <div class="row">
            <div id="reload">
                <table class="table table-striped" data-page-length="25" id="mydata">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <?php if ($_SESSION['level'] == 'Admin') : ?>
                                <th style="text-align: right;">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody id="show_data">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <?php if ($_SESSION['level'] == 'Admin') : ?>
                <h6>Halo <?= $user['user_nama'] ?></h6>
            <?php elseif ($_SESSION['level'] == 'Siswa') : ?>
                <h6>Halo <?= $siswa['siswa_nama'] ?></h6>
            <?php endif; ?>
        </div>
        <div class="row">
            <a href="<?= base_url('rest') ?>" class="btn btn-sm btn-primary">Rest API</a>
        </div>
    </div>


    <!-- MODAL ADD -->
    <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Tambah Siswa</h3>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3">NIS</label>
                            <div class="col-xs-9">
                                <input name="nis" id="nis" class="form-control" type="text" placeholder="Nomor Induk Siswa" onkeypress="return hanyaAngka(event)" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama</label>
                            <div class="col-xs-9">
                                <input name="nama" id="nama" class="form-control" type="text" placeholder="Nama" onkeypress="return harusHuruf(event)" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Kelas</label>
                            <div class="col-xs-9">
                                <input name="kelas" id="kelas" class="form-control" type="text" placeholder="Kelas" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Jurusan</label>
                            <div class="col-xs-9">
                                <input name="jurusan" id="jurusan" class="form-control" type="text" placeholder="Jurusan" onkeypress="return harusHuruf(event)" style="width:335px;" required>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info" id="btn_simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END MODAL ADD-->

    <!-- MODAL EDIT -->
    <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Siswa</h3>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3">NIS</label>
                            <div class="col-xs-9">
                                <input name="nis_edit" id="nis_edit" class="form-control" type="text" placeholder="Nomor Induk Siswa" readonly style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama</label>
                            <div class="col-xs-9">
                                <input name="nama_edit" id="nama_edit" class="form-control" type="text" placeholder="Nama" onkeypress="return harusHuruf(event)" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Kelas</label>
                            <div class="col-xs-9">
                                <input name="kelas_edit" id="kelas_edit" class="form-control" type="text" placeholder="Kelas" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Jurusan</label>
                            <div class="col-xs-9">
                                <input name="jurusan_edit" id="jurusan_edit" class="form-control" type="text" placeholder="Jurusan" onkeypress="return harusHuruf(event)" style="width:335px;" required>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info" id="btn_update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END MODAL EDIT-->

    <!--MODAL HAPUS-->
    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">

                        <input type="hidden" name="kode" id="textkode" value="">
                        <div class="alert alert-warning">
                            <p>Apakah Anda yakin mau menghapus data ini?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END MODAL HAPUS-->

    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.dataTables.js' ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            tampil_data_siswa();

            $('#mydata').dataTable();

            function tampil_data_siswa() {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url() ?>siswa/data_siswa',
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + data[i].siswa_nis + '</td>' +
                                '<td>' + data[i].siswa_nama + '</td>' +
                                '<td>' + data[i].siswa_kelas + '</td>' +
                                '<td>' + data[i].siswa_jurusan + '</td>' +
                                '<td style="text-align:right;">' +
                                <?php if ($_SESSION['level'] == 'Admin') : ?> '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].siswa_nis + '">Edit</a>' + ' ' +
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].siswa_nis + '">Hapus</a>' +
                                <?php endif; ?> '</td>' +
                                '</tr>';
                        }
                        $('#show_data').html(html);
                    }

                });
            }

            //GET UPDATE
            $('#show_data').on('click', '.item_edit', function() {
                var id = $(this).attr('data');
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('siswa/get_siswa') ?>",
                    dataType: "JSON",
                    data: {
                        nis: id
                    },
                    success: function(data) {
                        $.each(data, function(siswa_nis, siswa_nama, siswa_kelas, siswa_jurusan) {
                            $('#ModalaEdit').modal('show');
                            $('[name="nis_edit"]').val(data.siswa_nis);
                            $('[name="nama_edit"]').val(data.siswa_nama);
                            $('[name="kelas_edit"]').val(data.siswa_kelas);
                            $('[name="jurusan_edit"]').val(data.siswa_jurusan);
                        });
                    }
                });
                return false;
            });


            //GET HAPUS
            $('#show_data').on('click', '.item_hapus', function() {
                var id = $(this).attr('data');
                $('#ModalHapus').modal('show');
                $('[name="kode"]').val(id);
            });

            //Simpan
            $('#btn_simpan').on('click', function() {
                var nis = $('#nis').val();
                var nama = $('#nama').val();
                var kelas = $('#kelas').val();
                var jur = $('#jurusan').val();
                var pass = $('#nis').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('siswa/simpan') ?>",
                    dataType: "JSON",
                    data: {
                        nis: nis,
                        nama: nama,
                        kelas: kelas,
                        jurusan: jur,
                        password: pass
                    },
                    success: function(data) {
                        $('[name="nis"]').val("");
                        $('[name="nama"]').val("");
                        $('[name="kelas"]').val("");
                        $('[name="jurusan"]').val("");
                        $('#ModalaAdd').modal('hide');
                        tampil_data_siswa();
                    }
                });
                return false;
            });

            //Update
            $('#btn_update').on('click', function() {
                var no = $('#nis_edit').val();
                var nam = $('#nama_edit').val();
                var kela = $('#kelas_edit').val();
                var jur = $('#jurusan_edit').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('siswa/update') ?>",
                    dataType: "JSON",
                    data: {
                        nis: no,
                        nama: nam,
                        kelas: kela,
                        jurusan: jur
                    },
                    success: function(data) {
                        $('[name="nis_edit"]').val("");
                        $('[name="nama_edit"]').val("");
                        $('[name="kelas_edit"]').val("");
                        $('[name="jurusan_edit"]').val("");
                        $('#ModalaEdit').modal('hide');
                        tampil_data_siswa();
                    }
                });
                return false;
            });

            //Hapus
            $('#btn_hapus').on('click', function() {
                var kode = $('#textkode').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('siswa/hapus') ?>",
                    dataType: "JSON",
                    data: {
                        nis: kode
                    },
                    success: function(data) {
                        $('#ModalHapus').modal('hide');
                        tampil_data_siswa();
                    }
                });
                return false;
            });

        });
    </script>
    <script>
        function harusHuruf(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32 && charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>
</body>

</html>