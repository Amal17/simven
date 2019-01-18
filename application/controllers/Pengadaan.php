<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Pengadaan extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this -> load -> model('m_pengadaan');
		$this->load->model('m_notif');
		$this->load->model('m_barcode');
 	}

 	public function index()
 	{
		$angka = $this->m_notif->Angka();
    	$notif = $this->m_notif->GetAll();

 		$data = $this->m_pengadaan->getAll();
 		$dataBarang = $this->m_pengadaan->getBarang();
 		$dataPemasok = $this->m_pengadaan->getPemasok();
 		
		$this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/Pengadaan', array('data' => $data, 'dataBarang' => $dataBarang, 'dataPemasok' => $dataPemasok));
 		$this->load->view('atribut/FooterAdmin');
 	}

 	public function tambah(){
 		$id_barang = $this -> input -> post('id_barang');
	    $id_jenisbarang = $this -> input -> post('id_jenisbarang');
	    $tanggal_beli = $this -> input -> post('tanggal_beli');	    
	    $stok = $this -> input -> post('stok');
	    $id_pemasok = $this -> input -> post('id_pemasok');
	    $harga_satuan = $this -> input -> post('harga_satuan');
	    $harga_satuan= str_replace(".", "", $harga_satuan);
	    $harga_total = $stok * $harga_satuan;
    
	    $data = array(
	    	'id_barang' => $id_barang,
	        'id_jenisbarang' => $id_jenisbarang,
	        'tanggal_beli' => $tanggal_beli,
	        'stok' => $stok,
	        'id_pemasok' => $id_pemasok,
	        'harga_satuan' => $harga_satuan,
	        'harga_total' => $harga_total
	        );

	    $r = $this -> m_pengadaan -> insertPengadaan($data);

		if ($r == '1') {
			$Jumlah = $this->m_pengadaan->Jumlah($id_jenisbarang);
			$dataJumlah = array('jumlah' => $Jumlah->jumlah);

			$result = $this->m_pengadaan->updateJumlah($id_jenisbarang, $dataJumlah);

			if ($result == '1') {
			 	$this->session->set_flashdata('message', 'Anda berhasil update jumlah barang');
			} else {
				$this->session->set_flashdata('info', 'Gagal Update Jumlah Barang');
			}

			$q = $this->m_pengadaan->periksaGudang($id_jenisbarang);

			if (isset($q)) {
				$dataGudang = array('jumlah' => $stok + $q->jumlah);

				$w = $this->m_pengadaan->updateGudang($q->id_penempatan, $dataGudang);

				if ($w == '1') {
					$this->session->set_flashdata('message', 'Anda berhasil update Gudang');
				} else {
					$this->session->set_flashdata('info', 'Gagal Update Gudang');
				}
			} else {
				$dataGudang = array(
					'id_barang' => $id_jenisbarang,
					'id_ruang' => '1',
					'jumlah' => $stok
					);

				$w = $this->m_pengadaan->insertGudang($dataGudang);

				if ($w == '1') {
					$this->session->set_flashdata('message', 'Anda Berhasil Menambahkan Barang Baru');
				} else {
					$this->session->set_flashdata('info', 'Gagal insert Gudang');
				}
			}
		} else {
			$this->session->set_flashdata('info', 'Gagal Menambahkan Pengadaan');
		}
	   
	    redirect('Pengadaan');
  	}

  	public function ubah(){
		$id_barang = $this -> input -> post('id_barang');
	    $id_jenisbarang = $this -> input -> post('id_jenisbarang');
	    $tanggal_beli = $this -> input -> post('tanggal_beli');	    
	    $stok = $this -> input -> post('stok');
	    $harga_satuan = $this -> input -> post('harga_satuan');
	    $harga_total = $stok * $harga_satuan;
    
	    $data = array(
	    	'id_barang' => $id_barang,
	        'id_jenisbarang' => $id_jenisbarang,
	        'tanggal_beli' => $tanggal_beli,
	        'stok' => $stok,
	        'harga_satuan' => $harga_satuan,
	        'harga_total' => $harga_total
	        );

		$r = $this -> m_pengadaan -> updatePengadaan($id_barang, $data);

		if ($r == '1'){
			$this->session->set_flashdata('message', 'Anda Berhasil Update Pengadaan');
			redirect('Pengadaan');
		} else {
			$this->session->set_flashdata('info', 'Gagal Mengupdate Pengadaan '.$r);
			redirect('Pengadaan');
		}
	}

	public function barcode($id)
	{
		$this->m_barcode->GetBarcode();
		$kolom = 5;  // jumlah kolom
		$copy = 1; // jumlah copy barcode
		$counter = 1;
		// sql query ke database
		echo"
		<table cellpadding='10'>";
		for ($ucopy=1; $ucopy<=$copy; $ucopy++) {
		if (($counter-1) % $kolom == '0') { echo "
		<tr>"; }
		echo"
		<td class='merk'>";
		echo bar128(stripslashes('Arema Singo'));
		echo "</td>
		";
		if ($counter % $kolom == '0') { echo "</tr>
		"; }
		$counter++;
		}
		echo "</table>
		";
	}
} ?>