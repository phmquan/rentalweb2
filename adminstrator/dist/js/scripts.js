/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 


function feature_delete(id) {
    var check = 0;
    Swal.fire({
        title: 'Bạn chắc chứ?',
        text: 'Sẽ không thể khôi phục lại đâu nhé!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Xoá đi!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'includes/ajax.php',
                data: { action: 'delete', id: id },
                // success: function (response) {
                //     // Kiểm tra xem server có trả về 'success' không
                //     if (response == 'success') {
                //         console.log(response);
                //         // Cập nhật bảng DataTable sau khi xoá thành công
                //         $('#datatablesSimple').DataTable().row($('#row_' + id)).remove().draw();
                        
                //         Swal.fire('Đã xoá!', 'Thông tin DVD category đã xoá.', 'success');
                //     } else {
                //         console.log(response);
                //         // Xử lý lỗi khi xoá không thành công
                //         Swal.fire('Lỗi!', 'Xảy ra lỗi khi xoá DVD category.', 'error');
                //     }
                // }
                Error: function (response) {
                    Swal.fire('Lỗi!', 'Xảy ra lỗi khi xoá DVD category.', 'error'); 
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'The DVD category has been deleted.',
                        icon: 'success'
                    }).then(() => {
                        // Refresh trang hiện tại
                        location.reload();
                        check = 1;
                        // Xóa hàng trong bảng mà không làm mới trang
                        //$('#datatablesSimple').DataTable().row($('#row_' + id)).remove().draw();
                    });
                }
                
            });
        }
    });
} 


window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

// js/script.js
// $(document).ready(function () {
//     $('#datatablesSimple').DataTable();
 
//     // Add DVD
//     $('#addModal').on('hidden.bs.modal', function () {
//        $(this).find('form')[0].reset();
//     });
 
//     // Edit DVD
//     $('#editModal').on('show.bs.modal', function (event) {
//        var button = $(event.relatedTarget);
//        var id = button.data('id');
//        var name = button.data('name');
//        var modal = $(this);
//        modal.find('.modal-body input[name="id"]').val(id);
//        modal.find('.modal-body input[name="name"]').val(name);
//     });
//  });
