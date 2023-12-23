<?php
require('includes/header.php');
require('includes/navbar.php');
require('includes/sidebar.php');
require_once('database/dbhelper.php'); // Import dbhelper.php

// Step 1: Viết truy vấn SQL
$sql = "SELECT * FROM DVD WHERE id BETWEEN 1 AND 20";

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
                    <button type='button' class='btn btn-success btn-sm' onclick=''>Add</button>
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
                            echo "<td><button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editModal' >Edit</button> <button type='button' class='btn btn-danger btn-sm' onclick='feature_delete({$dvd['id']})'>Delete</button></td>";
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

require('includes/script.php');
require('includes/footer.php');
?> 

