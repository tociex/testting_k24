<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><?php echo $title; ?></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a><?php echo $title; ?></a>
                </li>
                
            </ol>
        </div>
    </div>
    <br/>
	<!-- /.content-header -->
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Default box -->
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
					<?php if (validation_errors()) { ?>
						<div class="alert alert-danger">
							<a class="close" data-dismiss="alert">x</a>
							<strong><?php echo strip_tags(validation_errors()); ?></strong>
						</div>
					<?php } ?>
					<!-- general form elements -->
					<div class="card card-primary card-outline">
						<div class="card-header">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-user">
								Tambah User
							</button>
						</div> <!-- /.card-body -->
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover dataTables-example" id="">
									<thead>
										<th>No</th>
										<th>Register</th>
										<th>Nama</th>
										
										<th>Action</th>
										
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($list_user as $lu) : ?>
											<tr>
												<td><?php echo $i++; ?></td>
											    <td><?php echo format_indo($lu['date_created']); ?></td>
												<td><?php echo $lu['nama']; ?></td>
												<td><button type="button" class="tombol-edit btn btn-info  btn-sm" data-id="<?php echo $lu['id_user']; ?>" data-toggle="modal" data-target="#edit-user"><i class="fa fa-edit"></i> Edit</button>

												<button type="button" class="tombol-view btn btn-warning  btn-sm" data-id="<?php echo $lu['id_user']; ?>" data-toggle="modal" data-target="#view-user"><i class="fa fa-eye"></i> View</button>

                                                <button type="button" class="tombol-hapus btn btn-danger  btn-sm" data-id="<?php echo $lu['id_user']; ?>" data-toggle="modal" data-target="#hapus-user"><i class="fa fa-trash-o"></i> Hapus</button> 
												</td>
												
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="add-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah User</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<form action="<?php echo base_url('admin/man_user'); ?>" method="post" id="form_id">
						
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" class="form-control form-control-sm" name="nama" required>
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
						<button type="submit" class="btn btn-primary mr-2">Simpan Data</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
	</div>
</div>

<div class="modal fade" id="edit-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit User</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<form action="<?php echo base_url('admin/edit_user'); ?>" method="post" id="form_id">
						<input type="hidden" name="id_user" id="id_user">
						
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" class="form-control form-control-sm" name="nama" id="nama" value="<?php set_value('nama'); ?>" required>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control form-control-sm" name="password1" placeholder="Ketik password"  required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Repeat Password</label>
									<input type="password" class="form-control form-control-sm" name="password2" placeholder="Ketik ulang password" required>
								</div>
							</div>
						</div>
						<!-- /.box-body -->
						<button type="submit" class="btn btn-primary mr-2">Simpan Perubahan</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="edit-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit User</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<form action="<?php echo base_url('admin/edit_user'); ?>" method="post" id="form_view">
						<input type="hidden" name="id_user" id="id_user">
						
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" class="form-control form-control-sm" name="nama" id="nama" value="<?php set_value('nama'); ?>" required>
						</div>
						

						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="view-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail User</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<form action="<?php echo base_url('admin/edit_user'); ?>" method="post" id="form_view">
						<input type="hidden" name="id_user" id="id_user">
						
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" class="form-control form-control-sm" name="nama" id="nama" value="<?php set_value('nama'); ?>" readonly>
						</div>
						

						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

	$('.tombol-edit').on('click', function() {
		const id_user = $(this).data('id');
		$.ajax({
			url: '<?php echo base_url('admin/get_user'); ?>',
			data: {
				id_user: id_user
			},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				$('#nama').val(data.nama);
			}
		});
	});

	$('.tombol-view').on('click', function() {
		const id_user = $(this).data('id');
		$.ajax({
			url: '<?php echo base_url('admin/get_user'); ?>',
			data: {
				id_user: id_user
			},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				$('#form_view [name=nama]').val(data.nama);
			}
		});
	});

	 $('.tombol-hapus').click(function () {
     	   const id_user = $(this).data('id');
            swal({
                title: "Yakin Hapus data",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Hapus",
                closeOnConfirm: false
            }, function () {
                document.location.href = '<?=base_url('admin/hapus_user/'); ?>'+id_user;
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
</script>
