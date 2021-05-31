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
                <a href="<?=base_url();?>katalog_buku/kategori_buku">
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
                <div class="form-group">
                    <a href="<?php echo base_url(); ?>katalog_buku/tambah_kategori" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Kategori Baru</a>
                </div>
                <div class="form-group row">
                    <form class="col-md-6" method="post" action="<?php echo base_url('katalog_buku/kategori_buku/search'); ?>">
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
                                <th width="100">Ubah</th>
                                <th width="100">Hapus</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                                <?php foreach ($data_kategori as $data) { ?>
                                    <tr>
                                        <td>
                                            <a href="<?=base_url()?>katalog_buku/edit_kategori/<?=$data->id_kategori?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a onclick="warning('<?php echo $data->id_kategori?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td>
                                            <?php echo $data->kategori; ?>
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

<script>
    function warning(id_kategori) {

        swal({
            title: "Hapus data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((value) => {
            if (value) {

                window.location.href = '<?php echo base_url('katalog_buku/delete_kategori/')?>' + id_kategori;
            }
        });
    }
</script>