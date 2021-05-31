<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$judul?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>master_data"><i class="fa fa-list"></i> Master Data</a></li>
            <li class="active">
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
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Siswa</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post">
                            <div class="form-group <?=form_error('nis') ? 'has-error' : null?>">
                                <label class="control-label">NIS</label>
                                <input type="text" name="nis" class="form-control" value="<?=set_value('nis')?>">
                                <?=form_error('nis')?>
                            </div>
                            <div class="form-group <?=form_error('nama_siswa') ? 'has-error' : null?>">
                                <label class="control-label">Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" value="<?=set_value('nama_siswa')?>">
                                <?=form_error('nama_siswa')?>
                            </div>
                            <div class="form-group <?=form_error('tempat_lahir') ? 'has-error' : null?>">
                                <label class="control-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="<?=set_value('tempat_lahir')?>">
                                <?=form_error('tempat_lahir')?>
                            </div>
                            <div class="form-group <?=form_error('tgl_lahir') ? 'has-error' : null?>">
                                <label class="control-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="<?=set_value('tgl_lahir')?>">
                                <?=form_error('tgl_lahir')?>
                            </div>
                            <div class="form-group <?=form_error('jk') ? 'has-error' : null?>">
                                <label class="control-label">Jenis Kelamin</label>
                                <select class="form-control" name="jk">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="1"> <?=set_value( 'jk')=='Laki-Laki' ? 'selected' : null?>>Laki-Laki</option>
                                    <option value="2"> <?=set_value( 'jk')=='Perempuan' ? 'selected' : null?>>Perempuan</option>
                                </select>
                                <?=form_error('jk')?>
                            </div>
                            <div class="form-group <?=form_error('kelas') ? 'has-error' : null?>">
                                <label class="control-label">Kelas</label>
                                <input type="text" name="kelas" class="form-control" value="<?=set_value('kelas')?>">
                                <?=form_error('kelas')?>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                <button type="reset" class="btn btn-danger">Batal</button>
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
                <h3 class="box-title">Tambah Massal Data Siswa</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php echo $this->session->flashdata('message'); ?>
                        <form method="post" action="<?php echo base_url(); ?>master_data/uploadExcel" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="alert bg-gray">
                                    <h3><b>INFORMASI PENTING!</b></h3>
                                    <p>FORMAT DATA EXCEL HARUS SESUAI ATURAN :</p>
                                    <ul>
                                        <li>Kolom A : NIS</li>
                                        <li>Kolom B : NAMA SISWA</li>
                                        <li>Kolom C : TEMPAT LAHIR</li>
                                        <li>Kolom D : TANGGAL LAHIR</li>
                                        <li>Kolom E : JENIS KELAMIN (1 : Laki-laki, 0: Perempuan</li>
                                        <li>Kolom F : KELAS</li>
                                        <li>Data dimulai dari baris ke-2</li>
                                    </ul>
                                    <p>
                                        Contoh Format yang benar : <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#example-excel-format">Klik</button>
                                    </p>
                                    <div class="modal fade" id="example-excel-format" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                  <img src="<?php echo base_url(); ?>images/example-excel-format.png" width="100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">File Excel</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                                <button type="reset" class="btn btn-danger">Batal</button>
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