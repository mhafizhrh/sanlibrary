<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$judul?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>data_transaksi"><i class="fa fa-list"></i> Data Transaksi</a></li>
            <li class="active"><a href="<?=base_url();?>data_transaksi/data_pengembalian"> <?=$judul?></a></li>
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
                <div class="form-group row">
                    <form class="col-md-6" method="post" action="<?php echo base_url('data_transaksi/data_pengembalian/search'); ?>">
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
                                <th>ID Peminjaman</th>
                                <th>Judul</th>
                                <th>Nama Siswa</th>
                                <th>Tgl. Pinjam</th>
                                <th>Tgl. Kembali</th>
                                <th>Tgl. Buku dikembalikan</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                                <?php foreach ($data_pengembalian as $data) { ?>
                                    <tr>
                                        <td>
                                            PB<?php echo sprintf("%04d", $data->id_peminjaman); ?>
                                        </td>
                                        <td>
                                            <?php echo $data->judul; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->nama_siswa; ?>
                                        </td>
                                        <td>
                                            <?php echo date_create($data->tgl_pinjam)->format('d-m-Y'); ?>
                                        </td>
                                        <td>
                                            <?php echo date_create($data->tgl_kembali)->format('d-m-Y'); ?>
                                        </td>
                                        <td>
                                            <?php echo date_create($data->tgl_kembali_buku)->format('d-m-Y'); ?>
                                        </td>
                                        <td>
                                            <?php echo $data->jumlah_pinjam; ?>
                                        </td>
                                        <td>
                                            <label class="label bg-navy">
                                            <?php 

                                            echo $data->status == 1 ? 'Kembali' : null;

                                            ?>
                                            </label>
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
<!-- /.content-wrapper