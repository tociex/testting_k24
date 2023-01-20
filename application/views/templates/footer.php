

<br/><br/><br/>
<div class="footer" >
    <div class="float-right">
        Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'production') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
    </div>
    <div>
       Developer by : <span class="badge badge-primary">to_ciex</span> &copy; <?php echo date('Y'); ?>
    </div>
</div>

</div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo base_url('assets/'); ?>template/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>template/js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>template/js/bootstrap.js"></script>
<script src="<?php echo base_url('assets/'); ?>template/js/plugins/metisMenu/jquery.metisMenu.js"></script>

<script src="<?php echo base_url('assets/'); ?>template/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>template/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>template/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets/'); ?>template/js/inspinia.js"></script>
<script src="<?php echo base_url('assets/'); ?>template/js/plugins/pace/pace.min.js"></script>

<script src="<?php echo base_url('assets/'); ?>template/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


 <script src="<?php echo base_url('assets/'); ?>template/js/plugins/sweetalert/sweetalert.min.js"></script>


<script>

    $(document).ready(function () {


        $('.logout').click(function () {
            swal({
                title: "Konfirmasi Logout",
                text: "Klik keluar untuk mengakhiri session!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Keluar",
                closeOnConfirm: false
            }, function () {
                document.location.href = '<?=base_url('auth/logout'); ?>';
            });
            
        });
          

       

    

        const flashData = $('.flash-data').data('flashdata');
        if (flashData) {
            swal({
                title: flashData + ' Sukses',
                text: "",
                type: 'success'
            });
        }




    });

</script>
<script>

    $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    // { extend: 'copy'},
                    // {extend: 'csv'},
                    // {extend: 'excel', title: 'ExampleFile'},
                    // {extend: 'pdf', title: 'ExampleFile'},

                    // {extend: 'print',
                    //  customize: function (win){
                    //         $(win.document.body).addClass('white-bg');
                    //         $(win.document.body).css('font-size', '10px');

                    //         $(win.document.body).find('table')
                    //                 .addClass('compact')
                    //                 .css('font-size', 'inherit');
                    // }
                    // }
                ]

            });

        });
   
</script>


</body>

</html>