<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Gedung extends MY_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->cekLogin();
	    //validasi jika session dengan level karyawan mengakses halaman ini maka akan dialihkan ke halaman karyawan
	    if ($this->session->userdata('level') == "karyawan") {
	      redirect('Karyawan/Karyawan');
	    }
 		$this->load->model('m_gedung');
		$this->load->model('m_notif');
 	}

 	public function index()
 	{
		$angka = $this->m_notif->Angka();
		$notif = $this->m_notif->GetAll();
 		
 		$data = $this->m_gedung->GetAll();
		
 		$this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
		$this->load->view('Admin/Gedung', array('data' => $data));
 		$this->load->view('atribut/FooterAdmin');
 	}

 	public function tambah(){
		$nama_gedung = $this -> input -> post('nama_gedung');

		$dataGedung = $this->m_gedung->GetGedung($nama_gedung);

		if (count($dataGedung) == '0') {
			$data = array(
			'nama_gedung' => $nama_gedung
			);

			$result = $this -> m_gedung -> insertGedung($data);

			if ($result == '1') {
				$this->session->set_flashdata('message', 'Anda berhasil menginput data Gedung');
				redirect('Gedung');
			}else{
				$this->session->set_flashdata('info', 'Data tidak berhasil di inputkan | '.$result);
				redirect('Gedung');
			}
		} else {
			$this->session->set_flashdata('info', 'Gedung Sudah Ada atau Nama Gedung Sama, Coba Dengan Nama Lain');
			redirect('Gedung'); 
		}

 	}

 	public function ubah(){
 		$id_gedung = $this -> input -> post('id_gedung');
		$nama_gedung = $this -> input -> post('nama_gedung');

		$data = array(
		'nama_gedung' => $nama_gedung
		);

		$result = $this -> m_gedung -> updateGedung($id_gedung, $data);

		if ($result == '1') {
			$this->session->set_flashdata('message', 'Anda berhasil mengubah data Gedung');
			redirect('Gedung');
		}else{
			$this->session->set_flashdata('info', 'Data tidak berhasil diubah | '.$result);
			redirect('Gedung');
		}
		
 	}

 	public function hapus(){
 		$id_gedung = $this -> input -> post('id_gedung');
		
		$r = $this->m_gedung->periksaGedung($id_gedung);
		
		if (count($r) == '0'){
			$result = $this -> m_gedung -> deleteGedung($id_gedung);

			if ($result == '1') {
				$this->session->set_flashdata('message', 'Anda berhasil menghapus data Gedung');
	 			redirect("Gedung");	
			}else{
				$this->session->set_flashdata('info', 'Data tidak berhasil dihapus | '.$result);
				redirect('Gedung');
			}
		}else{
			$this->session->set_flashdata('info', 'Gedung Tidak Kosong. Hapus Semua Ruangan Pada Gedung Sebelum Menghapus Gedung');
			redirect('Gedung');	
		}	
 	}
 } ?>