<?php
require('includes/header.php');
require('includes/navbar.php');
require('includes/sidebar.php');
require_once('database/dbhelper.php'); // Import dbhelper.php
// Step 1: Viết truy vấn SQL
$sql = "SELECT * FROM INVOICE";

// Step 2: Thực hiện truy vấn và nhận kết quả
$invoiceList = execute_result($sql);
?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tables DVD</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
            <!-- DATABASE TABLE START HERE BITCH -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                    <button type='button' class='btn btn-success btn-sm' onclick=''>Add</button>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Note</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Total Money</th>
                                <th>Feature</th>
                                <!-- Thêm các cột khác tùy thuộc vào cần hiển thị -->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Note</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Total Money</th>
                                <th>Feature</th>
                                <!-- Thêm các cột khác tùy thuộc vào cần hiển thị -->
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            // Step 3: Lặp qua kết quả và hiển thị trong bảng
                            foreach ($invoiceList as $invoice) {
                                echo "<tr>";
                                echo "<td>{$invoice['id']}</td>";
                                echo "<td>{$invoice['user_id']}</td>";
                                echo "<td>{$invoice['fullname']}</td>";
                                echo "<td>{$invoice['email']}</td>";
                                echo "<td>{$invoice['phone_number']}</td>";
                                echo "<td>{$invoice['address']}</td>";
                                echo "<td>{$invoice['note']}</td>";
                                echo "<td>{$invoice['order_date']}</td>";
                                echo "<td>{$invoice['status']}</td>";
                                echo "<td>{$invoice['total_money']}</td>";
                                echo "<td><button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editModal' >Edit</button> <button type='button' class='btn btn-danger btn-sm' onclick=''>Delete</button></td>";                    
                                // Thêm các cột khác tùy thuộc vào cần hiển thị
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
</div>
   
            </div>
            <!-- DATABASE TABLE END HERE BITCH -->
        </div>
    </main>
<?php
require('includes/footer.php');
?> 

