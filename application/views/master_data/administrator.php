<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$judul?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>master_data"><i class="fa fa-list"></i> Master Data</a></li>
            <li class="active"><a href="<?=base_url();?>master_data/data_siswa"> <?=$judul?></a></li>
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
                <div class="form-group">
                    <?php echo $this->session->flashdata('message'); ?>
                    <a href="<?php echo base_url(); ?>master_data/tambah_administrator" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Administrator</a>
                </div>
                <div class="form-group row">
                    <form class="col-md-6" method="post" action="<?php echo base_url('master_data/administrator/search'); ?>">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Cari disini...">
                            <span class="input-group-btn">
                                <button class="btn btn-success" name="search" ><span class="fa fa-search"></span></button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                                <?php foreach ($data_admin as $data) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $data->nama_lengkap; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->alamat; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->telp; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->jk == 1 ? 'Laki-Laki' : 'Perempuan'; ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php echo $this->pagination->create_links(); ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->