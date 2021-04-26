addEventListener('load', function myfuntion(){
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



    })