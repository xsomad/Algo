<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
* This is Data Model
*/
class Data_model extends CI_Model
{

	

	// json_encode(value)

	public function getMaster($postData=null)
	{
		$response = array();

     ## Read value
     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; // Rows display per page
     $columnIndex = $postData['order'][0]['column']; // Column index
     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
     $searchValue = $postData['search']['value']; // Search value

     ## Search 
     $searchQuery = "";
     if($searchValue != ''){
        $searchQuery = " (range_jam like '%".$searchValue."%' or sks  like '%".$searchValue."%' ) ";
     }

     ## Total number of records without filtering
     $this->db->select('count(*) as allcount');

     $records = $this->db->get('jam2')->result();
     $totalRecords = $records[0]->allcount;

     ## Total number of record with filtering
     $this->db->select('count(*) as allcount');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $records = $this->db->get('jam2')->result();
     $totalRecordwithFilter = $records[0]->allcount;

     
     ## Fetch records
     $this->db->select('*');
     // $this->db->select("CONCAT(' ', FirstName, LastName) AS Name");
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $this->db->order_by($columnName, $columnSortOrder);
     $this->db->limit($rowperpage, $start);
     $records = $this->db->get('jam2')->result();

     $data = array();

     $no = 1;
     foreach($records as $record ){

        $data[] = array( 
           "no"=>$no++,
           "range_jam"=>$record->range_jam,
           "sks"=>$record->sks,
           "sesi"=>$record->sesi,
           
          
           "Aksi" => "
           	<a href='#' class='badge badge-primary' data-toggle='modal' data-target='#detailAnggotaModal' data-placement='bottom' title='detail'><span class='fas fa-info'></span></a>
           	<a href='#' class='badge badge-warning' data-toggle='tooltip' data-placement='bottom' title='Edit'><span class='far fa-edit'></span></a>
           	<a href='#' class='badge badge-danger' data-toggle='tooltip' data-placement='bottom' title='Delete' onclick='return confirm('Are you sure want to delete?...');'><span class='far fa-trash-alt'></span></a>
           "
           //  <a class='btn badge-primary btn-sm tPrt' data-toggle='modal' data-target='#formModal' href='wel/wel/$record->PatientID' data-id='$record->PatientID' data-id='$record->PatientID'>Test</a></div>
           // <a href='wel/detail/$record->PatientID' class='badge badge-primary'>Detail</a>
           // <a href='wel/pdf2/$record->PatientID' class='badge badge-warning'>GS-RI</a>
           // <a href='wel/pdf3/$record->PatientID' class='badge badge-success'>SP-RI</a>
           // <a href='wel/pdf4/$record->PatientID' class='badge badge-primary'>GS-RJ</a>
        ); 
        
     }

     ## Response 
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
     );

