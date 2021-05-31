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
                    <a href="<?php echo base_url(); ?>master_data/tambah_siswa" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Data Siswa</a>
                </div>
                <div class="form-group row">
                    <form class="col-md-6" method="post" action="<?php echo base_url('master_data/data_siswa/search'); ?>">
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
                                <th>Password</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                                <?php foreach ($data_siswa as $data) : ?>
                                    <tr>
                                        <td>
                                            <?php echo $data->password; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->nis; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->nama_siswa; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->tempat_lahir; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->tgl_lahir; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->jk == 1 ? 'Laki-Laki' : 'Perempuan'; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->kelas; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
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