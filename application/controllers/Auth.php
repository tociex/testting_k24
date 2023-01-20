<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Makassar');

class Auth extends CI_Controller
{
    public function index()
    {
        
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/index');
        } else {

            $akses= $this->input->post('form_select');

            if($akses=='0'){

              $name = $this->input->post('name');
              $password = $this->input->post('password');
              $user = $this->db->get_where('mst_user', array('nama' => $name))->row_array();

                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                        'level' => 'admin'
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', 'Login');
                    redirect('admin');
                
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password salah</div>');
                    redirect('auth/index');
                }

            }else{

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->db->get_where('mst_member', array('email' => $email))->row_array();
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_member'],
                        'email' => $user['email'],
                        'level' => 'member'
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', 'Login');
                        redirect('user');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password salah</div>');
                    redirect('auth/index');
                }
         


            }
            

        }
    }


    public function register()
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
    
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
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

                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $user = $this->db->get_where('mst_member', array('email' => $email))->row_array();
   
                   $datasesi = [
                        'id_user' => $user['id_member'],
                        'email' => $user['email'],
                        'level' => 'member'
                    ];
                    $this->session->set_userdata($datasesi);
                    $this->session->set_flashdata('message', 'Login');
                    redirect('user');
                    
                }else{

                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', 'Eror Save Data');
                        
                    redirect('auth/register');


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
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $user = $this->db->get_where('mst_member', array('email' => $email))->row_array();
                $datasesi = [
                        'id_user' => $user['id_member'],
                        'email' => $user['email'],
                        'level' => 'member'
                    ];
                    $this->session->set_userdata($datasesi);
                    $this->session->set_flashdata('message', 'Login');
                        redirect('user');

            }


         }
    }

    public function reset(){
        $data['title'] = 'Reset Password';

        $this->load->view('auth/reset', $data);
    }
    public function do_reset(){
            $email = $this->input->post('email');
            $nik = $this->input->post('nik');

            $query = $this->db->query("SELECT * FROM mst_user WHERE nik = '$nik' AND email = '$email' ");
           
            if ($query->num_rows() > 0 )  {
                $pass = password_hash($email, PASSWORD_DEFAULT);
                $this->db->query("UPDATE mst_user SET password = '$pass' WHERE nik ='$nik' and email ='$email' ");
                $this->session->set_flashdata('message',"Reset Password");
                redirect('Auth');
            } else {
                 $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">Data Tidak Cocok</div>');
                 redirect('Auth/reset');
            }
    }

    public function blocked()
    {
        $data['title'] = 'Access Forbidden';
        $data['user'] = $this->db->get_where('mst_user', ['level' => $this->session->userdata('level')])->row_array();
        $this->load->view('auth/blocked', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', 'Logout');
        redirect('auth/index');
    }



    public function list_member(){
       
        $data_member= $this->db->get_where('mst_member')->result();
        $data = json_encode($data_member, true);
        echo "<pre>";
        print_r ($data);
        echo "</pre>";
    }
}
