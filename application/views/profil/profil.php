<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$judul?>
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a href="<?=base_url();?>profil"><i class="fa fa-list"></i> <?=$judul?></a></li>
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
                    <div class="col-md-6">
                        <?php echo $this->session->flashdata('message'); ?>
                        <form method="post">
                            <div class="form-group <?=form_error('nama_lengkap') ? 'has-error' : null?>">
                                <label class="control-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?=$data_admin->nama_lengkap?>" autofocus>
                                <?=form_error('nama_lengkap')?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Username</label>
                                <input type="text" name="username" class="form-control" value="<?=$data_admin->username?>" readonly>
                            </div>
                            <div class="form-group <?=form_error('alamat') ? 'has-error' : null?>">
                                <label class="control-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="<?=$data_admin->alamat?>">
                                <?=form_error('alamat')?>
                            </div>
                            <div class="form-group <?=form_error('telp') ? 'has-error' : null?>">
                                <label class="control-label">Telepon</label>
                                <input type="text" name="telp" class="form-control" value="<?=$data_admin->telp?>">
                                <?=form_error('telp')?>
                            </div>
                            <div class="form-group <?=form_error('jk') ? 'has-error' : null?>">
                                <label class="control-label">Jenis Kelamin</label>
                                <select class="form-control" name="jk">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="1" <?=$data_admin->jk == 1 ? 'selected' : null?>>Laki-Laki</option>
                                    <option value="0" <?=$data_admin->jk == 0 ? 'selected' : null?>>Perempuan</option>
                                </select>
                                <?=form_error('jk')?>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger">Batal</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form method="post">
                            <div class="form-group <?=form_error('password') ? 'has-error' : null?>">
                                <label class="control-label">Password</label>
                                <input type="password" name="password" class="form-control" value="<?=set_value('password')?>" placeholder="Password">
                                <?=form_error('password')?>
                            </div>
                            <div class="form-group <?=form_error('passwordconf') ? 'has-error' : null?>">
                                <label class="control-label">Konfirmasi Password</label>
                                <input type="password" name="passwordconf" class="form-control" value="<?=set_value('passwordconf')?>">
                                <?=form_error('passwordconf')?>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
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