<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Export extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('m_export');
 	}

 	

 	public function export()
 	{
 		$stmt = $this->m_export->getAll();


 		$columnHeader ='';
		$columnHeader = "Id Barang"."\t"."Nama Barang"."\t"."Nama Pemasok"."\t"."Tanggal Beli"."\t"."Stok"."\t"."Harga Satuan"."\t"."Harga Total"."\t";


		$setData='';

		foreach($stmt->result_array() as $rec)
		{
		  $rowData = '';
		  foreach($rec as $value)
		  {
		    $value = '"' . $value . '"' . "\t";
		    $rowData .= $value;
		  }
		  $setData .= trim($rowData)."\n";
		}


		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=Rekap Data Barang.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		echo ucwords($columnHeader)."\n".$setData."\n";
 	}

 } ?>