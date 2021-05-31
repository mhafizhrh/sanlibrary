<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $judul?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>data_transaksi"><i class="fa fa-list"></i> Data Transaksi</a></li>
            <li class="active">
                <a href="<?php echo base_url();?>data_transaksi/peminjaman">
                    <?php echo $judul?>
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
                        <?php echo $this->session->flashdata('message'); ?>
                        <form method="post">
                            <div class="form-group">
                                <label class="control-label">ID Peminjaman</label>
                                <input type="text" name="id_peminjaman" class="form-control" value="PB<?php echo sprintf("%04d", $id_peminjaman)?>" readonly>
                            </div>
                            <div class="form-group <?php echo form_error('id_siswa') ? 'has-error' : null?>">
                                <label class="control-label">Nama Siswa</label>
                                <select class="form-control" name="id_siswa" id="select1" style="width: 100%;">
                                    <option value="">Pilih Nama Siswa</option>
                                    <?php $i = 1; ?>
                                    <?php foreach ($siswa as $data) { ?>
                                    <option value="<?php echo $data->id_siswa; ?>" <?php echo set_value('id_siswa') == $data->id_siswa ? 'selected' : null?>>(<?php echo $data->nis; ?>) <?php echo $data->nama_siswa; ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('id_siswa')?>
                            </div>
                            <div class="form-group <?php echo form_error('id_buku') ? 'has-error' : null?>">
                                <label class="control-label">Judul Buku</label>
                                <select class="form-control" name="id_buku" id="select2" style="width: 100%;">
                                    <option value="">Pilih Judul buku</option>
                                    <?php $i = 1; ?>
                                    <?php foreach ($buku as $data) { ?>
                                    <option value="<?php echo $data->id_buku; ?>" <?php echo set_value('id_buku') == $data->id_buku ? 'selected' : null?>><?php echo $data->judul; ?> [Stok : <?php echo $data->jumlah; ?>]</option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('id_buku')?>
                            </div>
                            <div class="form-group  <?php echo form_error('jumlah') ? 'has-error' : null?>">
                                <label class="control-label">Jumlah Pinjam</label>
                                <input type="number" name="jumlah" class="form-control" value="<?php echo set_value('jumlah') ?>">
                                <?php echo form_error('jumlah'); ?>
                            </div>
                            <div class="form-group <?php echo form_error('pengarang') ? 'has-error' : null?>">
                                <label class="control-label">Tanggal Pinjam</label>
                                <div class="control-label">
                                    <?php echo date('d-m-Y'); ?>
                                </div>
                                <?php echo form_error('pengarang')?>
                            </div>
                            <div class="form-group <?php echo form_error('penerbit') ? 'has-error' : null?>">
                                <label class="control-label">Tanggal Kembali</label>
                                <div class="control-label">
                                    <?php

                                    $tgl_sekarang = date_create(date('Y-m-d'));
                                    date_add($tgl_sekarang, date_interval_create_from_date_string('7 days'));
                                    echo date_format($tgl_sekarang, 'd-m-Y');

                                    ?>
                                </div>
                                <?php echo form_error('penerbit')?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Pinjam</button>
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