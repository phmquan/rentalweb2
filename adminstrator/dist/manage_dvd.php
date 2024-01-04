<?php
require('includes/header.php');
require('includes/navbar.php');
require('includes/sidebar.php');
require_once('database/dbhelper.php'); // Import dbhelper.php

// Step 1: Viết truy vấn SQL
$sql = "SELECT * FROM DVD  WHERE id BETWEEN 1 AND 20";

// Step 2: Thực hiện truy vấn và nhận kết quả
$dvdList = execute_result($sql);

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
                    <button type='button' class='btn btn-success btn-sm' onclick='openAddModal_DVD();'>Create DVD</button>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Category ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Product Image</th>
                            <th>Discount ID</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Feature</th>
                            <!-- Thêm các cột khác tùy thuộc vào cần hiển thị -->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>ID</th>
                            <th>Category ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Product Image</th>
                            <th>Discount ID</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Feature</th>
                            <!-- Thêm các cột khác tùy thuộc vào cần hiển thị -->
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php
                        // Step 3: Lặp qua kết quả và hiển thị trong bảng
                        foreach ($dvdList as $dvd) {
                            echo "<tr>";
                            echo "<td>{$dvd['id']}</td>";
                            echo "<td>{$dvd['category_id']}</td>";
                            echo "<td>{$dvd['title']}</td>";
                            echo "<td>{$dvd['price']}</td>";
                            echo "<td>{$dvd['Quantity']}</td>";
                            echo "<td>{$dvd['description']}</td>";
                            echo "<td>{$dvd['productimage']}
                                <img src='{$dvd['productimage']}' alt='Product Image' style='width: 200px; height: 200px;'</td>";
                            echo "<td>{$dvd['discount_id']}</td>";
                            echo "<td>{$dvd['created_at']}</td>";
                            echo "<td>{$dvd['updated_at']}</td>";
                            echo "<td>
                                    <button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editDVDModal' 
                                        onclick='openEditModal_DVD({$dvd['id']}, 
                                                                    {$dvd['category_id']}, 
                                                                    \"{$dvd['title']}\", 
                                                                    {$dvd['price']}, 
                                                                    {$dvd['Quantity']}, 
                                                                    \"{$dvd['description']}\", 
                                                                    \"{$dvd['productimage']}\",
                                                                    {$dvd['discount_id']})'>
                                    Edit
                                    </button>                    
                                    <button type='button' class='btn btn-danger btn-sm' onclick='feature_delete({$dvd['id']},1)'>Delete</button>
                                </td>";
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
        <!-- Thêm modal edit -->
        <div class="modal fade" id="editDVDModal" tabindex="-1" aria-labelledby="editDVDModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="margin-top: 50px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDVDModalLabel">Edit DVD</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Thêm các trường chỉnh sửa thông tin vào đây -->
                        <form id="editDVDForm">
                            <div class="mb-3">
                                <label for="editDVDId" class="form-label">ID</label>
                                <input  type="text" class="form-control" id="editDVDIdValue" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="editDVDCategoryId" class="form-label">Category ID</label>
                                <!-- Thêm ô nhập liệu cho Category ID -->
                                <input type="number" class="form-control" id="editDVDCategoryId" name="editDVDCategoryId">
                            </div>
                            <div class="mb-3">
                                <label for="editDVDTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="editDVDTitle" name="editDVDTitle">
                            </div>
                            <div class="mb-3">
                                <label for="editDVDPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" id="editDVDPrice" name="editDVDPrice">
                            </div>
                            <div class="mb-3">
                                <label for="editDVDQuantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="editDVDQuantity" name="editDVDQuantity">
                            </div>
                            <div class="mb-3">
                                <label for="editDVDDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="editDVDDescription" name="editDVDDescription"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editDVDProductImage" class="form-label">Product Image</label>
                                <input type="text" class="form-control" id="editDVDProductImage" name="editDVDProductImage">
                            </div>
                            <div class="mb-3">
                                <label for="editDVDDiscountId" class="form-label">Discount ID</label>
                                <input type="number" class="form-control" id="editDVDDiscountId" name="editDVDDiscountId">
                            </div>
                            <!-- Thêm các trường khác nếu cần -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveChanges_DVD()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
                    
        <!-- Modal for Add DVD -->
        <div class="modal fade" id="addDVDModal" tabindex="-1" aria-labelledby="addDVDModalLabel" aria-hidden="true">
            <div class="modal-dialog " style="margin-top: 50px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDVDModalLabel">Add New DVD</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for Add DVD -->
                        <form id="addDVDForm" novalidate>
                            <div class="mb-3">
                                <label for="addDVDCategoryId" class="form-label">Category ID</label>
                                <input type="text" class="form-control" id="addDVDCategoryId" placeholder="Enter Category ID" required>
                            </div>
                            <div class="mb-3">
                                <label for="addDVDTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="addDVDTitle" placeholder="Enter Title" required>
                            </div>
                            <div class="mb-3">
                                <label for="addDVDPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" id="addDVDPrice" placeholder="Enter Price" required>
                            </div>
                            <div class="mb-3">
                                <label for="addDVDQuantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="addDVDQuantity" placeholder="Enter Quantity" required>
                            </div>
                            <div class="mb-3">
                                <label for="addDVDDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="addDVDDescription" rows="3" placeholder="Enter Description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="addDVDProductImage" class="form-label">Product Image</label>
                                <input type="text" class="form-control" id="addDVDProductImage" placeholder="Enter Product Image URL" required>
                            </div>
                            <div class="mb-3">
                                <label for="addDVDDiscountId" class="form-label">Discount ID</label>
                                <input type="number" class="form-control" id="addDVDDiscountId" placeholder="Enter Discount ID" required>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="saveNewDVD()">Save DVD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php require('includes/footer.php'); ?> 

