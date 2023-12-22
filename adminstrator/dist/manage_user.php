<?php
require('includes/header.php');
require('includes/navbar.php');
require('includes/sidebar.php');
require_once('database/dbhelper.php'); // Import dbhelper.php

// Step 1: Viết truy vấn SQL
$sql = "SELECT * FROM USER";

// Step 2: Thực hiện truy vấn và nhận kết quả
$userList = execute_result($sql);
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables User</h1>
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
                            <th>Fullname</th>
                            <th>Day of Birth</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Avatar</th>
                            <th>Account</th>
                            <th>Password</th>
                            <th>Role ID</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Feature</th>
                            <!-- Thêm các cột khác tùy thuộc vào cần hiển thị -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Fullname</th>
                            <th>Day of Birth</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Avatar</th>
                            <th>Account</th>
                            <th>Password</th>
                            <th>Role ID</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Feature</th>
                            <!-- Thêm các cột khác tùy thuộc vào cần hiển thị -->
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        // Step 3: Lặp qua kết quả và hiển thị trong bảng
                        foreach ($userList as $user) {
                            echo "<tr>";
                            echo "<td>{$user['id']}</td>";
                            echo "<td>{$user['fullname']}</td>";
                            echo "<td>{$user['dayofbirth']}</td>";
                            echo "<td>{$user['email']}</td>";
                            echo "<td>{$user['PhoneNumber']}</td>";
                            echo "<td>{$user['address']}</td>";
                            echo "<td>{$user['avartar']}</td>";
                            echo "<td>{$user['account']}</td>";
                            echo "<td>{$user['password']}</td>";
                            echo "<td>{$user['role_id']}</td>";
                            echo "<td>{$user['created_at']}</td>";
                            echo "<td>{$user['updated_at']}</td>";
                            echo "<td><button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editModal' >Edit</button> <button type='button' class='btn btn-danger btn-sm' onclick='Feature_delete({$user['id']})'>Delete</button></td>";
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
