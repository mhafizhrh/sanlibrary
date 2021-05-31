<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LAPORAN - SAN Library</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/320b01b5e8.css"> -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTable -->
    <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url();?>AdminLTE/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url();?>AdminLTE/dist/css/skins/_all-skins.min.css">
    <!-- Sweet Alert -->
    <script src="<?=base_url()?>AdminLTE/dist/js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>AdminLTE/dist/css/sweetalert.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/select2/dist/css/select2.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css">

th,td {

    padding: 2px 10px 2px 10px;
}

</style>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="text-center">
        <h2>LAPORAN DATA SISWA PERPUSTAKAAN</h2>
        <h3>Tahun <?php echo date('Y'); ?></h3>
    </div>
    <hr>
    <p>Total Buku : <?php echo count($report); ?></p>
    <table class="table table-bordered" style="font-size: 12px">
        <thead>
            <tr>
                <th>No.ISBN</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Jumlah Buku</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($report as $data) { ?>

                <tr>
                    <td>
                        <?php echo $data->no_isbn;?>
                    </td>
                    <td>
                        <?php echo $data->kategori; ?>
                    </td>
                    <td>
                        <?php echo $data->judul; ?>
                    </td>
                    <td>
                        <?php echo $data->pengarang; ?>
                    </td>
                    <td>
                        <?php echo $data->penerbit; ?>
                    </td>
                    <td>
                        <?php echo $data->tahun_terbit; ?>
                    </td>
                    <td>
                        <?php echo $data->jumlah; ?>
                    </td>
                </tr>

            <?php } ?>
    </table>
</body>

</html>