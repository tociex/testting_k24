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
								Tambah Member
							</button>
						</div> <!-- /.card-body -->
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover dataTables-example" id="">
									<thead>
										<th>No</th>
										<th>Register</th>
										<th>NIK</th>
										<th>Nama</th>
										<th>Email</th>
										<th>No HP</th>
										<th>Tgl Lahir</th>
										<th>Jns Kelamin</th>
										<th>Image</th>
										
										<th>Action</th>
										
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($list_user as $lu) : ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo format_indo($lu['date_created']); ?></td>
												<td><?php echo $lu['NIK']; ?></td>
												<td><?php echo $lu['nama']; ?></td>
												<td><?php echo $lu['email']; ?></td>
												<td><?php echo $lu['no_hp']; ?></td>
												<td><?php echo format_indo($lu['tgl_lahir']); ?></td>
												<td><?php if($lu['jk']=='Pria'){ echo "<i class='label label-success'>Pria</i>"; }else{ echo "<i class='label label-warning'>Wanita</i>";  } ?></td>
												<td><?php  echo '<img alt="image" src="'.base_url('assets/dist/img/profile/').$lu['image'].'" width="50%" height="50%">'; ?></td>
											
												<td><button type="button" class="tombol-edit btn btn-info btn-block btn-sm" data-id="<?php echo $lu['id_member']; ?>" data-toggle="modal" data-target="#edit-user"><i class="fa fa-edit"></i> Edit</button>

                                                <button type="button" class="tombol-view btn btn-warning btn-block btn-sm" data-id="<?php echo $lu['id_member']; ?>" data-toggle="modal" data-target="#view-user"><i class="fa fa-eye"></i> View</button>

                                                <button type="button" class="tombol-hapus btn btn-danger btn-block btn-sm" data-id="<?php echo $lu['id_member']; ?>" data-toggle="modal" data-target="#hapus-user"><i class="fa fa-trash-o"></i> Hapus</button> 
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
				<h4 class="modal-title">Tambah Member</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<form action="<?php echo base_url('admin/man_member'); ?>" method="post" enctype="multipart/form-data" id="form_id">
						
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
				<h4 class="modal-title">Edit Member</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<form action="<?php echo base_url('admin/edit_member'); ?>" method="post"  enctype="multipart/form-data" id="form_id">
						<input type="hidden" name="id_user" id="id_user">
						<div class="form-group">
							<label>NIK</label>
							<input type="text" class="form-control form-control-sm" name="NIK" id="NIK" placeholder="NIK"  required>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="Nama" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Email" readonly required>
						</div>
						<div class="form-group">
							<label>No HP</label>
							<input type="text" class="form-control form-control-sm" name="no_hp" id="no_hp" placeholder="No hp" required>
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control form-control-sm" id="jk" name="jk">
								<option value="">- Pilih Jenis Kelamin -</option>
								<option value="Pria">Pria</option>
								<option value="Wanita">Wanita</option>
								
							</select>
						</div>
						<div class="form-group">
							<label>Tgl Lahir</label>
							<input type="date" class="form-control form-control-sm" id="tgl_lahir" name="tgl_lahir" required>
						</div>
						<div class="form-group row">
		                    <label style="margin-left:1.5em">Foto</label>
		                    <div class="col-sm-12">
		                        <div class="row">
		                            <div class="col-sm-3">
		                                <img id="my_image" src="" class="img-thumbnail">
		                            </div>
		                            <div class="col-sm-9">
		                                <div class="custom-file">
		                                   <input type="file" class="custom-file-input" id="exampleInputFile" name="file" accept="image/*">
		                                    <label class="custom-file-label" for="image">Pilih File</label>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
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



<div class="modal fade" id="view-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail Member</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<form action="<?php echo base_url('admin/edit_member'); ?>" method="post"  enctype="multipart/form-data" id="form_dua">
						<input type="hidden" name="id_user" id="id_user">
						<div class="form-group">
							<label>NIK</label>
							<input type="text" class="form-control form-control-sm" name="NIK" id="NIK" placeholder="NIK"  readonly>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="Nama" readonly>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Email" readonly>
						</div>
						<div class="form-group">
							<label>No HP</label>
							<input type="text" class="form-control form-control-sm" name="no_hp" id="no_hp" placeholder="No hp" readonly>
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control form-control-sm" id="jk" name="jk" readonly>
								<option value="">- Pilih Jenis Kelamin -</option>
								<option value="Pria">Pria</option>
								<option value="Wanita">Wanita</option>
								
							</select>
						</div>
						<div class="form-group">
							<label>Tgl Lahir</label>
							<input type="text" class="form-control form-control-sm" id="tgl_lahir" name="tgl_lahir" readonly>
						</div>
						<div class="form-group row">
		                    <label style="margin-left:1.5em">Foto</label>
		                    <div class="col-sm-12">
		                        <div class="row">
		                            <div class="col-sm-3">
		                                <img id="my_imageview" src="" class="img-thumbnail">
		                            </div>
		                            
		                        </div>
		                    </div>
		                </div>
						
					
						
					
						<!-- /.box-body -->
				
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
			url: '<?php echo base_url('admin/get_member'); ?>',
			data: {
				id_user: id_user
			},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				$('#id_user').val(data.id_member);
				$('#nama').val(data.nama);
				$('#NIK').val(data.NIK);
				$('#email').val(data.email);
				$('#no_hp').val(data.no_hp);
				$('#jk').val(data.jk);
				$('#tgl_lahir').val(data.tgl_lahir);
				$("#my_image").attr("src","<?php echo base_url('assets/dist/img/profile/'); ?>"+data.image);
			}
		});
	});

	$('.tombol-view').on('click', function() {
		const id_user = $(this).data('id');
		$.ajax({
			url: '<?php echo base_url('admin/get_member'); ?>',
			data: {
				id_user: id_user
			},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				$('#form_dua [name=nama]').val(data.nama);
				$('#form_dua [name=email]').val(data.email);
				$('#form_dua [name=NIK]').val(data.NIK);
				$('#form_dua [name=tgl_lahir]').val(data.tgl_lahir);
				$('#form_dua [name=jk]').val(data.jk);
			
				$("#my_imageview").attr("src","<?php echo base_url('assets/dist/img/profile/'); ?>"+data.image);
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
                document.location.href = '<?=base_url('admin/hapus_member/'); ?>'+id_user;
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
