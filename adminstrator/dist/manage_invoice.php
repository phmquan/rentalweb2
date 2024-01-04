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
            <h1 class="mt-4">Tables Invoice</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
            <!-- DATABASE TABLE START HERE BITCH -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                    <button type='button' class='btn btn-success btn-sm' onclick='openCreateInvoiceModal();'>Create Invoice</button>

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
                                <th>Discount</th>
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
                                <th>Discount</th>
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
                                echo "<td>{$invoice['discount']}%</td>";
                                echo "<td>{$invoice['total_money']}</td>";
                                echo "<td>
                                        <button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editInvoiceModal' 
                                            onclick='openEditModal_Invoice(
                                                {$invoice['id']},
                                                {$invoice['user_id']},
                                                \"{$invoice['fullname']}\",
                                                \"{$invoice['email']}\", 
                                                \"{$invoice['phone_number']}\",
                                                \"{$invoice['address']}\", 
                                                \"{$invoice['note']}\",
                                                \"{$invoice['order_date']}\", 
                                                \"{$invoice['status']}\",
                                                {$invoice['discount']},
                                                {$invoice['total_money']});'>
                                        Edit
                                        </button>
                        
                                        <button type='button' class='btn btn-danger btn-sm' onclick='feature_delete({$invoice['id']},4)'>Delete</button>       
                                        <button type='button' class='btn bg-primary btn-sm text-white' onclick='openDetailInvoiceModal({$invoice['id']});'>Detail Invoice</button></td>";                    
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
        <!-- Thêm modal -->
        <div class="modal fade" id="editInvoiceModal" tabindex="-1" aria-labelledby="editInvoiceModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="margin-top: 200px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editInvoiceModalLabel">Edit Invoice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Thêm các trường chỉnh sửa thông tin vào đây -->
                        <form id="editInvoiceForm">
                            <div class="mb-3">
                                <label for="editInvoiceId" class="form-label">ID</label>
                                <input  type="text" class="form-control" id="editInvoiceIdValue" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="editInvoiceUserId" class="form-label">User ID</label>
                                <input type="number" class="form-control" id="editInvoiceUserId" name="editInvoiceUserId">
                            </div>
                            <div class="mb-3">
                                <label for="editInvoiceFullname" class="form-label">Fullname</label>
                                <input type="text" class="form-control" id="editInvoiceFullname" name="editInvoiceFullname">
                            </div>
                            <div class="mb-3">
                                <label for="editInvoiceEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="editInvoiceEmail" name="editInvoiceEmail">
                            </div>
                            <div class="mb-3">
                                <label for="editInvoicePhoneNumber" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="editInvoicePhoneNumber" name="editInvoicePhoneNumber">
                            </div>
                            <div class="mb-3">
                                <label for="editInvoiceAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="editInvoiceAddress" name="editInvoiceAddress">
                            </div>
                            <div class="mb-3">
                                <label for="editInvoiceNote" class="form-label">Note</label>
                                <textarea class="form-control" id="editInvoiceNote" name="editInvoiceNote"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editInvoiceOrderDate" class="form-label">Order Date</label>
                                <input type="datetime-local" class="form-control" id="editInvoiceOrderDate" name="editInvoiceOrderDate">
                            </div>
                            <div class="mb-3">
                                <label for="createInvoiceStatus" class="form-label">Status</label>
                                <select class="form-select" id="editInvoiceStatus">
                                    <option value="Processing">Processing</option>
                                    <option value="Shipped">Shipped</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editInvoiceDiscount" class="form-label">Discount (%)</label>
                                <input type="percent" class="form-control" id="editInvoiceDiscount" name="editInvoiceDiscount" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="editInvoiceTotalMoney" class="form-label">Total Money ($)</label>
                                <input type="number" class="form-control" id="editInvoiceTotalMoney" name="editInvoiceTotalMoney" readonly>
                            </div>
                            <!-- Thêm các trường khác nếu cần -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveInvoiceChanges()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for Create Invoice -->
        <div class="modal fade" id="createInvoiceModal" tabindex="-1" aria-labelledby="createInvoiceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createInvoiceModalLabel">Create New Invoice (for demo only)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for Create Invoice -->
                        <form id="createInvoiceForm">
                            <div class="mb-3">
                                <label for="createInvoiceUserId" class="form-label">User ID</label>
                                <input type="number" class="form-control" id="createInvoiceUserId" placeholder="Enter User ID">
                            </div>
                            <div class="mb-3">
                                <label for="createInvoiceFullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="createInvoiceFullName" placeholder="Enter Full Name">
                            </div>
                            <div class="mb-3">
                                <label for="createInvoiceEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="createInvoiceEmail" placeholder="Enter Email">
                            </div>
                            <div class="mb-3">
                                <label for="createInvoicePhoneNumber" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="createInvoicePhoneNumber" placeholder="Enter Phone Number">
                            </div>
                            <div class="mb-3">
                                <label for="createInvoiceAddress" class="form-label">Address</label>
                                <textarea class="form-control" id="createInvoiceAddress" rows="3" placeholder="Enter Address"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="createInvoiceNote" class="form-label">Note</label>
                                <textarea class="form-control" id="createInvoiceNote" rows="3" placeholder="Enter Note"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="createInvoiceOrderDate" class="form-label">Order Date</label>
                                <input type="datetime-local" class="form-control" id="createInvoiceOrderDate">
                            </div>
                            <div class="mb-3">
                                <label for="createInvoiceStatus" class="form-label">Status</label>
                                <select class="form-select" id="createInvoiceStatus">
                                    <option value="Processing">Processing</option>
                                    <option value="Shipped">Shipped</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="createInvoiceTotalMoney" class="form-label">Total Money</label>
                                <input type="number" class="form-control" id="createInvoiceTotalMoney" placeholder="Enter Total Money">
                            </div>

                            <button type="button" class="btn btn-primary" onclick="saveNewInvoice()">Create Invoice</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="detailInvoiceModal" tabindex="-1" aria-labelledby="detailInvoiceModal"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailInvoiceModal">Invoice Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for Create Invoice -->
                    <div class="card-body">
                    <table id="detailInvoiceTable" class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Money</th>
                            <!-- Thêm các cột khác tùy thuộc vào cần hiển thị -->
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
<?php
require('includes/footer.php');
?> 

