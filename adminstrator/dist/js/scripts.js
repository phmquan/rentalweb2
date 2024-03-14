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

function openEditModal_DVDCategory(id, name) {
    // Hiển thị modal và điền thông tin cần chỉnh sửa
    $('#editDVDCategoryId').val(id);
    $('#editDVDCategoryName').val(name);
        
    // Hiển thị modal
    $('#editDVDCategoryModal').modal('show');
}

function openEditModal_DVD(id, category_id, title, price, quantity, description, productimage, discount_id) {
    // Đặt giá trị cho các ô nhập liệu
    $('#editDVDIdValue').val(id);
    $('#editDVDCategoryId').val(category_id);
    $('#editDVDTitle').val(title);
    $('#editDVDPrice').val(price);
    $('#editDVDQuantity').val(quantity);
    $('#editDVDDescription').val(description);
    $('#editDVDProductImage').val(productimage);
    $('#editDVDDiscountId').val(discount_id);

    // Hiển thị modal
    $('#editDVDModal').modal('show');
}

function openEditModal_User(id, fullname, dayofbirth, email, phoneNumber, address, avatar, account, password, role_id) {
    // Hiển thị modal và điền thông tin cần chỉnh sửa
    $('#editUserIdValue').val(id);
    $('#editUserFullname').val(fullname);
    $('#editUserDayOfBirth').val(dayofbirth);
    $('#editUserEmail').val(email);
    $('#editUserPhoneNumber').val(phoneNumber);
    $('#editUserAddress').val(address);
    $('#editUserAvatar').val(avatar);
    $('#editUserAccount').val(account);
    $('#editUserPassword').val(password);
    $('#editUserRoleid').val(role_id);

    $('#editUserModal').modal('show');
}

function openEditModal_Invoice(id, user_id, fullname, email, phone_number, address, note, order_date, status, discount, total_money) {
    // Hiển thị modal và điền thông tin cần chỉnh sửa
    $('#editInvoiceIdValue').val(id);
    $('#editInvoiceUserId').val(user_id);
    $('#editInvoiceFullname').val(fullname);
    $('#editInvoiceEmail').val(email);
    $('#editInvoicePhoneNumber').val(phone_number);
    $('#editInvoiceAddress').val(address);
    $('#editInvoiceNote').val(note);
    $('#editInvoiceOrderDate').val(order_date);
    $('#editInvoiceStatus').val(status);
    $('#editInvoiceDiscount').val(discount);
    $('#editInvoiceTotalMoney').val(total_money);

    // Hiển thị modal
    $('#editInvoiceModal').modal('show');
}

function openEditModal_Offer(id, name, offerimage, start_date, end_date, status, code, discount_percentage) {
    // Hiển thị modal và điền thông tin cần chỉnh sửa
    $('#editOfferIdValue').val(id);
    $('#editOfferName').val(name);
    $('#editOfferImage').val(offerimage);
    $('#editOfferStartDate').val(start_date);
    $('#editOfferEndDate').val(end_date);
    $('#editOfferStatus').val(status);
    $('#editOfferDiscount').val(discount_percentage);
    $('#editOfferCode').val(code);

    $('#editOfferModal').modal('show');
}



