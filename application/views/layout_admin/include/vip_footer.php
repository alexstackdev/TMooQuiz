<?php defined('BASEPATH') OR exit('No direct script access allowed');?>    
</div> <!--End wrapper-->
<footer>
    <div class="loader" style="display: none;">
        <div class="background-loading"></div> 
        <div class="loading text-center">
            <img src="<?php echo base_url();?>uploads/quiz-loading.gif" alt="Loading" title="Loading">
        </div>
    </div>
       

	<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>		
	<!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>assets/metisMenu/metisMenu.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="<?=base_url()?>assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/datatables-responsive/dataTables.responsive.js"></script>
    <script  href="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>assets/admin/js/admin2.js"></script>
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