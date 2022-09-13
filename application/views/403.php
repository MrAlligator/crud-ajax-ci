    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/default-image/title.png') ?>" />

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/auth/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/auth/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Begin Page Content -->
            <div class="container-fluid mt-5">

                <!-- 404 Error Text -->
                <div class="text-center mt-5">
                    <div class="error mx-auto" data-text="403">403</div>
                    <p class="lead text-gray-800 mb-5">Directory Access Is Forbidden</p>
                    <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                    <a href="javascript:window.history.go(-1);">&larr; Back to previous page</a> Or <a href="<?= base_url('auth/logout') ?>">Login Now</a>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets/auth/') ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('assets/auth/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('assets/auth/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('assets/auth/') ?>js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url('assets/auth/') ?>vendor/chart.js/Chart.min.js"></script>
        <script src="<?= base_url('assets/auth/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('assets/auth/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url('assets/auth/') ?>js/demo/chart-area-demo.js"></script>
        <script src="<?= base_url('assets/auth/') ?>js/demo/chart-pie-demo.js"></script>
        <script src="<?= base_url('assets/auth/') ?>js/demo/chart-bar-demo.js"></script>
        <script src="<?= base_url('assets/auth/') ?>js/demo/datatables-demo.js"></script>
        <!-- Tambahan -->

        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 3000);
        </script>

    </body>

    </html>