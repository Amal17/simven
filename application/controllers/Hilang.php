<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Hilang extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('m_penempatan');
		$this->load->model('m_notif');
 	}

 	public function index()
 	{
		$angka = $this->m_notif->Angka();
    	$notif = $this->m_notif->GetAll();

 		$data = $this->m_penempatan->GetAllHilang();
 		$dataBarang = $this->m_penempatan->GetBarang();

		$this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/hilang', array('data' => $data, 'dataBarang' => $dataBarang));
 		$this->load->view('atribut/FooterAdmin');
 	}

 	public function tambah(){
	    $id_barang = $this -> input -> post('nama_barang');
	    $jumlah = $this -> input -> post('jumlah');

	    //Periksa barang di gudang
	    $dataGudang = $this->m_penempatan->periksa($id_barang, 1);

	    //Jika barang ada, periksa jumlah yang akan keluar, kemudian update jumlah
	    if (isset($dataGudang)) {
	    	if ($dataGudang->jumlah < $jumlah) {
	    		$this->session->set_flashdata('info', 'Jumlah barang di gudang tidak mencukupi ');
	    		redirect('Hilang');
	    	} else {
	    		//update Jumlah gudang
	    		$jumlahBaru = $dataGudang->jumlah - $jumlah;

	    		if ($jumlahBaru == 0) {
	    			//Hapus dari gudang
	    			$r = $this->m_penempatan->hapus($dataGudang->id_penempatan);

	    			if ($r == '1') {
	    				$this->session->set_flashdata('message', 'Anda berhasil hapus barang di gudang');
	    			} else {
	    				$this->session->set_flashdata('info', 'Gagal hapus barang di gudang');
	    				redirect('Hilang');
	    			}
	    		} 
	    			
    			$data = array('jumlah' => $jumlahBaru);

	    		$r = $this->m_penempatan->update($dataGudang->id_penempatan, $data);

	    		if ($r == '1') {
		    		$this->session->set_flashdata('message', 'Anda berhasil update jumlah barang di gudang');

		    		//Cek di ruangan apakah sudah ada barangnya
				    $dataBarang = $this->m_penempatan->periksa($id_barang, '3');

				    //Jika barang sudah ada diruangan, update jumlah barang
				    if (isset($dataBarang)) {
				    	$jumlahAkhir = $dataBarang->jumlah + $jumlah;

				    	$dataJumlah = array('jumlah' => $jumlahAkhir);

				    	$r = $this->m_penempatan->updateJumlah($dataBarang->id_penempatan, $dataJumlah);

				    	if ($r == '1') {
				    		$this->session->set_flashdata('message', 'Anda berhasil update jumlah barang di ruangan');
				    	} else {
				    		$this->session->set_flashdata('info', 'Gagal update jumlah barang di ruangan '.$r);
				    		redirect('Hilang');
				    	}
				    } else {
				    	//Jika tidak ada, buat penempatan Baru
				    	$data = array(
				    			'id_barang' => $id_barang,
				    			'id_ruang' => '3',
				    			'jumlah' => $jumlah
				    		);

				    	$r = $this->m_penempatan->insertPenempatan($data);

				    	if ($r == '1') {
				    		$this->session->set_flashdata('message', 'Anda berhasil menambakan penempatan barang baru');
				    	} else {
				    		$this->session->set_flashdata('info', 'Gagal update penempatan barang '.$r);
				    		redirect('Hilang');
				    	}
				    }
		    	} else {
		    		$this->session->set_flashdata('info', 'Gagal update jumlah barang di gudang '.$r);
		    		redirect('Hilang');
		    	}
	    	}
	    }
	    redirect('Hilang');
  	}

  
 } ?>