     return $response;
	}

  public function getHariMaster($postData=null)
  {
    $response = array();

     ## Read value
     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; // Rows display per page
     $columnIndex = $postData['order'][0]['column']; // Column index
     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
     $searchValue = $postData['search']['value']; // Search value

     ## Search 
     $searchQuery = "";
     if($searchValue != ''){
        $searchQuery = " (nama like '%".$searchValue."%' ) ";
     }

     ## Total number of records without filtering
     $this->db->select('count(*) as allcount');

     $records = $this->db->get('hari')->result();
     $totalRecords = $records[0]->allcount;

     ## Total number of record with filtering
     $this->db->select('count(*) as allcount');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $records = $this->db->get('hari')->result();
     $totalRecordwithFilter = $records[0]->allcount;

     
     ## Fetch records
     $this->db->select('*');
     // $this->db->select("CONCAT(' ', FirstName, LastName) AS Name");
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $this->db->order_by($columnName, $columnSortOrder);
     $this->db->limit($rowperpage, $start);
     $records = $this->db->get('hari')->result();

     $data = array();

     $no = 1;
     foreach($records as $record ){

        $data[] = array( 
           "no"=>$no++,
           "nama"=>$record->nama,
                      
          
           "Aksi" => "
            <a href='#' class='badge badge-primary' data-toggle='modal' data-target='#detailAnggotaModal' data-placement='bottom' title='detail'><span class='fas fa-info'></span></a>
            <a href='#' class='badge badge-warning' data-toggle='tooltip' data-placement='bottom' title='Edit'><span class='far fa-edit'></span></a>
            <a href='#' class='badge badge-danger' data-toggle='tooltip' data-placement='bottom' title='Delete' onclick='return confirm('Are you sure want to delete?...');'><span class='far fa-trash-alt'></span></a>
           "
        ); 
        
     }

     ## Response 
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
     );
     

     return $response;
  }

  public function getTAMaster($postData=null)
  {
    $response = array();

     ## Read value
     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; // Rows display per page
     $columnIndex = $postData['order'][0]['column']; // Column index
     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
     $searchValue = $postData['search']['value']; // Search value

     ## Search 
     $searchQuery = "";
     if($searchValue != ''){
        $searchQuery = " (tahun like '%".$searchValue."%' ) ";
     }

     ## Total number of records without filtering
     $this->db->select('count(*) as allcount');

     $records = $this->db->get('tahun_akademik')->result();
     $totalRecords = $records[0]->allcount;

     ## Total number of record with filtering
     $this->db->select('count(*) as allcount');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $records = $this->db->get('tahun_akademik')->result();
     $totalRecordwithFilter = $records[0]->allcount;

     
     ## Fetch records
     $this->db->select('*');
     // $this->db->select("CONCAT(' ', FirstName, LastName) AS Name");
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $this->db->order_by($columnName, $columnSortOrder);
     $this->db->limit($rowperpage, $start);
     $records = $this->db->get('tahun_akademik')->result();

     $data = array();

     $no = 1;
     foreach($records as $record ){

        $data[] = array( 
           "no"=>$no++,
           "tahun"=>$record->tahun,
                      
          
           "Aksi" => "
            <a href='#' class='badge badge-primary' data-toggle='modal' data-target='#detailAnggotaModal' data-placement='bottom' title='detail'><span class='fas fa-info'></span></a>
            <a href='#' class='badge badge-warning' data-toggle='tooltip' data-placement='bottom' title='Edit'><span class='far fa-edit'></span></a>
            <a href='#' class='badge badge-danger' data-toggle='tooltip' data-placement='bottom' title='Delete' onclick='return confirm('Are you sure want to delete?...');'><span class='far fa-trash-alt'></span></a>
           "
        ); 
        
     }

     ## Response 
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
     );
     

     return $response;
  }

  public function getDosenMaster($postData=null)
  {
    $response = array();

     ## Read value
     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; // Rows display per page
     $columnIndex = $postData['order'][0]['column']; // Column index
     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
     $searchValue = $postData['search']['value']; // Search value

     ## Search 
     $searchQuery = "";
     if($searchValue != ''){
        $searchQuery = " (nip like '%".$searchValue."%' or nama  like '%".$searchValue."%' or alamat  like '%".$searchValue."%' ) ";
     }

     ## Total number of records without filtering
     $this->db->select('count(*) as allcount');

     $records = $this->db->get('guru')->result();
     $totalRecords = $records[0]->allcount;

     ## Total number of record with filtering
     $this->db->select('count(*) as allcount');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $records = $this->db->get('guru')->result();
     $totalRecordwithFilter = $records[0]->allcount;

     
     ## Fetch records
     $this->db->select('*');
     // $this->db->select("CONCAT(' ', FirstName, LastName) AS Name");
     if($searchQuery != '')
     $this->db->where($searchQuery);
     $this->db->order_by($columnName, $columnSortOrder);
     $this->db->limit($rowperpage, $start);
     $this->db->select('guru.*', 'status_dosen.kode as kd', 'status_dosen.status');
     $this->db->from('guru');
     $this->db->join('status_dosen', 'guru.status_dosen=status_dosen.kode');
     $records = $this->db->get()->result();

     $data = array();

     $no = 1;
     foreach($records as $record ){

        $data[] = array( 
           "no"=>$no++,
           "nip"=>$record->nip,
           "nama"=>$record->nama,
           "alamat"=>$record->alamat,
           "telp"=>$record->telp,
           "status_dosen"=> $record->status,
           // "status_dosen"=> if ($record->status_dosen == "1") {"11"} else {"22"
             # code...
           // },
           
           // $record->status_dosen,           
          
           "Aksi" => "
            <a href='#' class='badge badge-primary' data-toggle='modal' data-target='#detailAnggotaModal' data-placement='bottom' title='detail'><span class='fas fa-info'></span></a>
            <a href='#' class='badge badge-warning' data-toggle='tooltip' data-placement='bottom' title='Edit'><span class='far fa-edit'></span></a>
            <a href='#' class='badge badge-danger' data-toggle='tooltip' data-placement='bottom' title='Delete' onclick='return confirm('Are you sure want to delete?...');'><span class='far fa-trash-alt'></span></a>
           "
        ); 
        
     }

     ## Response 
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
     );
     

     return $response;
  }

  public function getRuangMaster($postData=null)
  {
    $response = array();

     ## Read value
     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; // Rows display per page
     $columnIndex = $postData['order'][0]['column']; // Column index
     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
     $searchValue = $postData['search']['value']; // Search value

     ## Search 
     $searchQuery = "";
     if($searchValue != ''){
        $searchQuery = " (id_ruang like '%".$searchValue."%' or nama  like '%".$searchValue."%' or kapasitas  like '%".$searchValue."%' or jenis  like '%".$searchValue."%') ";
     }

     ## Total number of records without filtering
     $this->db->select('count(*) as allcount');

     $records = $this->db->get('ruang')->result();
     $totalRecords = $records[0]->allcount;

     ## Total number of record with filtering
     $this->db->select('count(*) as allcount');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $records = $this->db->get('ruang')->result();
     $totalRecordwithFilter = $records[0]->allcount;

     
     ## Fetch records
     $this->db->select('*');
     // $this->db->select("CONCAT(' ', FirstName, LastName) AS Name");
     if($searchQuery != '')
     $this->db->where($searchQuery);
     $this->db->order_by($columnName, $columnSortOrder);
     $this->db->limit($rowperpage, $start);
     // $this->db->select('matapelajaran.*', 'prodi.kode as kprod', 'prodi.nama_prodi', 'jurusan.kode as kjus', 'jurusan.nama_jurusan');
     // $this->db->from('matapelajaran');
     // $this->db->join('prodi', 'matapelajaran.kode_prodi=prodi.kode');
     // $this->db->join('jurusan', 'prodi.kode_jurusan=jurusan.kode');
     $records = $this->db->get('ruang')->result();

     $data = array();

     $no = 1;
     foreach($records as $record ){

        $data[] = array( 
           "no"=>$no++,
           "id_ruang"=>$record->id_ruang,
           "nama"=>$record->nama,
           "kapasitas"=>$record->kapasitas,
           "jenis"=>$record->jenis,
                     
          
           "Aksi" => "
            <a href='#' class='badge badge-primary' data-toggle='modal' data-target='#detailAnggotaModal' data-placement='bottom' title='detail'><span class='fas fa-info'></span></a>
            <a href='#' class='badge badge-warning' data-toggle='tooltip' data-placement='bottom' title='Edit'><span class='far fa-edit'></span></a>
            <a href='#' class='badge badge-danger' data-toggle='tooltip' data-placement='bottom' title='Delete' onclick='return confirm('Are you sure want to delete?...');'><span class='far fa-trash-alt'></span></a>
           "
        ); 
        
     }

     ## Response 
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
     );
     

     return $response;
  }






}