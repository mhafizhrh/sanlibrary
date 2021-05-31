<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$judul?>
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a href="<?=base_url();?>siswa/data_peminjaman"> <?=$judul?></a></li>
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
                    <form class="col-md-6" method="post" action="<?php echo base_url('siswa/data_peminjaman/search'); ?>">
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
                                <th>Tgl. Pinjam</th>
                                <th>Batas Peminjaman</th>
                                <th>Tgl. Kembali</th>
                                <th>Terlambat</th>
                                <th>Jumlah</th>
                                <th>Admin/Petugas</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                                <?php foreach ($data_peminjaman as $data) { ?>
                                    <tr>
                                        <td>
                                            PB<?php echo sprintf("%04d", $data->id_peminjaman); ?>
                                        </td>
                                        <td>
                                            <?php echo $data->judul; ?>
                                        </td>
                                        <td>
                                            <?php echo date_create($data->tgl_pinjam)->format('d-m-Y'); ?>
                                        </td>
                                        <td>
                                            <?php echo date_create($data->tgl_kembali)->format('d-m-Y'); ?>
                                        </td>
                                        <td>
                                            <?php echo $data->tgl_kembali_buku == '0000-00-00' ? '' : date_create($data->tgl_kembali_buku)->format('d-m-Y'); ?>
                                        </td>
                                        <td>
                                            <?php

                                            $tgl_sekarang = date_create(date('Y-m-d'));
                                            $tgl_kembali = date_create($data->tgl_kembali);
                                            $tgl_kembali_buku = date_create($data->tgl_kembali_buku);
                                            $diff = date_diff($tgl_sekarang, $tgl_kembali);
                                            $diff2 = date_diff($tgl_kembali, $tgl_kembali_buku);

                                            if ($data->status == 1) {
                                                
                                                $terlambat = '<label class="label bg-green">';
                                                $terlambat .= $tgl_kembali_buku->format('U') < $tgl_sekarang->format('U') ? $diff2->format('%a hari') : 0 . " hari";
                                                $terlambat .= '</label>';
                                            } else {

                                                $terlambat = '<label class="label bg-gray">';
                                                $terlambat .= $tgl_kembali->format('U') < $tgl_sekarang->format('U') ? $diff->format('%a hari') : 0 . " hari";
                                                $terlambat .= '</label>';
                                            }

                                            echo $terlambat;

                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $data->jumlah_pinjam; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->nama_lengkap; ?>
                                        </td>
                                        <td>
                                            
                                            <?php 

                                            echo $data->status == 1 ? '<label class="label bg-green">Dikembalikan</label>' : '<label class="label bg-gray">Meminjam</label>';

                                            ?>
                                            
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