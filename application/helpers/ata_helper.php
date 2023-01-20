<?php

function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
		redirect('auth');
	}
}

function is_admin()
{
	$ci = get_instance();
	$nama = $ci->session->userdata('nama');
	$ci->db->get_where('mst_user', ['nama' => $nama])->row_array();
	
}

function is_user()
{
	$ci = get_instance();
	$email = $ci->session->userdata('email');
	$ci->db->get_where('mst_member', ['email' => $email])->row_array();
	
}

