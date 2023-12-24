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
                <button type='button' class='btn btn-success btn-sm' onclick=''>Add</button>
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
                            echo "<td><button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editModal' >Edit</button> <button type='button' class='btn btn-danger btn-sm' onclick='feature_delete({$offer['id']},5)'>Delete</button></td>";
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
</main>

<?php
require('includes/footer.php');
?>
