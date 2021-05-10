<?php

 class LaporanAbsensi extends CI_Controller{

 public function __construct(){
    
    parent::__construct();
    
    if($this->session->userdata('hak_akses') != '1'){
      $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><i class="icon fa fa-check"></i><strong>Anda Belum Login.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>');  

      redirect('welcome');
    }
  }

  public function index(){
    $data['title'] = "Laporan Absensi";
    // $this->load->view('templates_admin/header', $data);
    // $this->load->view('templates_admin/sidebar');
    // $this->load->view('admin/filterLaporanAbsensi');
    // $this->load->view('templates_admin/footer');

    $this->template->load('template', 'admin/filterLaporanAbsensi', $data);
  }

  public function cetakLaporanAbsensi(){
    $data['title'] = "Cetak Laporan Absensi";
    
    // if((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')){
    //   $bulan = $_GET['bulan'];
    //   $tahun = $_GET['tahun'];
    //   $bulanTahun = $bulan.$tahun;
    // }
    // else{
    //   $bulan = date('m');
    //   $tahun = date('Y');
    //   $bulanTahun = $bulan.$tahun;
    // }

    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $bulanTahun = $bulan.$tahun;

    $data['lap_kehadiran'] = $this->db->query("SELECT * FROM data_kehadiran WHERE bulan='$bulanTahun' AND data_kehadiran.bulan='$bulanTahun' ORDER BY nama_pegawai ASC")->result();
    // $this->load->view('templates_admin/header', $data);
    // $this->load->view('admin/cetakLaporanAbsensi');
  
    $this->template->load('template', 'admin/cetakLaporanAbsensi', $data);
  }


}