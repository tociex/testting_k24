<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Register Member</title>
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

    <div class="middle-box text-left loginscreen animated fadeInDown">
        <div>
            
            <div class="ibox-content">
            <h5>Welcome to Aplikasi</h5><br>
            <h3> </h3>
             <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
             <?php echo $this->session->flashdata('msg'); ?>
                      <form action="<?php echo base_url('auth/register'); ?>" method="post" enctype="multipart/form-data" id="form_id">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control form-control-sm" name="NIK" placeholder="NIK"  required>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control form-control-sm" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>No HP</label>
                                    <input type="text" class="form-control form-control-sm" name="no_hp" placeholder="No hp" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control form-control-sm" name="jk">
                                        <option value="">- Pilih Jenis Kelamin -</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tgl Lahir</label>
                                    <input type="date" class="form-control form-control-sm" name="tgl_lahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <!-- <input type="file" accept=".gif,.jpg,.jpeg,.png,.doc,.docx" name="file"> -->

                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file" accept="image/*" >
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                      </div>
                                    </div>
                                </div>
                            
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control form-control-sm" name="password1" placeholder="Ketik password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Repeat Password</label>
                                            <input type="password" class="form-control form-control-sm" name="password2" placeholder="Ketik ulang password" required>
                                        </div>
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-primary block full-width m-b"><i class="fa fa-sign-in"></i> Register</button>
                            <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url(); ?>">Login Member</a> 
                    </form>
          
             </div>
        </div>
    </div>

    

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



