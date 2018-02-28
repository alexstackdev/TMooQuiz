<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 2/2/18
 * Time: 11:02 PM
 */
?>
<footer>
    <div class="loader" style="display: none;">
        <div class="background-loading"></div>
        <div class="loading text-center">
            <img src="<?php echo base_url();?>uploads/quiz-loading.gif" alt="Loading" title="Loading">
        </div>
    </div>
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="<?=base_url()?>assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/datatables-responsive/dataTables.responsive.js"></script>
    <script  href="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

    <script src="<?=base_url()?>assets/js/card.js"></script>
    <script src="<?=base_url()?>assets/2018/dist/js/adminlte.min.js"></script>
    <script src="<?=base_url()?>assets/2018/dist/js/demo.js"></script>
    <script src="<?=base_url()?>assets/2018/dist/js/custom.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
            $('.dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
</footer>

</body>
</html>
