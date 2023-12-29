function redirectToCart() {
    // Chuyển hướng sang trang cart.php
    window.location.href = 'cart.php';
}
// Hàm delay
function delayFunction() {
    // Đoạn mã bạn muốn thực hiện sau khi delay

    // Ví dụ: alert sau khi delay 1 giây
    alert('Delayed for 1 second!');
}
function addToCart(dvdId, title, price, quantity, productImage) {
    
    quantity = parseFloat(quantity)
    // Lấy thông tin từ tham số
    var dvdInfo = {
        dvd_id: dvdId,
        title: title,
        price: price,
        quantity: quantity,
        productImage : productImage
    };

    // Sử dụng Ajax để gửi thông tin lên server (PHP)
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'addToCart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Xử lý phản hồi từ server (nếu có)
            console.log(xhr.responseText);
            // Chuyển hướng sau khi thêm vào giỏ hàng
            window.location.href = 'cart.php';
        }
    };
    xhr.send(JSON.stringify(dvdInfo));
}

function checkout(cartSubtotal) {
    var data = {
        cartSubtotal: cartSubtotal
    };
    
    // Thực hiện yêu cầu AJAX
    $.ajax({
        url: 'ajax_webpage.php',
        method: "POST",
        data: { action: 'ajaxcheckout', data: data },
        success: function(response) {
            // Xử lý kết quả nếu cần
            console.log(response);
            // Chuyển hướng đến trang checkout.php
        },
        error: function(error) {
            console.error(error);
        }
    });
    
    window.location.href = "checkout.php";
}

function checkout_end(cartSubtotal, discount) {
    
    // Lấy thông tin từ modal và xử lý lưu thay đổi
    // Lấy giá trị từ các ô nhập liệu trong modal
    var fullName = $('#addFullName').val();
    var email = $('#addEmail').val();
    var phoneNumber = $('#addPhoneNumber').val();
    var address = $('#addAddress').val();

    var data = {
        cartSubtotal: cartSubtotal,
        discount : discount,
        fullName: fullName,
        email: email,
        phoneNumber: phoneNumber,
        address: address
    };
    console.log('Data to send:', data);
    // Thực hiện yêu cầu AJAX
    $.ajax({
        url: 'ajax_webpage.php',
        method: "POST",
        data: { action: 'ajaxcheckoutend', data: data },
        success: function(response) {
            // Xử lý kết quả nếu cần
            console.log(response);
            // Chuyển hướng đến trang checkout.php
        },
        error: function(error) {
            console.error(error);
        }
    });
    
    window.location.href = "profile.php";
}


