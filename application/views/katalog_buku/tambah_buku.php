<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$judul?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>katalog_buku"><i class="fa fa-list"></i> Katalog Buku</a></li>
            <li class="active">
                <a href="<?=base_url();?>katalog_buku/tambah_buku">
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
                        <form method="post">
                            <div class="form-group <?=form_error('judul') ? 'has-error' : null?>">
                                <label class="control-label">Judul</label>
                                <input type="text" name="judul" class="form-control" placeholder="Judul Buku" value="<?=set_value('judul')?>">
                                <?=form_error('judul')?>
                            </div>
                            <div class="form-group <?=form_error('kategori') ? 'has-error' : null?>">
                                <label class="control-label">Kategori</label>
                                <select class="form-control" name="kategori" id="select1" style="width: 100%;">
                                    <option value="">Pilih Kategori</option>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kategori as $data) { ?>
                                    <option value="<?php echo $data->id_kategori; ?>" <?=set_value('kategori') == $data->id_kategori ? 'selected' : null?>><?php echo $data->kategori; ?></option>
                                    <?php } ?>
                                </select>
                                <?=form_error('kategori')?>
                            </div>
                            <div class="form-group <?=form_error('pengarang') ? 'has-error' : null?>">
                                <label class="control-label">Pengarang</label>
                                <input type="text" name="pengarang" class="form-control" placeholder="Pengarang Buku" value="<?=set_value('pengarang')?>">
                                <?=form_error('pengarang')?>
                            </div>
                            <div class="form-group <?=form_error('penerbit') ? 'has-error' : null?>">
                                <label class="control-label">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control" placeholder="Penerbit Buku" value="<?=set_value('penerbit')?>">
                                <?=form_error('penerbit')?>
                            </div>
                            <div class="form-group <?=form_error('tahun_terbit') ? 'has-error' : null?>">
                                <label class="control-label">Tahun Terbit</label>
                                <input type="number" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit" value="<?=set_value('tahun_terbit')?>">
                                <?=form_error('tahun_terbit')?>
                            </div>
                            <div class="form-group <?=form_error('no_isbn') ? 'has-error' : null?>">
                                <label class="control-label">No. ISBN</label>
                                <input type="text" name="no_isbn" class="form-control" placeholder="No. ISBN" value="<?=set_value('no_isbn')?>">
                                <?=form_error('penerbit')?>
                            </div>
                            <div class="form-group <?=form_error('jumlah') ? 'has-error' : null?>">
                                <label class="control-label">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Buku" value="<?=set_value('jumlah')?>">
                                <?=form_error('jumlah')?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Tambah</button>
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