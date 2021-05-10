<?php

class DataJabatan extends CI_Controller{

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
    $data['title'] = "Data Jabatan";
    $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
    $this->template->load('template', 'admin/dataJabatan', $data);
  }
  
  public function tambahData(){
    $data['title'] = "Tambah Data Jabatan";
    
    $this->template->load('template', 'admin/tambahDataJabatan', $data);
  }

  public function tambahDataAksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->tambahData();
    }
    else{
      $nama_jabatan = $this->input->post('nama_jabatan');
      $gaji_pokok = $this->input->post('gaji_pokok');
      $tj_transport = $this->input->post('tj_transport');
      $uang_makan = $this->input->post('uang_makan');

      $data = array(
        'nama_jabatan' => $nama_jabatan,
        'gaji_pokok' => $gaji_pokok,
        'tj_transport' => $tj_transport,
        'uang_makan' => $uang_makan,
      );

      $this->penggajianModel->insert_data($data, 'data_jabatan');
       if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'Data jabatan berhasil disimpan');
        }
      redirect('admin/dataJabatan');
    }
  }

  public function updateData($id){
    $where = array('id_jabatan' => $id);
    $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan = '$id'")->result();
    $data['title'] = "Update Data Jabatan";

    $this->template->load('template', 'admin/updateDataJabatan', $data);
  }

  public function updateDataAksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $id = $this->insert->post('id_jabatan');
      $this->updateData($id);
    }
    else{
      $id           = $this->input->post('id_jabatan');
      $nama_jabatan = $this->input->post('nama_jabatan');
      $gaji_pokok   = $this->input->post('gaji_pokok');
      $tj_transport = $this->input->post('tj_transport');
      $uang_makan   = $this->input->post('uang_makan');

      $data = array(
        'nama_jabatan' => $nama_jabatan,
        'gaji_pokok'   => $gaji_pokok,
        'tj_transport' => $tj_transport,
        'uang_makan'   => $uang_makan,
      );

      $where = array(
        'id_jabatan' => $id
      );

      $this->penggajianModel->update_data('data_jabatan', $data, $where);
      if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'Data jabatan berhasil di update');
        }
      redirect('admin/dataJabatan');
    }
  }

  public function deleteData($id){
    $where = array('id_jabatan' => $id);
    $this->penggajianModel->delete_data($where, 'data_jabatan');
    if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'Data jabatan berhasil dihapus');
        }
      redirect('admin/dataJabatan');
  }

  public function _rules(){
    $this->form_validation->set_rules('nama_jabatan', 'Nama jabatan', 'required');
    $this->form_validation->set_rules('gaji_pokok', 'Gaji pokok', 'required');
    $this->form_validation->set_rules('tj_transport', 'Tunjangan transport', 'required');
    $this->form_validation->set_rules('uang_makan', 'Uang makan', 'required');
  }




}