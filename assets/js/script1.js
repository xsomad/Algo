// <script>
//                 $('.custom-file-input').on('change', function() {
//                     let fileName = $(this).val().split('\\').pop();
//                     $(this).next('.custom-file-label').addClass("selected").html(fileName);
//                 });



//                 $('.form-check-input').on('click', function() {
//                     const menuId = $(this).data('menu');
//                     const roleId = $(this).data('role');

//                     $.ajax({
//                         url: "<?= base_url('admin/changeaccess'); ?>",
//                         type: 'post',
//                         data: {
//                             menuId: menuId,
//                             roleId: roleId
//                         },
//                         success: function() {
//                             document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
//                         }
//                     });

//                 });
//             </script>

                //  $('.custom-file-input').on('change', function() {
                //     let fileName = $(this).val().split('\\').pop();
                //     $(this).next('.custom-file-label').addClass("selected").html(fileName);
                // });


                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        
                        type: "POST",
                        url: "admin/roleaccess",
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function(data) {
                            // document.write(location.href);
                            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                            // window.location.href = data.redirect + roleId;
                        }
                    });

                });