<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="<?= base_url('admin/dashboard'); ?>" class="text-teal">Sistem Pendukung Keputusan - Perangkingan Daerah Rawan Bencana Pangan Kabupaten Jember</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
<!-- Main js -->
<!-- <script src="<?= base_url() ?>assets/dist/js/main.js"></script> -->
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#example2").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#example3").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#example4").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        // $('#example2').DataTable({
        //     "paging": true,
        //     "lengthChange": false,
        //     "searching": false,
        //     "ordering": true,
        //     "info": true,
        //     "autoWidth": false,
        //     "responsive": true,
        // });
    });
</script>

<!-- Alert -->
<script>
    $(function() {
        const flashData = $('.flash-data').data('flashdata');

        if (flashData == 'add') {
            toastr.success('Berhasil menambahkan data!')
        } else if (flashData == 'edit') {
            toastr.info('Data berhasil diubah!')
        } else if (flashData == 'delete') {
            toastr.error('Data berhasil dihapus!')
        } else if (flashData == 'warning') {
            toastr.warning('Kesalahan dalam mengisi data!')
        } else if (flashData == 'isLogin') {
            toastr.success('Selamat datang, anda berhasil login!')
        } else if (flashData == 'disable') {
            toastr.error('Akun telah dinonattifkan')
        } else if (flashData == 'enable') {
            toastr.info('Akun telah diaktifkan')
        }
    });
</script>

<!-- Chain select kecamatan and desa -->
<script>
    $(document).ready(function() {
        $('#nm_kec').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?= base_url('admin/klasifikasi/get_desa'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(array) {
                    var html = '';
                    for (let i = 0; i < array.length; i++) {
                        html += `<option value=` + array[i].id_desa + `>` + array[i].nm_desa + `</option>`
                    }
                    $('#nm_ds').html(html);
                }
            });
        });
    });
</script>

<!-- Ubah Password Admin -->
<script>
    $(document).ready(function() {
        $('.psw').prop('hidden', true);
        $('.psw1').prop('hidden', true);
        $('.btn-batalpsw').prop('hidden', true);

        $('.btn-ubahpsw').click(function() {
            $('.btn-ubahpsw').prop('hidden', true);
            $('.btn-batalpsw').prop('hidden', false);
            $('.psw').prop('hidden', false);
            $('.psw1').prop('hidden', false);
        });

        $('.btn-batalpsw').click(function() {
            $('.btn-ubahpsw').prop('hidden', false);
            $('.btn-batalpsw').prop('hidden', true);
            $('.psw').prop('hidden', true);
            $('.psw1').prop('hidden', true);
        });
    });
</script>

</body>

</html>