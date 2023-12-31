<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category Modal</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="path/to/bootstrap.css">
    <style>
        #addCategoryForm :invalid {
            border: 1px solid red;
        }
    </style>
</head>

<body>

    <!-- Button to trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
        Add New Category
    </button>

    <!-- Modal for Add Category -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for Add Category -->
                    <form id="addCategoryForm" novalidate>
                        <div class="mb-3">
                            <label for="addCategoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="addCategoryName" placeholder="Enter Category Name" required>
                            <div class="invalid-feedback">
                                Please enter a category name.
                            </div>
                        </div>
                        <!-- Add any additional fields for the category if needed -->

                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and Popper.js scripts here -->
    <script src="path/to/popper.js"></script>
    <script src="path/to/bootstrap.js"></script>

</body>

</html>
