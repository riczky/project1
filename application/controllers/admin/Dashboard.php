<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
    
    parent::__construct();
    
    if($this->session->userdata('hak_akses') != '1'){
      $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><i class="icon fa fa-check"></i><strong>Anda Belum Login.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>');  

      redirect('welcome');
    }
  }



	public function index()
	{
		// Check jika tidak ada user id
		// check_not_login();

		$data['title'] = 'Dashboard';
		$pegawai = $this->db->query('SELECT * FROM data_pegawai');
		$admin = $this->db->query('SELECT * FROM data_pegawai WHERE jabatan = "Admin"');
		$jabatan = $this->db->query('SELECT * FROM data_jabatan');	
		$data['pegawai'] = $pegawai->num_rows();
		$data['admin'] = $admin->num_rows();
		$data['jabatan'] = $jabatan->num_rows();
	
		$this->template->load('template', 'admin/dashboard', $data);
	}
	
}
