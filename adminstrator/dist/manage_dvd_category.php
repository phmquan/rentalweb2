<?php
require('includes/header.php');
require('includes/navbar.php');
require('includes/sidebar.php');
require_once('database/dbhelper.php'); // Import dbhelper.php

// Step 1: Viết truy vấn SQL
$sql = "SELECT * FROM DVDCategory";

// Step 2: Thực hiện truy vấn và nhận kết quả
$dvdList = execute_result($sql);
?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tables DVD Category</h1>
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
                                <th>Name</th>   
                                <th>Feature</th>                          
                            <!-- Thêm các cột khác tùy thuộc vào cần hiển thị -->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th> 
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
                            echo "<td>{$dvd['name']}</td>";
                            echo "<td>
                                    <button type='button' class='btn btn-danger btn-sm' data-id='{$dvd['id']}' data-name='{$dvd['name']}' onclick='feature_delete({$dvd['id']},2);'>Delete</button>
                                    <button type='button' class='btn btn-warning btn-sm' data-id='{$dvd['id']}' data-name='{$dvd['name']}'>Edit</button> 
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
        
    </main>
<?php
require('includes/footer.php');
?> 

