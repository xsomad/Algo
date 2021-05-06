

$(document).ready(function(){
	$('#hariTable').DataTable ({
        'processing' : true,
        'serverSide' : true,
        'serverMethod' : 'post',
        'ajax' : {
            
            type : "POST",
            url:"hariList"

        },
        'columns' : [
        { data: null,"sortable": false, render: function (data, type, row, meta){
           return meta.row + meta.settings._iDisplayStart + 1;
       }   },
       { data: 'nama' },
       
       { data : 'Aksi'},
       ]
   });

 $('#jamTable').DataTable ({
    'processing' : true,
    'serverSide' : true,
    'serverMethod' : 'post',
    'ajax' : {
        
        type : "POST",
        url:"jamList"

    },
    'columns' : [
    { data: null,"sortable": false, render: function (data, type, row, meta){
       return meta.row + meta.settings._iDisplayStart + 1;
   }   },
   { data: 'range_jam' },
                // { data : 'sks' },
                // { data : 'sesi' },
                
                { data : 'Aksi'},
                ]
            }); 

 $('#taTable').DataTable ({
    'processing' : true,
    'serverSide' : true,
    'serverMethod' : 'post',
    'ajax' : {
        
        type : "POST",
        url:"taList"

    },
    'columns' : [
    { data: null,"sortable": false, render: function (data, type, row, meta){
       return meta.row + meta.settings._iDisplayStart + 1;
   }   },
   { data: 'tahun' },
   { data : 'Aksi'},
   ]
});

 $('#dosenTable').DataTable ({
    'processing' : true,
    'serverSide' : true,
    'serverMethod' : 'post',
    'ajax' : {
        
        type : "POST",
        url:"dosenList"

    },
    'columns' : [
    { data: null,"sortable": false, render: function (data, type, row, meta){
       return meta.row + meta.settings._iDisplayStart + 1;
   }   },
   { data: 'nip' },
   { data: 'nama' },
   { data: 'alamat' },
   { data: 'telp' },
   { data: 'status_dosen' },
   { data: 'Aksi'},
   ]
});

 $('#ruangTable').DataTable ({
    'processing' : true,
    'serverSide' : true,
    'serverMethod' : 'post',
    'ajax' : {
        
        type : "POST",
        url:"ruangList"

    },
    'columns' : [
    { data: null,"sortable": false, render: function (data, type, row, meta){
       return meta.row + meta.settings._iDisplayStart + 1;
   }   },
   { data: 'id_ruang' },
   { data: 'nama' },
   { data: 'kapasitas' },
   { data: 'type' },
   { data: 'id_jenis' },
   { data : 'Aksi'},
   ]
});

 $('#jenisruangTable').DataTable ({
    'processing' : true,
    'serverSide' : true,
    'serverMethod' : 'post',
    'ajax' : {
        
        type : "POST",
        url:"jenisruangList"

    },
    'columns' : [
    { data: null,"sortable": false, render: function (data, type, row, meta){
       return meta.row + meta.settings._iDisplayStart + 1;
   }   },
   { data: 'nama_jenis' },
   { data: 'ket_jenis' },
   { data : 'Aksi'},
   ]
});

 $('#typeTable').DataTable ({
    'processing' : true,
    'serverSide' : true,
    'serverMethod' : 'post',
    'ajax' : {
        
        type : "POST",
        url:"typeList"

    },
    'columns' : [
    { data: null,"sortable": false, render: function (data, type, row, meta){
       return meta.row + meta.settings._iDisplayStart + 1;
   }   },
   { data: 'keterangan' },
   { data : 'Aksi'},
   ]
});

 $('#matkulTable').DataTable ({
    'processing' : true,
    'serverSide' : true,
    'serverMethod' : 'post',
    'ajax' : {
        
        type : "POST",
        url:"matkulList"

    },
    'columns' : [
    { data: null,"sortable": false, render: function (data, type, row, meta){
       return meta.row + meta.settings._iDisplayStart + 1;
   }   },
   { data: 'nama_kelompok_mk'},
   { data: 'nama_kode' },
   { data: 'nama' },

   { data: 'keterangan' },
   { data: 'jenis' },
   { data: 'semester' },
   
   { data : 'Aksi'},
   ]
});

 $('#kelmatkulTable').DataTable ({
    'processing' : true,
    'serverSide' : true,
    'serverMethod' : 'post',
    'ajax' : {
        
        type : "POST",
        url:"kelmatkulList"

    },
    'columns' : [
    { data: null,"sortable": false, render: function (data, type, row, meta){
       return meta.row + meta.settings._iDisplayStart + 1;
   }   },
   
   { data: 'nama_kelompok_mk' },
   { data: 'ket_kelompok' },
   
   { data : 'Aksi'},
   ]
});







});