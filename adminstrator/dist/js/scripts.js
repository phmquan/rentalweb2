/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 


function feature_delete(id, casede) {
    if (casede == 1){
        var check = 0;
        Swal.fire({
            title: 'Bạn chắc xoá DVD này chứ?',
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
                    data: { action: 'deletedvd', id: id },
                    
                    error: function (response) {
                        Swal.fire('Lỗi!', 'Xảy ra lỗi khi xoá DVD.', 'error'); 
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Đã xoá!',
                            text: 'Sản phẩm DVD đã được xoá.',
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
    };
    if (casede == 2){
        var check = 0;
        Swal.fire({
            title: 'Bạn chắc xoá thể loại này chứ?',
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
                    data: { action: 'deletecategory', id: id },
                    
                    error: function (response) {
                        Swal.fire('Lỗi!', 'Xảy ra lỗi khi xoá DVD category.', 'error'); 
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Đã xoá!',
                            text: 'Thể loại trên đã được xoá.',
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
    };
    if (casede == 3){
        var check = 0;
        Swal.fire({
            title: 'Bạn chắc xoá user này chứ?',
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
                    data: { action: 'deleteuser', id: id },
                    
                    error: function (response) {
                        Swal.fire('Lỗi!', 'Xảy ra lỗi khi xoá DVD category.', 'error'); 
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Đã xoá!',
                            text: 'User trên đã xoá.',
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
    };
    if (casede == 5){
        var check = 0;
        Swal.fire({
            title: 'Bạn chắc xoá voucher này chứ?',
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
                    data: { action: 'deleteoffer', id: id },
                    
                    error: function (response) {
                        Swal.fire('Lỗi!', 'Xảy ra lỗi khi xoá DVD category.', 'error'); 
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Đã xoá!',
                            text: 'Voucher trên đã xoá.',
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
    };
    if (casede == 4){
        var check = 0;
        Swal.fire({
            title: 'Bạn chắc xoá hoá đơn này chứ?',
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
                    data: { action: 'deleteinvoice', id: id },
                    
                    error: function (response) {
                        Swal.fire('Lỗi!', 'Xảy ra lỗi khi xoá DVD category.', 'error'); 
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Đã xoá!',
                            text: 'Hoá đơn trên đã xoá.',
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
    };
    
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
