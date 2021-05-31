<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$judul?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>data_transaksi"><i class="fa fa-list"></i> Data Transaksi</a></li>
            <li class="active"><a href="<?=base_url();?>data_transaksi/data_peminjaman"> <?=$judul?></a></li>
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
                <div class="alert bg-gray">
                    <h3>Informasi!</h3>
                <p>Lama waktu perpanjangan peminjaman adalah 7 hari.</p>
                </div>
                <?php echo $this->session->flashdata('message'); ?>
                <div class="form-group">
                    <a target="_blank" href="<?php echo base_url('laporan/cetak_data_peminjaman/') . $this->session->keyword ?>" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
                </div>
                <div class="form-group row">
                    <form class="col-md-6" method="post" action="<?php echo base_url('data_transaksi/data_peminjaman/search'); ?>">
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
                                <th>Kembali</th>
                                <th>Perpanjang</th>
                                <th>ID Peminjaman</th>
                                <th>Judul</th>
                                <th>Nama Siswa</th>
                                <th>Tgl. Pinjam</th>
                                <th>Tgl. Kembali</th>
                                <th>Jumlah</th>
                                <th>Terlambat</th>
                                <th>Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                                <?php foreach ($data_peminjaman as $data) : ?>
                                    <tr>
                                        <td>
                                            <a onclick="warning('<?php echo $data->id_peminjaman; ?>', 'kembali')" class="btn btn-success">Kembali</a>
                                        </td>
                                        <td>
                                            <a onclick="warning('<?php echo $data->id_peminjaman; ?>', 'perpanjang')" class="btn btn-info">Perpanjang</a>
                                        </td>
                                        <td>
                                            PB<?php echo sprintf("%04d", $data->id_peminjaman); ?>
                                            <?php echo sprintf('%00d', str_replace('PB', '', 'PB0003')); ?>
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
                                            <?php echo $data->jumlah_pinjam; ?>
                                        </td>
                                        <td>
                                            <?php 

                                            $tgl_sekarang = date_create(date('Y-m-d'));
                                            $tgl_kembali = date_create($data->tgl_kembali);
                                            $diff = date_diff($tgl_sekarang, $tgl_kembali);

                                            echo $tgl_kembali->format('U') < $tgl_sekarang->format('U') ? $diff->format('%a hari') : 0 . " hari";

                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $data->nama_lengkap; ?>
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

<script>
    function warning(id_peminjaman, action) {

        if (action == 'kembali') {

            swal({
                title: "Kembalikan buku?",
                icon: "warning",
                buttons: true,
            })
            .then((value) => {
                if (value) {

                    window.location.href = '<?php echo base_url('data_transaksi/kembali/')?>' + id_peminjaman;
                }
            });
        } else if (action == 'perpanjang') {

            swal({
                title: "Perpanjang peminjaman?",
                icon: "warning",
                buttons: true,
            })
            .then((value) => {
                if (value) {

                    window.location.href = '<?php echo base_url('data_transaksi/perpanjang/')?>' + id_peminjaman;
                }
            });
        }
    }
</script>