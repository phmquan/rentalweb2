<?php
include "./model/user.php";
// Assuming you have a parameter named 'start' in the URL
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
function insertCharacterToImagePath($imagePath, $prefix) {
    // Thêm đường dẫn vào trước đường dẫn hình ảnh
    $newImagePath = $prefix . $imagePath;
    return $newImagePath;
}
$conn = connectdb();
$sql = "SELECT title, productimage, price FROM DVD LIMIT $start, 20";
$result = $conn->query($sql);

$count = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-item">';
        echo '<a href="DetailedProduct.php?title=' . urlencode($row["title"]) . '">';
        $newImagePath = insertCharacterToImagePath($row["productimage"], '../adminstrator/dist/');
        echo '<img class="product-image" style="width:246px;height:246px" src="' . $newImagePath . '" alt="' . $row["title"] . '">';
        echo '<div class="product-title">' . $row["title"] . '</div>';
        echo '<div class="product-price">$' . $row["price"] . ' </div>';
        echo '</div>';
        echo '</a>';
        $count++;
    }
} else {
    echo "Không có sản phẩm nào trong cơ sở dữ liệu.";
}


?>