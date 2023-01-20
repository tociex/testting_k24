<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Form</title>
    <link href="<?php echo base_url('assets/'); ?>template/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>template/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>template/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>template/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>template/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <style>
        #hidden_div {
            display: none;
        } 
    </style>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name"><img src="<?php echo base_url('assets/dist/aplikasi/Untitled1.png')?>" alt="AdoniaLogo" class="brand-image img-circle elevation-3" style="height:200px"></h1>

            </div>
            <div class="ibox-content">
            <h5>Welcome to Aplikasi</h5><br>
            <h3> </h3>
             <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
             <?php echo $this->session->flashdata('msg'); ?>

            <form class="m-t" role="form" action="<?php echo base_url('auth/index'); ?>" method="post">
                <div class="form-group">
        
                <select id="test" name="form_select"  class="form-control" onchange="showDiv(this)">
                   <option value="0">Admin</option>
                   <option value="1">Member</option>
                </select>
                 </div>

                <div class="form-group" id="show_div">
                    <?php echo form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
              
                <div class="form-group" id="hidden_div">
                	<?php echo form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email">
                </div>
                <div class="form-group">
                	<?php echo form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b"><i class="fa fa-sign-in"></i> Login</button>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url('auth/register'); ?>">Register Member</a> 


                <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url('auth/list_member'); ?>">Json Member</a> 
            </form>
          
             </div>
        </div>
    </div>

    <script type="text/javascript">
            function showDiv(select){
               if(select.value==1){
                document.getElementById('hidden_div').style.display = "block";
                document.getElementById('show_div').style.display = "none";
                document.getElementById("email").required = true;
                document.getElementById("name").required = false;
              

               } else{
                document.getElementById('hidden_div').style.display = "none";
                document.getElementById('show_div').style.display = "block";
                document.getElementById("name").required = true;
                document.getElementById("email").required = false;
              
               }
            } 
   </script>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/'); ?>template/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>template/js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>template/js/bootstrap.js"></script>
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

</body>

</html>



