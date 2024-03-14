<?php
require('includes/header.php');
require('includes/navbar.php');
require('includes/sidebar.php');
require_once('database/dbhelper.php'); // Import dbhelper.php

// Step 1: Viết truy vấn SQL
$sql = "SELECT * FROM OFFER";

// Step 2: Thực hiện truy vấn và nhận kết quả
$offerList = execute_result($sql);
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables Offer</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <!-- DATABASE TABLE START HERE -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
                <button type='button' class='btn btn-success btn-sm' onclick='openCreateOfferModal();'>Create Offer</button>

            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>% Discount</th>
                            <th>Code</th>
                            <th>Feature</th>
                            <!-- Thêm các cột khác tùy thuộc vào cần hiển thị -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>% Discount</th>
                            <th>Code</th>
                            <th>Feature</th>
                            <!-- Thêm các cột khác tùy thuộc vào cần hiển thị -->
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        // Step 3: Lặp qua kết quả và hiển thị trong bảng
                        foreach ($offerList as $offer) {
                            echo "<tr>";
                            echo "<td>{$offer['id']}</td>";
                            echo "<td>{$offer['name']}</td>";
                            echo "<td>{$offer['start_date']}</td>";
                            echo "<td>{$offer['end_date']}</td>";
                            echo "<td>{$offer['status']}</td>";
                            echo "<td>{$offer['discount_percentage']}</td>";
                            echo "<td>{$offer['code']}</td>";
                            echo "<td>
                                    <button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editOfferModal' 
                                            onclick='openEditModal_Offer(
                                                {$offer['id']}, 
                                                \"{$offer['name']}\", 
                                                \"{$offer['offerimage']}\", 
                                                \"{$offer['start_date']}\", 
                                                \"{$offer['end_date']}\", 
                                                \"{$offer['status']}\", 
                                                \"{$offer['code']}\",
                                                {$offer['discount_percentage']});'>
                                    Edit
                                    </button>
                                    <button type='button' class='btn btn-danger btn-sm' onclick='feature_delete({$offer['id']},5)'>Delete</button>
                                </td>";
                            // Thêm các cột khác tùy thuộc vào cần hiển thị
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- DATABASE TABLE END HERE -->
    </div>
    <!-- Thêm modal -->
    <div class="modal fade" id="editOfferModal" tabindex="-1" aria-labelledby="editOfferModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOfferModalLabel">Edit OFFER</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Thêm các trường chỉnh sửa thông tin vào đây -->
                    <form id="editOfferForm">
                        <div class="mb-3">
                            <label for="editOfferId" class="form-label">ID</label>
                            <input  type="text" class="form-control" id="editOfferIdValue" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editOfferName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editOfferName" name="editOfferName">
                        </div>
                        <div class="mb-3">
                            <label for="editOfferImage" class="form-label">Offer Image</label>
                            <input type="text" class="form-control" id="editOfferImage" name="editOfferImage">
                        </div>
                        <div class="mb-3">
                            <label for="editOfferStartDate" class="form-label">Start Date</label>
                            <input type="datetime-local" class="form-control" id="editOfferStartDate" name="editOfferStartDate">
                        </div>
                        <div class="mb-3">
                            <label for="editOfferEndDate" class="form-label">End Date</label>
                            <input type="datetime-local" class="form-control" id="editOfferEndDate" name="editOfferEndDate">
                        </div>
                        <div class="mb-3">
                            <label for="editOfferStatus" class="form-label">Status</label>
                            <select class="form-select" id="editOfferStatus" name="editOfferStatus">
                                <option style="color: greenyellow;" value="Active">Active</option>
                                <option style="color: red;" value="Outdate">Outdate</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editOfferDiscount" class="form-label">Discount Percentage (%)</label>
                            <input type="number" class="form-control" id="editOfferDiscount" name="editOfferDiscount">
                        </div>
                        <div class="mb-3">
                            <label for="editOfferCode" class="form-label">code</label>
                            <input type="text" class="form-control" id="editOfferCode" name="editOfferCode">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveOfferChanges()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for Create Offer -->
    <div class="modal fade" id="createOfferModal" tabindex="-1" aria-labelledby="createOfferModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createOfferModalLabel">Create New Offer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for Create Offer -->
                    <form id="createOfferForm">
                        <div class="mb-3">
                            <label for="createOfferName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="createOfferName" placeholder="Enter Offer Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="createOfferImage" class="form-label">Offer Image</label>
                            <input type="text" class="form-control" id="createOfferImage" placeholder="Enter Offer Image URL" required>
                        </div>
                        <div class="mb-3">
                            <label for="createOfferStartDate" class="form-label">Start Date</label>
                            <input type="datetime-local" class="form-control" id="createOfferStartDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="createOfferEndDate" class="form-label">End Date</label>
                            <input type="datetime-local" class="form-control" id="createOfferEndDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="addOfferStatus" class="form-label">Status</label>
                            <select class="form-select" id="addOfferStatus" name="addOfferStatus" placeholder="Enter Offer Status" required>
                                <option style="color: greenyellow;" value="Active">Active</option>
                                <option style="color: red;" value="Outdate">Outdate</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="createOfferDiscountPercentage" class="form-label">Discount Percentage</label>
                            <input type="number" class="form-control" id="createOfferDiscountPercentage" placeholder="Enter Discount Percentage"  required>
                        </div>
                        <div class="mb-3">
                            <label for="createOfferCode" class="form-label">code</label>
                            <input type="text" class="form-control" id="createOfferCode" name="createOfferCode">
                        </div>

                        <button type="button" class="btn btn-primary" onclick="saveNewOffer()">Create Offer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<?php
require('includes/footer.php');
?>
