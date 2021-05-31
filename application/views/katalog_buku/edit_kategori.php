<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$judul?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>katalog_buku"><i class="fa fa-list"></i> Katalog Buku</a></li>
            <li><a href="<?=base_url();?>kategori_buku"><i class="fa fa-list"></i> Kategori Buku</a></li>
            <li class="active">
                <a href="<?=base_url();?>katalog_buku/kategori_buku/edit">
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
                <?php echo $this->session->flashdata('message'); ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?=$return_message?>
                        <form method="post">
                            <div class="form-group <?=form_error('kategori') ? 'has-error' : null?>">
                                <label class="control-label">Kategori</label>
                                <input type="text" name="kategori" class="form-control" placeholder="Kategori Buku" value="<?php echo $kategori_buku[0]->kategori; ?>">
                                <?=form_error('kategori')?>
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