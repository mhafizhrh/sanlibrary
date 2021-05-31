  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019-<?=date('Y')?> <a href="https://mhafizhrh.xyz/">Fizh vi Britannia</a>.</strong>
    Template by <a href="https://adminlte.io">AdminLTE</a>.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>AdminLTE/dist/js/demo.js"></script>
<!-- date-range-picker -->
<script src="<?=base_url()?>AdminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url()?>AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url()?>AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Morris.js charts -->
<script src="<?=base_url()?>AdminLTE/bower_components/raphael/raphael.min.js"></script>
<!-- <script src="<?=base_url();?>chosen_v1.8.7/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script> -->
<script src="<?=base_url();?>chosen_v1.8.7/chosen.jquery.js" type="text/javascript"></script>
<!-- <script src="<?=base_url();?>chosen_v1.8.7/docsupport/prism.js" type="text/javascript" charset="utf-8"></script> -->
<!-- <script src="<?=base_url();?>chosen_v1.8.7/docsupport/init.js" type="text/javascript" charset="utf-8"></script> -->
<script>

  $(function () {
    $('#tb-data-siswa').DataTable({ "scrollX" : true })
    $('#select1').select2()
    $('#select2').select2()
    $('#select3').select2()

    // $("")
  })
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  // swal('Good job!', 'You clicked the button!', 'success')
</script>
</body>
</html>
