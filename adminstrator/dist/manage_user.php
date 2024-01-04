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
                <button type='button' class='btn btn-success btn-sm' onclick='openAddModal_User();'>Create User</button>
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
                            <!--
                            <th>Feature</th>
                             Thêm các cột khác tùy thuộc vào cần hiển thị -->
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
                            echo "<td>
                                        <button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editUserModal' 
                                        onclick='openEditModal_User(
                                                {$user['id']}, 
                                                \"{$user['fullname']}\",
                                                \"{$user['dayofbirth']}\", 
                                                \"{$user['email']}\",
                                                \"{$user['PhoneNumber']}\",
                                                \"{$user['address']}\", 
                                                \"{$user['avartar']}\", 
                                                \"{$user['account']}\", 
                                                \"{$user['password']}\", 
                                                {$user['role_id']})'>
                                        Edit
                                        </button>                    
                                        <button type='button' class='btn btn-danger btn-sm' onclick='feature_delete({$user['id']},3)'>Delete</button>
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
    <!-- Thêm modal cho USER Edit -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Thêm các trường chỉnh sửa thông tin vào đây -->
                    <form id="editUserForm">
                        <div class="mb-3">
                            <label for="editUserId" class="form-label">ID</label>
                            <input  type="text" class="form-control" id="editUserIdValue" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editUserFullname" class="form-label">Fullname</label>
                            <input type="text" class="form-control" id="editUserFullname" name="editUserFullname">
                        </div>
                        <div class="mb-3">
                            <label for="editUserDayOfBirth" class="form-label">Day of Birth</label>
                            <input type="date" class="form-control" id="editUserDayOfBirth" name="editUserDayOfBirth">
                        </div>
                        <div class="mb-3">
                            <label for="editUserEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" id="editUserEmail" name="editUserEmail">
                        </div>
                        <div class="mb-3">
                            <label for="editUserPhoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="editUserPhoneNumber" name="editUserPhoneNumber">
                        </div>
                        <div class="mb-3">
                            <label for="editUserAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="editUserAddress" name="editUserAddress">
                        </div>
                        <div class="mb-3">
                            <label for="editUserAvatar" class="form-label">Avartar</label>
                            <input type="text" class="form-control" id="editUserAvatar" name="editUserAvatar">
                        </div>

                        <div class="mb-3">
                            <label for="editUserAccount" class="form-label">Account</label>
                            <input type="text" class="form-control" id="editUserAccount" name="editUserAccount">
                        </div>

                        <div class="mb-3">
                            <label for="editUserPassword" class="form-label">Password</label>
                            <input type="text" class="form-control" id="editUserPassword" name="editUserPassword">
                        </div>

                        <div class="mb-3">
                            <label for="editUserRoleid" class="form-label">Role ID</label>
                            <input type="number" class="form-control" id="editUserRoleid" name="editUserRoleid">
                        </div>

                        <!-- Thêm các trường khác nếu cần -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveUserChanges()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Add User -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for Add User -->
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label for="addFullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="addFullName" placeholder="Enter Full Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="addDateOfBirth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="addDateOfBirth" required>
                        </div>
                        <div class="mb-3">
                            <label for="addEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="addEmail" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="addPhoneNumber" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="addPhoneNumber" placeholder="Enter Phone Number" required>
                        </div>
                        <div class="mb-3">
                            <label for="addAddress" class="form-label">Address</label>
                            <textarea class="form-control" id="addAddress" rows="3" placeholder="Enter Address" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="addAvatar" class="form-label">Avatar URL</label>
                            <input type="text" class="form-control" id="addAvatar" placeholder="Enter Avatar URL" required>
                        </div>
                        <div class="mb-3">
                            <label for="addAccount" class="form-label">Account</label>
                            <input type="text" class="form-control" id="addAccount" placeholder="Enter Account" required>
                        </div>
                        <div class="mb-3">
                            <label for="addPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="addPassword" placeholder="Enter Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="addRoleId" class="form-label">Role ID</label>
                            <input type="number" class="form-control" id="addRoleId" placeholder="Enter Role ID" required>
                        </div>

                        <button type="button" class="btn btn-primary" onclick="saveNewUser()">Save User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<?php
require('includes/footer.php');
?>
