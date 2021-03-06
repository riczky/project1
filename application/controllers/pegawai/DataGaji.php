<?php

class DataGaji extends CI_Controller{

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
    $data['title'] = "Data Gaji";
    $nik = $this->session->userdata('nik');
    // var_dump($nik);
    // die;
    $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
    $data['gaji'] = $this->db->query("SELECT data_pegawai.nama_pegawai, data_pegawai.nik, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_kehadiran.alpha, data_kehadiran.bulan, data_kehadiran.id_kehadiran FROM data_pegawai INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan WHERE data_kehadiran.nik='$nik' ORDER BY data_kehadiran.bulan DESC")->result();
    // var_dump($data);
    // die;

    // $this->load->view('templates_pegawai/header', $data);
    // $this->load->view('templates_pegawai/sidebar');
    // $this->load->view('pegawai/dataGaji', $data);
    // $this->load->view('templates_pegawai/footer');


    $this->template->load('template_pegawai', 'pegawai/dataGaji', $data);
  }

  public function cetakSlip($id){
    $data['title'] = "Cetak Slip Gaji";
    $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
    
    $data['print_slip'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_kehadiran.alpha, data_kehadiran.bulan FROM data_pegawai INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan WHERE data_kehadiran.id_kehadiran='$id'")->result();

    // var_dump($data);
    // die;

    // $this->load->view('templates_pegawai/header', $data);
    // $this->load->view('pegawai/cetakSlipGaji', $data);

    $this->template->load('template_pegawai', 'pegawai/cetakSlipGaji', $data);
  }


}