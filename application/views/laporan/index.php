<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$judul?>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-envelope"></i>
                <a href="<?=base_url();?>laporan">
                    <?=$judul?>
                </a>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Laporan Peminjaman</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        
                        <form method="post" target="_blank" action="<?=base_url();?>laporan/cetak_peminjaman">
                            <div class="form-group">
                                <label>Periode</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="date" name="date1" class="form-control" value="<?php echo date('Y-m-d') ?>" required="">
                                    </div>
                                    <div class="col-md-2 text-center">
                                        s.d
                                    </div>
                                    <div class="col-md-5">
                                        <input type="date" name="date2" class="form-control" value="<?php echo date('Y-m-d') ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Laporan Buku</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" target="_blank" action="<?=base_url();?>laporan/cetak_buku">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori"  id="select1">
                                    <option value="all" selected="">Semua</option>
                                    <?php foreach ($kategori as $data) { ?>
                                        
                                <option value="<?php echo $data->id_kategori;?>"><?php echo $data->kategori;?></option>

                                <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Laporan Siswa</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" target="_blank" action="<?=base_url();?>laporan/cetak_siswa">
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" name="kelas"  id="select2">
                                    <option value="all" selected="">Semua</option>
                                    <?php foreach ($kelas as $data) { ?>
                                        
                                <option value="<?php echo $data->kelas;?>"><?php echo $data->kelas;?></option>

                                <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->