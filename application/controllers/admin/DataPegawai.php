<?php

class DataPegawai extends CI_Controller{

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
    $data['title'] = "Data Pegawai";
    $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();    

    $this->template->load('template', 'admin/dataPegawai', $data);
  }

  public function tambahData(){
    $data['title'] = "Tambah Data Pegawai";
    $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
    $this->template->load('template', 'admin/formTambahPegawai', $data);
  }

  public function tambahDataAksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->tambahData();
    }
    else{
      $nik           = $this->input->post('nik');
      $nama_pegawai  = $this->input->post('nama_pegawai');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $tanggal_masuk = $this->input->post('tanggal_masuk');
      $jabatan       = $this->input->post('jabatan');
      $status        = $this->input->post('status');
      $hak_akses     = $this->input->post('hak_akses');
      $username      = $this->input->post('username');
      $password      = md5($this->input->post('password'));
      $photo         = $_FILES['photo']['name'];
      if($photo = ''){
      }
      else{
        $config['upload_path'] = './assets/photo';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('photo')){
          echo "Photo gagal diupload!";
        }
        else{
          $photo = $this->upload->data('file_name');
        }
      }

      $data = array(
        'nik' => $nik,
        'nama_pegawai'  => $nama_pegawai,
        'jenis_kelamin' => $jenis_kelamin,
        'jabatan'       => $jabatan,
        'tanggal_masuk' => $tanggal_masuk,
        'status'        => $status,
        'hak_akses'     => $hak_akses,
        'username'      => $username,
        'password'      => $password,
        'photo'         => $photo,
      );

      $this->penggajianModel->insert_data($data, 'data_pegawai');
      if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'Data pegawai berhasil disimpan');
        }
      redirect('admin/dataPegawai');
    }
  }

  public function updateData($id){
    $where = array('id_pegawai' => $id);
    $data['title'] = "Update Data Pegawai";
    $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
    $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai = '$id'")->result();
     $this->template->load('template', 'admin/formUpdatePegawai', $data);
  }

  public function updateDataAksi(){
    // echo "disini";
    // die;
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $id = $this->input->post('id_pegawai');
      $this->updateData($id);
    }
    else{
      $id            = $this->input->post('id_pegawai');
      $nik           = $this->input->post('nik');
      $nama_pegawai  = $this->input->post('nama_pegawai');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $tanggal_masuk = $this->input->post('tanggal_masuk');
      $jabatan       = $this->input->post('jabatan');
      $status        = $this->input->post('status');
      $hak_akses     = $this->input->post('hak_akses');
      $username      = $this->input->post('username');
      $password      = md5($this->input->post('password'));
      $photo         = $_FILES['photo']['name'];
      if($photo){
        $config['upload_path'] = './assets/photo';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('photo')){
          $photo = $this->upload->data('file_name');
          $this->db->set('photo', $photo);
        }
        else{
          echo $this->upload->display_errors();
        }
      }

      $data = array(
        'nik'           => $nik,
        'nama_pegawai'  => $nama_pegawai,
        'jenis_kelamin' => $jenis_kelamin,
        'jabatan'       => $jabatan,
        'tanggal_masuk' => $tanggal_masuk,
        'status'        => $status,
        'hak_akses'     => $hak_akses,
        'username'      => $username,
        'password'      => $password,
      );

      $where = array('id_pegawai' => $id);

      $this->penggajianModel->update_data('data_pegawai', $data, $where);
       if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'Data pegawai berhasil di update');
        }
      redirect('admin/dataPegawai');
    }
  }

  public function deleteData($id){
    $where = array('id_pegawai' => $id);
    $this->penggajianModel->delete_data($where, 'data_pegawai');
    if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'Data pegawai berhasil dihapus');
        }
      redirect('admin/dataPegawai');
  }

  public function _rules(){
    $this->form_validation->set_rules('nik', 'NIK', 'required');
    $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');
  }


}