function saveChanges_DVD() {
    // Lấy thông tin từ modal và xử lý lưu thay đổi
    // Lấy giá trị từ các ô nhập liệu trong modal
    var id = $('#editDVDIdValue').val();
    var category_id = $('#editDVDCategoryId').val();
    var title = $('#editDVDTitle').val();
    var price = $('#editDVDPrice').val();
    var quantity = $('#editDVDQuantity').val();
    var description = $('#editDVDDescription').val();
    var productimage = $('#editDVDProductImage').val();
    var discount_id = $('#editDVDDiscountId').val();

    // Tạo đối tượng chứa dữ liệu cần gửi lên server
    var data = {
        id: id,
        category_id: category_id,
        title: title,
        price: price,
        quantity: quantity,
        description: description,
        productimage: productimage,
        discount_id: discount_id
    };

    // Gọi hàm xử lý lưu thay đổi (có thể sử dụng Ajax để gửi dữ liệu đến server)
    Swal.fire({
        title: 'Bạn chắc điều chỉnh này chứ?',
        text: 'Sẽ không thể khôi phục lại đâu nhé!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'chắc chắn!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'includes/ajax.php',
                data: { action: 'editdvd', data: data },
                dataType: 'json',
                error: function (response) {
                    Swal.fire('Lỗi!', 'Xảy ra lỗi khi xoá DVD category.', 'error'); 
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Đã điều chỉnh!',
                        text: 'DVD trên đã được thay đổi.',
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
    // Sau khi lưu thành công, đóng modal
    $('#editDVDModal').modal('hide');
}

function saveDVDCategoryChanges() {
        // Lấy thông tin từ modal và xử lý lưu thay đổi
        var id = $('#editDVDCategoryId').val();
        var name = $('#editDVDCategoryName').val();

        // Tạo đối tượng chứa dữ liệu cần gửi lên server
        var data = {
            id: id,
            name: name
        };

        // Gọi hàm xử lý lưu thay đổi (có thể sử dụng Ajax để gửi dữ liệu đến server)
        Swal.fire({
            title: 'Bạn chắc điều chỉnh này chứ?',
            text: 'Sẽ không thể khôi phục lại đâu nhé!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'chắc chắn!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'includes/ajax.php',
                    data: { action: 'editdvdcategory', data: data },
                    contentType: 'application/x-www-form-urlencoded; ',
                    dataType: 'json',
                    
                    error: function (response) {
                        Swal.fire('Lỗi!', 'Xảy ra lỗi khi sửa DVD category.', 'error'); 
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Đã điều chỉnh!',
                            text: 'Thể loại trên đã được thay đổi.',
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
        // Sau khi lưu thành công, đóng modal
        $('editDVDCategoryModal').modal('hide');
}

function saveUserChanges() {
    // Lấy giá trị từ các ô nhập liệu
    var id = $('#editUserIdValue').val();
    var fullname = $('#editUserFullname').val();
    var dayofbirth = $('#editUserDayOfBirth').val();
    var email = $('#editUserEmail').val();
    var phoneNumber = $('#editUserPhoneNumber').val();
    var address = $('#editUserAddress').val();
    var avatar = $('#editUserAvatar').val();
    var account = $('#editUserAccount').val();
    var password = $('#editUserPassword').val();
    var role_id = $('#editUserRoleid').val();

    // Tạo đối tượng chứa dữ liệu cần gửi lên server
    var data = {
        id: id,
        fullname: fullname,
        dayofbirth: dayofbirth,
        email: email,
        phoneNumber: phoneNumber,
        address: address,
        avatar: avatar,
        account: account,
        password: password,
        role_id: role_id
    };
    // Gọi hàm hoặc AJAX để lưu thay đổi vào CSDL
    Swal.fire({
        title: 'Bạn chắc điều chỉnh này chứ?',
        text: 'Sẽ không thể khôi phục lại đâu nhé!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'chắc chắn!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'includes/ajax.php',
                data: { action: 'edituser', data: data },
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                dataType: 'json',
                
                error: function (response) {
                    Swal.fire('Lỗi!', 'Xảy ra lỗi khi sửa user.', 'error'); 
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Đã điều chỉnh!',
                        text: 'User trên đã được thay đổi.',
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

    // Đóng modal sau khi lưu thay đổi
    $('#editUserModal').modal('hide');
}

function saveInvoiceChanges() {
    // Lấy thông tin từ form chỉnh sửa
    var id = $('#editInvoiceIdValue').val();
    var user_id = $('#editInvoiceUserId').val();
    var fullname = $('#editInvoiceFullname').val();
    var email = $('#editInvoiceEmail').val();
    var phone_number = $('#editInvoicePhoneNumber').val();
    var address = $('#editInvoiceAddress').val();
    var note = $('#editInvoiceNote').val();
    var order_date = $('#editInvoiceOrderDate').val();
    var status = $('#editInvoiceStatus').val();
    var total_money = $('#editInvoiceTotalMoney').val();

    // Tạo đối tượng chứa dữ liệu cần gửi lên server
    var data = {
        id: id,
        user_id: user_id,
        fullname: fullname,
        email: email,
        phone_number: phone_number,
        address: address,
        note: note,
        order_date: order_date,
        status: status,
        total_money: total_money
    };

    // Gửi thông tin này đến server để lưu thay đổi
    Swal.fire({
        title: 'Bạn chắc điều chỉnh này chứ?',
        text: 'Sẽ không thể khôi phục lại đâu nhé!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'chắc chắn!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'includes/ajax.php',
                data: { action: 'editinvoice', data: data },
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                dataType: 'json',
                success: function (response) {
                    Swal.fire({
                        title: 'Đã điều chỉnh!',
                        text: 'Hoá đơn đã được thay đổi.',
                        icon: 'success'
                    }).then(() => {
                        // Refresh trang hiện tại
                        location.reload();
                    });   
                }
            });
        }
    });

    // Đóng modal sau khi lưu thành công
    $('#editInvoiceModal').modal('hide');
}


function saveOfferChanges() {
    // Lấy giá trị từ các ô nhập liệu
    var id = $('#editOfferIdValue').val();
    var name = $('#editOfferName').val();
    var offerimage = $('#editOfferImage').val();
    var start_date = $('#editOfferStartDate').val();
    var end_date = $('#editOfferEndDate').val();
    var status = $('#editOfferStatus').val();
    var discount_percentage = $('#editOfferDiscount').val();
    // Tạo đối tượng chứa dữ liệu cần gửi lên server
    var data = {
        id: id,
        name: name,
        offerimage: offerimage,
        start_date: start_date,
        end_date: end_date,
        status: status,
        discount_percentage: discount_percentage
    };
    
    // Gửi các giá trị này đến server để lưu thay đổi
    // (Bổ sung phần này dựa trên cách bạn xử lý lưu thay đổi trong ứng dụng của bạn)
    Swal.fire({
        title: 'Bạn chắc điều chỉnh này chứ?',
        text: 'Sẽ không thể khôi phục lại đâu nhé!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'chắc chắn!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'includes/ajax.php',
                data: { action: 'editoffer', data},
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                dataType: 'json',
                error: function (response) {
                    Swal.fire('Lỗi!', 'Xảy ra lỗi khi xoá DVD category.', 'error'); 
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Đã điều chỉnh!',
                        text: 'Offer trên đã được thay đổi.',
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
    // Đóng modal sau khi lưu thay đổi
    $('#editOfferModal').modal('hide');
}

// Function to open Add DVD modal
function openAddModal_DVD() {
    // Reset các trường nhập liệu trong form để tránh giữ lại giá trị từ lần thêm mới trước đó
    $('#addDVDCategoryId').val('');
    $('#addDVDTitle').val('');
    $('#addDVDPrice').val('');
    $('#addDVDQuantity').val('');
    $('#addDVDDescription').val('');
    $('#addDVDProductImage').val('');
    $('#addDVDDiscountId').val('');

    // Mở modal
    $('#addDVDModal').modal('show');
}

function saveNewDVD() {
var form = document.getElementById('addDVDForm');
    if (form.checkValidity()){
        // Code to retrieve input values from the add DVD modal and send them to the server
        var categoryId = $('#addDVDCategoryId').val();
        var title = $('#addDVDTitle').val();
        var price = $('#addDVDPrice').val();
        var quantity = $('#addDVDQuantity').val();
        var description = $('#addDVDDescription').val();
        var productImage = $('#addDVDProductImage').val();
        var discountId = $('#addDVDDiscountId').val();

        // Tạo đối tượng chứa dữ liệu cần gửi lên server
        var data = {
            category_id: categoryId,      // Adjusted from category_id to categoryId
            title: title,
            price: price,
            quantity: quantity,
            description: description,
            productimage: productImage,    // Adjusted from productimage to productImage
            discount_id: discountId
        };

        // You can perform validation here before sending the data to the server    
        // Gửi các giá trị này đến server để lưu thay đổi
        // (Bổ sung phần này dựa trên cách bạn xử lý lưu thay đổi trong ứng dụng của bạn)
        Swal.fire({
            title: 'Thêm DVD mới ?',
            text: 'Bạn chắc chắn thông tin rồi chứ!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'chắc chắn!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'includes/ajax.php',
                    data: { action: 'adddvd', data},
                    contentType: 'application/x-www-form-urlencoded;',
                    dataType: 'json',
                    error: function (response) {
                        Swal.fire('Lỗi!', 'Xảy ra lỗi khi thêm mới DVD.', 'error'); 
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Đã thêm DVD!',
                            text: 'Thêm mới DVD thành công.',
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
        // Đóng modal sau khi lưu thay đổi
        $('#addDVDModal').modal('hide');
    }
    else{
        // Form is invalid, do not proceed
        Swal.fire({
            title: 'Kiểm tra lại thông tin ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
        });
    }
    
}

function openAddModal_Category() {
    // Reset các trường nhập liệu trong form để tránh giữ lại giá trị từ lần thêm mới trước đó
    $('#addCategoryName').val('');

    // Code to open the add category modal, if necessary
    $('#addCategoryModal').modal('show');
}

function saveNewCategory() {
    var form = document.getElementById('NullForm');
            if (form.checkValidity()) {
                // Code to retrieve input values from the add category modal and send them to the server
                var categoryName = $('#addCategoryName').val();
                var data ={
                    name: categoryName 
                };
                // You can perform validation here before sending the data to the server    
                // Gửi các giá trị này đến server để lưu thay đổi
                // (Bổ sung phần này dựa trên cách bạn xử lý lưu thay đổi trong ứng dụng của bạn)
                Swal.fire({
                    title: 'Thêm DVDCategory mới ?',
                    text: 'Bạn chắc chắn thông tin rồi chứ!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'chắc chắn!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: 'includes/ajax.php',
                            data: { action: 'adddvdcategory', data},
                            contentType: 'application/x-www-form-urlencoded;',
                            dataType: 'json',
                            error: function (response) {
                                Swal.fire('Lỗi!', 'Xảy ra lỗi khi thêm mới DVD.', 'error'); 
                            },
                            success: function (response) {
                                Swal.fire({
                                    title: 'Đã thêm DVDCategory!',
                                    text: 'Thêm mới DVDCategory thành công.',
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
                // Đóng modal sau khi lưu thay đổi
                $('#addCategoryModal').modal('hide');
                // You can also submit the form if needed: form.submit();
            } else {
                // Form is invalid, do not proceed
                Swal.fire({
                    title: 'Kiểm tra lại thông tin ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                });
            }
    
}

function openAddModal_User() {
    // Code to open the add user modal, if necessary
    $('#addUserModal').modal('show');
}

function saveNewUser() {
    var form = document.getElementById('addUserForm');
    if (form.checkValidity()){
        // Code to retrieve input values from the add user modal and send them to the server
        var fullName = $('#addFullName').val();
        var dateOfBirth = $('#addDateOfBirth').val();
        var email = $('#addEmail').val();
        var phoneNumber = $('#addPhoneNumber').val();
        var address = $('#addAddress').val();
        var avatar = $('#addAvatar').val();
        var account = $('#addAccount').val();
        var password = $('#addPassword').val();
        var role_id = $('#addRoleId').val();

        data = {
            fullName: fullName,
            dateOfBirth: dateOfBirth,
            email: email,
            phoneNumber: phoneNumber,
            address: address,
            avatar: avatar,
            account: account,
            password: password,
            role_id: role_id
        }
        // Ajax call to send data to the server
        // Gửi các giá trị này đến server để lưu thay đổi
        // (Bổ sung phần này dựa trên cách bạn xử lý lưu thay đổi trong ứng dụng của bạn)
        Swal.fire({
            title: 'Thêm người dùng mới ?',
            text: 'Bạn chắc chắn thông tin rồi chứ!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'chắc chắn!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'includes/ajax.php',
                    data: { action: 'adduser', data},
                    contentType: 'application/x-www-form-urlencoded;',
                    dataType: 'json',
                    error: function (response) {
                        Swal.fire('Lỗi!', 'Xảy ra lỗi khi thêm mới User.', 'error'); 
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Đã thêm người dùng mới!',
                            text: 'Thêm mới User thành công.',
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
        // Đóng modal sau khi lưu thay đổi
        $('#addUserModal').modal('hide');  
    } else {
        // Form is invalid, do not proceed
        Swal.fire({
            title: 'Kiểm tra lại thông tin ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
        });
    }
    
     
}

function openCreateInvoiceModal() {
    // Code to open the create invoice modal, if necessary
    $('#createInvoiceModal').modal('show');
}


function openDetailInvoiceModal(invoice_id) {
    // Set giá trị của invoice_id vào input ẩn trong modal
    $('#detailInvoiceIdValue').val(invoice_id);

    // Hiển thị modal
    $('#detailInvoiceModal').modal('show');

    // Gọi hàm để load chi tiết hóa đơn dựa trên invoice_id
    loadDetailInvoice(invoice_id);
}

function loadDetailInvoice(invoice_id) {
    // Gửi request Ajax để lấy chi tiết hóa đơn từ server
    $.ajax({
        type: 'GET',
        url: 'includes/get_invoice_detail.php',
        data: { invoice_id: invoice_id },
        success: function(response) {
            // Xử lý kết quả trả về từ server và cập nhật nội dung bảng chi tiết hóa đơn
            $('#detailInvoiceTable tbody').html(response);
        },
        error: function(error) {
            console.error('Error: ' + error);
        }
    });
}
function addToCart(productId) {
    var quantity = document.getElementById('quantity').value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Xử lý kết quả trả về (ví dụ: cập nhật số lượng sản phẩm trong giỏ hàng)
            var result = xhr.responseText;
            alert(result); // Hiển thị thông báo (có thể thay đổi theo ý của bạn)
        }
    };
    xhr.open('GET', 'add_to_cart.php?productId=' + productId + '&quantity=' + quantity, true);
    xhr.send();
}
function saveNewInvoice() {
    // Code to retrieve input values from the create invoice modal and send them to the server
    var userId = $('#createInvoiceUserId').val();
    var fullName = $('#createInvoiceFullName').val();
    var email = $('#createInvoiceEmail').val();
    var phoneNumber = $('#createInvoicePhoneNumber').val();
    var address = $('#createInvoiceAddress').val();
    var note = $('#createInvoiceNote').val();
    var orderDate = $('#createInvoiceOrderDate').val();
    var status = $('#createInvoiceStatus').val();
    var totalMoney = $('#createInvoiceTotalMoney').val();

    var data = {
        userId: userId,
        fullName: fullName,
        email: email,
        phoneNumber: phoneNumber,
        address: address,
        note: note,
        orderDate: orderDate,
        status: status,
        totalMoney: totalMoney
    };
    
    // Ajax call to send data to the server
    // Gửi các giá trị này đến server để lưu thay đổi
    // (Bổ sung phần này dựa trên cách bạn xử lý lưu thay đổi trong ứng dụng của bạn)
    Swal.fire({
        title: 'Thêm DVD Invoice mới ?',
        text: 'Bạn chắc chắn thông tin rồi chứ!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'chắc chắn!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'includes/ajax.php',
                data: { action: 'addinvoice', data},
                contentType: 'application/x-www-form-urlencoded;',
                dataType: 'json',
                error: function (response) {
                    Swal.fire('Lỗi!', 'Xảy ra lỗi khi thêm mới Invoice.', 'error'); 
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Đã thêm DVDInvoice!',
                        text: 'Thêm mới DVDInvoice thành công.',
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

    $('#createInvoiceModal').modal('hide');
}

function openCreateOfferModal() {
    // Code to open the create offer modal, if necessary
    $('#createOfferModal').modal('show');
}

function saveNewOffer() {
    var form = document.getElementById('createOfferForm');
    if (form.checkValidity()){
         // Code to retrieve input values from the create offer modal and send them to the server
        var name = $('#createOfferName').val();
        var offerImage = $('#createOfferImage').val();
        var startDate = $('#createOfferStartDate').val();
        var endDate = $('#createOfferEndDate').val();
        var status = $('#addOfferStatus').val();
        var code = $('#createOfferCode').val();
        var discountPercentage = $('#createOfferDiscountPercentage').val();

        var data = {
            name: name,
            offerImage: offerImage,
            startDate: startDate,
            endDate: endDate,
            status: status,
            discountcode: code,
            discountPercentage: discountPercentage
        };
        
        /// Ajax call to send data to the server
        // Gửi các giá trị này đến server để lưu thay đổi
        // (Bổ sung phần này dựa trên cách bạn xử lý lưu thay đổi trong ứng dụng của bạn)
        Swal.fire({
            title: 'Thêm DVD Offer mới ?',
            text: 'Bạn chắc chắn thông tin rồi chứ!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'chắc chắn!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'includes/ajax.php',
                    data: { action: 'addoffer', data},
                    contentType: 'application/x-www-form-urlencoded;',
                    dataType: 'json',
                    error: function (response) {
                        Swal.fire('Lỗi!', 'Xảy ra lỗi khi thêm mới Offer.', 'error'); 
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Đã thêm Offer!',
                            text: 'Thêm mới Offer thành công.',
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

        $('#createOfferModal').modal('hide');
    } else {
        // Form is invalid, do not proceed
        Swal.fire({
            title: 'Kiểm tra lại thông tin ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
        });
    }
   
}
