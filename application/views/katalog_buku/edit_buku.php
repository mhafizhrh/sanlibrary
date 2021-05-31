<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$judul?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>katalog_buku"><i class="fa fa-list"></i> Katalog Buku</a></li>
            <li><a href="<?=base_url();?>data_buku"><i class="fa fa-book"></i> Data Buku</a></li>
            <li class="active">
                <a href="<?=base_url();?>katalog_buku/edit_buku">
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
                        <?php echo $this->session->flashdata('message'); ?>
                        <form method="post">
                            <div class="form-group <?=form_error('id_buku') ? 'has-error' : null?>">
                                <label class="control-label">ID Buku</label>
                                <input type="text" name="id_buku" class="form-control" placeholder="ID Buku" value="B<?php echo sprintf("%04d", $data_buku[0]->id_buku); ?>" readonly>
                                <?=form_error('id_buku')?>
                            </div>
                            <div class="form-group <?=form_error('judul') ? 'has-error' : null?>">
                                <label class="control-label">Judul</label>
                                <input type="text" name="judul" class="form-control" placeholder="Judul Buku" value="<?=$data_buku[0]->judul?>">
                                <?=form_error('judul')?>
                            </div>
                            <div class="form-group <?=form_error('kategori') ? 'has-error' : null?>">
                                <label class="control-label">Kategori</label>
                                <select class="form-control" name="kategori" id="select2" style="width: 100%;">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($data_kategori as $data) { ?>
                                    <option value="<?php echo $data->id_kategori; ?>" <?=$data->id_kategori == $data_buku[0]->id_kategori ? 'selected' : null?>><?php echo $data->kategori; ?></option>
                                    <?php } ?>
                                </select>
                                <?=form_error('kategori')?>
                            </div>
                            <div class="form-group <?=form_error('pengarang') ? 'has-error' : null?>">
                                <label class="control-label">Pengarang</label>
                                <input type="text" name="pengarang" class="form-control" placeholder="Pengarang Buku" value="<?=$data_buku[0]->pengarang?>">
                                <?=form_error('pengarang')?>
                            </div>
                            <div class="form-group <?=form_error('penerbit') ? 'has-error' : null?>">
                                <label class="control-label">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control" placeholder="Penerbit Buku" value="<?=$data_buku[0]->penerbit?>">
                                <?=form_error('penerbit')?>
                            </div>

                            <div class="form-group <?=form_error('tahun_terbit') ? 'has-error' : null?>">
                                <label class="control-label">Tahun Terbit</label>
                                <input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit" value="<?=$data_buku[0]->tahun_terbit?>">
                                <?=form_error('tahun_terbit')?>
                            </div>
                            <div class="form-group <?=form_error('no_isbn') ? 'has-error' : null?>">
                                <label class="control-label">no_isbn</label>
                                <input type="text" name="no_isbn" class="form-control" placeholder="No. ISBN" value="<?=$data_buku[0]->no_isbn?>">
                                <?=form_error('penerbit')?>
                            </div>
                            <div class="form-group <?=form_error('jumlah') ? 'has-error' : null?>">
                                <label class="control-label">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Buku" value="<?=$data_buku[0]->jumlah?>">
                                <?=form_error('jumlah')?>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
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