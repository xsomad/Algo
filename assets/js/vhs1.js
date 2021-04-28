

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
                { data : 'sks' },
                { data : 'sesi' },
                
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




});