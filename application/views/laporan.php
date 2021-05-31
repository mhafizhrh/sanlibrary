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
                <a href="<?=base_url();?>master_data/data_siswa">
                    <?=$judul?>
                </a>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <!-- <div class="box-header with-border">
                <h3 class="box-title">Terlambat Pengembalian</h3>
            </div> -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        
                        <form method="post" action="<?=base_url();?>/laporan/cetak">
                            <div class="form-group">
                                <label>Periode</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="date" name="date1" class="form-control">
                                    </div>
                                    <div class="col-md-2 text-center">
                                        s.d
                                    </div>
                                    <div class="col-md-5">
                                        <input type="date" name="date2" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Laporan</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="form-control" name="laporan">
                                            <option>Peminjaman</option>
                                            <option>Buku</option>
                                            <option>Siswa</option>
                                        </select>
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

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->