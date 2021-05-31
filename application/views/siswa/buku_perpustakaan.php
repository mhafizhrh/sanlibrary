<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$judul?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>master_data"><i class="fa fa-list"></i> Master Data</a></li>
            <li class="active"><a href="<?=base_url();?>master_data/data_buku"> <?=$judul?></a></li>
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
                    <form class="col-md-6" method="post" action="<?php echo base_url('siswa/buku_perpustakaan/search'); ?>">
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
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>No. ISBN</th>
                                <th>Jumlah Buku</th>
                                <th>Tersedia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                                <?php foreach ($buku_perpustakaan as $data) : ?>
                                    <tr>
                                        <td>
                                            <?php echo $data->kategori; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->judul; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->pengarang; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->penerbit; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->tahun_terbit; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->no_isbn; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->jumlah; ?>
                                        </td>
                                        <td>
                                            <?php echo $data->jumlah <= 0 ? '<label class="label bg-red">Tidak</label>' : '<label class="label bg-green">Ya</label>'; ?>
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
    function warning(id_buku) {

        swal({
            title: "Hapus data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((value) => {
            if (value) {

                window.location.href = '<?php echo base_url('katalog_buku/delete_buku/')?>' + id_buku;
            }
        });
    }
</script>