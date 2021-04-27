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






}