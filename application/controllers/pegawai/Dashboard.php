<?php

class Dashboard extends CI_Controller{

  public function __construct(){
    parent::__construct();
    
    if($this->session->userdata('hak_akses') != '2'){
      $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><i class="icon fa fa-check"></i><strong>Anda Belum Login.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>');      
      redirect('welcome');
    }
  }

  public function index(){
    $data['title'] = "Dashboard";
    $id = $this->session->userdata('id_pegawai');
    $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();
    // var_dump($data);
    // die;
    
    // $this->load->view('templates_pegawai/header', $data);
    // $this->load->view('templates_pegawai/sidebar');
    // $this->load->view('pegawai/dashboard', $data);
    // $this->load->view('templates_pegawai/footer');


    $this->template->load('template_pegawai', 'pegawai/dashboard', $data);
  }
}