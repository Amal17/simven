<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Rusak extends CI_Controller
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

 		$data = $this->m_penempatan->GetAllRusak();
 		$dataBarang = $this->m_penempatan->GetBarang();

		$this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/rusak', array('data' => $data, 'dataBarang' => $dataBarang));
 		$this->load->view('atribut/FooterAdmin');
 	}

 	public function tambah(){
	    $id_barang = $this -> input -> post('nama_barang');
	    $jumlah = $this -> input -> post('jumlah');

	    //Periksa barang di gudang
	    $dataGudang = $this->m_penempatan->periksa($id_barang, 1);

	    //Jika barang ada, periksa jumlah yang akan keluar, kemudian update jumlah
	    if (isset($dataGudang)) {;
	    	if ($dataGudang->jumlah < $jumlah) {
	    		$this->session->set_flashdata('info', 'Jumlah barang di gudang tidak mencukupi ');
	    		redirect('Rusak');
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
	    				redirect('Rusak');
	    			}
	    		} 
	    			
    			$data = array('jumlah' => $jumlahBaru);

	    		$r = $this->m_penempatan->update($dataGudang->id_penempatan, $data);

	    		if ($r == '1') {
		    		$this->session->set_flashdata('message', 'Anda berhasil update jumlah barang di gudang');

		    		//Cek di ruangan apakah sudah ada barangnya
				    $dataBarang = $this->m_penempatan->periksa($id_barang, '2');

				    //Jika barang sudah ada diruangan, update jumlah barang
				    if (isset($dataBarang)) {
				    	$jumlahAkhir = $dataBarang->jumlah + $jumlah;

				    	$dataJumlah = array('jumlah' => $jumlahAkhir);

				    	$r = $this->m_penempatan->updateJumlah($dataBarang->id_penempatan, $dataJumlah);

				    	if ($r == '1') {
				    		$this->session->set_flashdata('message', 'Anda berhasil update jumlah barang di ruangan');
				    	} else {
				    		$this->session->set_flashdata('info', 'Gagal update jumlah barang di ruangan '.$r);
				    		redirect('Rusak');
				    	}
				    } else {
				    	//Jika tidak ada, buat penempatan Baru
				    	$data = array(
				    			'id_barang' => $id_barang,
				    			'id_ruang' => '2',
				    			'jumlah' => $jumlah
				    		);

				    	$r = $this->m_penempatan->insertPenempatan($data);

				    	if ($r == '1') {
				    		$this->session->set_flashdata('message', 'Anda berhasil menambakan penempatan barang baru');
				    	} else {
				    		$this->session->set_flashdata('info', 'Gagal update penempatan barang '.$r);
				    		redirect('Rusak');
				    	}
				    }
		    	} else {
		    		$this->session->set_flashdata('info', 'Gagal update jumlah barang di gudang '.$r);
		    		redirect('Rusak');
		    	}
	    	}
	    }
	    redirect('Rusak');
  	}

  	public function hapus(){
		$id_penempatan = $this-> input -> post('id_penempatan');
		$id_barang = $this-> input -> post('id_barang');
  		$jumlah = $this->input->post('jumlah');
  		$jumlahKeluar = $this->input->post('jumlah_keluar');

  		
		if ($jumlah - $jumlahKeluar ==  0) {
			//Hapus dari ruang
			$r = $this->m_penempatan->hapus($id_penempatan);

			if ($r == '1') {
				$this->session->set_flashdata('message', 'Anda berhasil hapus barang di ruang');
			} else {
				$this->session->set_flashdata('info', 'Gagal hapus barang di ruang');
				redirect('Rusak');
			}
		} else {
			//Jika tidak habis, update jumlah barang di ruangan
			$data = array('jumlah' => $jumlah - $jumlahKeluar);

			$r = $this->m_penempatan->update($id_penempatan, $data);

			if ($r == '1') {
				$this->session->set_flashdata('message', 'Anda berhasil update barang di ruang');
			} else {
				$this->session->set_flashdata('info', 'Gagal update barang di ruang');
				redirect('Rusak');
			}
		}
    		
    	//Proses di gudang
    	$dataGudang = $this->m_penempatan->periksa($id_barang, 1);

    	//Jika ada update jumlah
    	if (isset($dataGudang)) {
    		$data = array('jumlah' => $dataGudang->jumlah + $jumlahKeluar);

    		$r = $this->m_penempatan->update($dataGudang->id_penempatan, $data);	

    		if ($r == '1') {
				$this->session->set_flashdata('message', 'Anda berhasil update barang di gudang');
			} else {
				$this->session->set_flashdata('info', 'Gagal update barang di gudang');
				redirect('Rusak');
			}
    	} else {
    		//Kalau tidak ada, buat penempatan baru
    		$data = array(
		    			'id_barang' => $id_barang,
		    			'id_ruang' => '1',
		    			'jumlah' => $jumlahKeluar
		    		);

	    	$r = $this->m_penempatan->insertPenempatan($data);

	    	if ($r == '1') {
	    		$this->session->set_flashdata('message', 'Anda berhasil mengembalikan barang ke Gudang');
	    	} else {
	    		$this->session->set_flashdata('info', 'Gagal insert penempatan barang di gudang'.$r);
	    		redirect('Penempatan');
	    	}
    	}
	    redirect('Rusak');
  	}
 } ?>