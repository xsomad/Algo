 $('#empTable').DataTable ({
            'processing' : true,
            'serverSide' : true,
            'serverMethod' : 'post',
            'ajax' : {
                // 'url':'<?=base_url()?>index.php/master/barangList'
                type : "POST",
                url:"anggotaList"

            },
            'columns' : [
                { data: null,"sortable": false, render: function (data, type, row, meta){
                 return meta.row + meta.settings._iDisplayStart + 1;
                }   },
                { data: 'nama' },
                { data : 'nira' },
                { data : 'alamat' },
                { data : 'dpp'},
                { data : 'dpw'},
                
                // { data : 'i_mas', "render": function(data, type, row) {return '<img src="../assets/img/barang/'+data+'"style="height:50px;width:50px;" />'}},

                { data : 'Aksi'},
                ]
        });   