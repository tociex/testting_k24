<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//is_logged_in();
		is_admin();
	    $this->load->helper('ata');
		$this->load->helper('tglindo');
		$this->load->helper('rupiah');
		$this->load->model('Admin_model', 'admin');
	}
	
	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data['title'] = 'Beranda';
		$data['user'] = $this->db->get_where('mst_user', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['list_user'] = $this->db->get('mst_user')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function man_user()
	{
		
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[mst_user.nama]', array(
			'is_unique' => 'Nama sudah ada'
		));
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', array(
			'matches' => 'Password tidak sama',
			'min_length' => 'password min 3 karakter'
		));
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
	
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Management User';
			$data['user'] = $this->db->get_where('mst_user', ['nama' => $this->session->userdata('nama')])->row_array();
			$data['list_user'] = $this->admin->getAllUser();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_admin', $data);
			$this->load->view('admin/master/man_user', $data);
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'nama' => $this->input->post('nama', true),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'date_created' => date('Y/m/d'),
			);
			
        	$this->db->insert('mst_user', $data);
			$this->session->set_flashdata('message', 'Tambah Data');
			
			redirect('admin/man_user');
        
			
		}
	}

	public function get_user()
	{
		$id_user = $this->input->post('id_user');
		echo json_encode($this->db->get_where('mst_user', ['id_user' => $id_user])->row_array());
	}


	public function get_member()
	{
		$id_user = $this->input->post('id_user');
		echo json_encode($this->db->get_where('mst_member', ['id_member' => $id_user])->row_array());
	}


	public function edit_user()
	{
		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$this->db->set('nama', $nama);
		$this->db->where('id_user', $id_user);
		$this->db->update('mst_user');
		$this->session->set_flashdata('message', 'Ubah Data');
		redirect('admin/man_user');
	}


	public function ubah_password()
	{
		$current_password = $this->input->post('current_password');
		$new_password = $this->input->post('new_password1');
		if ($current_password == $new_password) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder text-center" role="alert">Ubah Password Gagal !! <br> Password baru tidak boleh sama dengan password lama</div>');
			redirect('admin/index');
		} else {
			$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
			$this->db->set('password', $password_hash);
			$this->db->where('id_user', $this->session->userdata('id_user'));
			$this->db->update('mst_user');
			$this->session->set_flashdata('message', 'Ubah Password');
			redirect('admin/index');
		}
	}



	public function man_member()
	{
		
		$this->form_validation->set_rules('email', 'email', 'required|trim|is_unique[mst_member.email]', array(
			'is_unique' => 'Email sudah ada'
		));
		$this->form_validation->set_rules('NIK', 'NIK', 'required|trim|is_unique[mst_member.NIK]', array(
			'is_unique' => 'NIK sudah ada'
		));
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', array(
			'matches' => 'Password tidak sama',
			'min_length' => 'password min 3 karakter'
		));
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
	
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Management Member';
			$data['user'] = $this->db->get_where('mst_member', ['email' => $this->session->userdata('email')])->row_array();
			$data['list_user'] = $this->admin->getAllmember();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_admin', $data);
			$this->load->view('admin/master/man_member', $data);
			$this->load->view('templates/footer');
		} else {
			$upload_image = $_FILES['file']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'jpeg|gif|jpg|png';
				$config['max_size']     = '1024';
				$config['upload_path'] = './assets/dist/img/profile/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('file')) {
					
					$new_image = $this->upload->data('file_name');
					$file_ext = pathinfo($new_image,PATHINFO_EXTENSION);
					$data = array(
						'nama' => $this->input->post('nama', true),
						'email' => $this->input->post('email', true),
						'no_hp' => $this->input->post('no_hp', true),
						'tgl_lahir' => $this->input->post('tgl_lahir', true),
						'jk' => $this->input->post('jk', true),
						'NIK' => $this->input->post('NIK', true),
						'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
						'date_created' => date('Y/m/d'),
						'image' => $new_image,
						
						
					);
					
		        		$this->db->insert('mst_member', $data);
						$this->session->set_flashdata('message', 'Tambah Data');
						
						redirect('admin/man_member');
					
				}else{

					echo $this->upload->display_errors();
					$this->session->set_flashdata('message', 'Eror Save Data');
						
					redirect('admin/man_member');


				}
			}else{

				$data = array(
						'nama' => $this->input->post('nama', true),
						'email' => $this->input->post('email', true),
						'no_hp' => $this->input->post('no_hp', true),
						'tgl_lahir' => $this->input->post('tgl_lahir', true),
						'jk' => $this->input->post('jk', true),
						'NIK' => $this->input->post('NIK', true),
						'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
						'date_created' => date('Y/m/d'),
					);
			    $this->db->insert('mst_member', $data);
				$this->session->set_flashdata('message', 'Tambah Data');
						
				redirect('admin/man_member');

			}


		}
	}

	public function edit_member()
	{
	

            $id= $this->input->post('id_user');
			$upload_image = $_FILES['file']['name'];
				if ($upload_image) {
					$config['allowed_types'] = 'jpeg|gif|jpg|png';
					$config['max_size']     = '1024';
					$config['upload_path'] = './assets/dist/img/profile/';
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('file')) {
						
						$new_image = $this->upload->data('file_name');
						$file_ext = pathinfo($new_image,PATHINFO_EXTENSION);
						$data = array(
							'nama' => $this->input->post('nama', true),
							'email' => $this->input->post('email', true),
							'no_hp' => $this->input->post('no_hp', true),
							'tgl_lahir' => $this->input->post('tgl_lahir', true),
							'jk' => $this->input->post('jk', true),
							'NIK' => $this->input->post('NIK', true),
							'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
							'image' => $new_image,
							
						);
						$this->db->where('id_member', $id);
			        	$this->db->update('mst_member', $data);
						$this->session->set_flashdata('message', 'Ubah Data');
			            redirect('admin/man_member');
						
					} else {
						echo $this->upload->display_errors();
						$this->session->set_flashdata('message', 'Eror Save Data');
						redirect('admin/man_member');
					}
				}else{

	                  $data = array(
							'nama' => $this->input->post('nama', true),
							'email' => $this->input->post('email', true),
							'no_hp' => $this->input->post('no_hp', true),
							'tgl_lahir' => $this->input->post('tgl_lahir', true),
							'jk' => $this->input->post('jk', true),
							'NIK' => $this->input->post('NIK', true),
							'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
							
						);
						$this->db->where('id_member', $id);
			        	$this->db->update('mst_member', $data);
						$this->session->set_flashdata('message', 'Ubah Data');
			            redirect('admin/man_member');


				}


	}

	public function hapus_member()
	{
	    $id_user = $this->uri->segment('3');
	    $this->db->query("Delete from mst_member WHERE id_member='$id_user'");
		$this->session->set_flashdata('message', 'Hapus Data');
		redirect('admin/man_member');
	}
	
	public function hapus_user()
	{
	    $id_user = $this->uri->segment('3');
	    $this->db->query("Delete from mst_user WHERE id_user='$id_user'");
		$this->session->set_flashdata('message', 'Hapus Data');
		redirect('admin/man_user');
	}
	
}
