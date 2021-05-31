Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$judul?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?><?=$judul?>"><i class="fa fa-home"></i> <?=$judul?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa fa-handshake-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Administrator</span>
                        <span class="info-box-number"><?=$jumlah_admin?> Admin</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-purple"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Siswa</span>
                        <span class="info-box-number"><?=$total_siswa?> Siswa</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-teal"><i class="fa fa-book"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Buku</span>
                        <span class="info-box-number"><?=$total_buku?> Buku</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-maroon"><i class="fa fa-list"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Kategori Buku</span>
                        <span class="info-box-number"><?=$total_kategori?> Kategori</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-navy"><i class="fa fa-shopping-basket"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Peminjaman Buku</span>
                        <span class="info-box-number"><?=$peminjaman?> Peminjaman Buku saat ini.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-light-blue"><i class="fa fa-address-book"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Pengembalian Buku</span>
                        <span class="info-box-number"><?=$pengembalian?> Buku Sudah dikembalikan.</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Peminjaman</h3>
            </div>
            <div class="box-body">
                <!-- <div class="chart" id="line-chart" style="height: 300px;"></div> -->
                <div class="chart" id="bar-chart" style="height: 400px;"></div>
                <?php //echo $data_peminjaman['jan']; ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  $(function () {   
    // BAR CHART
    
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: 'Januari <?php echo $data_peminjaman['thn']; ?>', a: <?php echo $data_peminjaman['jan']; ?>},
        {y: 'Februari <?php echo $data_peminjaman['thn']; ?>', a: <?php echo $data_peminjaman['feb']; ?>},
        {y: 'Maret <?php echo $data_peminjaman['thn']; ?>', a: <?php echo $data_peminjaman['mar']; ?>},
        {y: 'April <?php echo $data_peminjaman['thn']; ?>', a: <?php echo $data_peminjaman['apr']; ?>},
        {y: 'Mei <?php echo $data_peminjaman['thn']; ?>', a: <?php echo $data_peminjaman['mei']; ?>},
        {y: 'Juni <?php echo $data_peminjaman['thn']; ?>', a: <?php echo $data_peminjaman['jun']; ?>},
        {y: 'Juli <?php echo $data_peminjaman['thn']; ?>', a: <?php echo $data_peminjaman['jul']; ?>},
        {y: 'Agustus <?php echo $data_peminjaman['thn']; ?>', a: <?php echo $data_peminjaman['agu']; ?>},
        {y: 'September <?php echo $data_peminjaman['thn']; ?>', a: <?php echo $data_peminjaman['sep']; ?>},
        {y: 'Oktober <?php echo $data_peminjaman['thn']; ?>', a: <?php echo $data_peminjaman['okt']; ?>},
        {y: 'November <?php echo $data_peminjaman['thn']; ?>', a: <?php echo $data_peminjaman['nov']; ?>},
        {y: 'Desember <?php echo $data_peminjaman['thn']; ?>', a: <?php echo $data_peminjaman['des']; ?>}
      ],
      barColors: ['#3c8dbc'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Jumlah Peminjaman Buku'],
      hideHover: 'auto'
    })
  })
</script>