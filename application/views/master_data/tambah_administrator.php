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
            <!-- <div class="box-header with-border">
                <h3 class="box-title">Terlambat Pengembalian</h3>
            </div> -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post">
                            <div class="form-group <?=form_error('nama_lengkap') ? 'has-error' : null?>">
                                <label class="control-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?=set_value('nama_lengkap')?>" autofocus>
                                <?=form_error('nama_lengkap')?>
                            </div>
                            <div class="form-group <?=form_error('username') ? 'has-error' : null?>">
                                <label class="control-label">Username</label>
                                <input type="text" name="username" class="form-control" value="<?=set_value('username')?>">
                                <?=form_error('username')?>
                            </div>
                            <div class="form-group <?=form_error('password') ? 'has-error' : null?>">
                                <label class="control-label">Password</label>
                                <input type="password" name="password" class="form-control" value="<?=set_value('password')?>">
                                <?=form_error('password')?>
                            </div>
                            <div class="form-group <?=form_error('passwordconf') ? 'has-error' : null?>">
                                <label class="control-label">Konfirmasi Password</label>
                                <input type="password" name="passwordconf" class="form-control" value="<?=set_value('passwordconf')?>">
                                <?=form_error('passwordconf')?>
                            </div>
                            <div class="form-group <?=form_error('alamat') ? 'has-error' : null?>">
                                <label class="control-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="<?=set_value('alamat')?>">
                                <?=form_error('alamat')?>
                            </div>
                            <div class="form-group <?=form_error('telp') ? 'has-error' : null?>">
                                <label class="control-label">Telepon</label>
                                <input type="text" name="telp" class="form-control" value="<?=set_value('telp')?>">
                                <?=form_error('telp')?>
                            </div>
                            <div class="form-group <?=form_error('jk') ? 'has-error' : null?>">
                                <label class="control-label">Jenis Kelamin</label>
                                <select class="form-control" name="jk">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="1" <?=set_value('jk') == 1 ? 'selected' : null?>>Laki-Laki</option>
                                    <option value="2" <?=set_value('jk') == 2 ? 'selected' : null?>>Perempuan</option>
                                </select>
                                <?=form_error('jk')?>
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

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper --> 