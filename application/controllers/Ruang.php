<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Ruang extends MY_Controller
 {
  
  function __construct()
  {
    parent::__construct();
    $this->cekLogin();
      //validasi jika session dengan level karyawan mengakses halaman ini maka akan dialihkan ke halaman karyawan
      if ($this->session->userdata('level') == "karyawan") {
        redirect('Karyawan/Karyawan');
      }
    $this->load->model('m_ruang');
    $this->load->model('m_notif');
  }

  public function index()
  {
    $angka = $this->m_notif->Angka();
    $notif = $this->m_notif->GetAll();

    $data = $this->m_ruang->GetAll();

    $dataGedung = $this->m_ruang->GetGedung();
    unset($dataGedung[0]);

    $this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
    $this->load->view('Admin/Ruang', array('data' => $data, 'dataGedung' => $dataGedung));
    $this->load->view('atribut/FooterAdmin');
  }

  public function tambah(){
    $id_gedung = $this -> input -> post('nama_gedung');
    $nama_ruang = $this -> input -> post('nama_ruang');
    
    $r = $this->m_ruang->periksaRuang($id_gedung, $nama_ruang);

    if (count($r) == '0') {
      $data = array(
        'id_gedung' => $id_gedung,
        'nama_ruang' => $nama_ruang
      );

      $result = $this -> m_ruang -> insertRuang($data);

      if ($result == '1') {
        $this->session->set_flashdata('message', 'Anda berhasil menginput data Ruang');  
      } else {
        $this->session->set_flashdata('info', 'Gagal Input Data Ruang '.$result);
      }
    } else {
      $this->session->set_flashdata('info', 'Ruangan Sudah Ada, Atau Nama Ruangan Sama. Ganti Nama Ruangan Untuk Melanjutkan');
    }
    
    redirect('Ruang');
  }

  public function ubah(){
    $id_ruang = $this -> input -> post('id_ruang');
    $id_gedung = $this -> input -> post('id_gedung');
    $nama_ruang = $this -> input -> post('nama_ruang');

    // if ($dataRuang->nama_ruang == $nama_ruang) {
    //   $this->session->set_flashdata('info', 'Ruangan Sudah Ada, Atau Nama Ruangan Sama. Ganti Nama Ruangan Untuk Melanjutkan');
    //   redirect('Ruang');
    // }

      $data = array(
      'nama_ruang' => $nama_ruang
      );

      $result = $this -> m_ruang -> updateRuang($id_ruang, $data);
    
      $result = '1';
      if ($result == '1') {
        $this->session->set_flashdata('message', 'Anda berhasil mengubah data Ruang');
      }else{
        $this->session->set_flashdata('info', 'Data tidak berhasil diubah | '.$result);
      }

    redirect('Ruang');
  }

  public function hapus(){
    $id_ruang = $this -> input -> post('id_ruang');

    $r = $this->m_ruang->periksaRuang1($id_ruang);

    if (count($r) == '0') {
      $result = $this -> m_ruang -> deleteRuang($id_ruang);

      if ($result == '1') {
        $this->session->set_flashdata('message', 'Anda berhasil menghapus data Ruang');      
      } else {
        $this->session->set_flashdata('info', 'Gagal Delete Data Ruang '.$result);
      }
    } else {
      $this->session->set_flashdata('info', 'Tidak Bisa Menghapus Data Ruang Terkait Penempatan Barang. Kosongkan Ruangan Terlebih Dahulu');
    }
    
    redirect('Ruang');
  }

 } ?>