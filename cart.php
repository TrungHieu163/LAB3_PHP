<?php
session_start();

$products = [
    1 => "Áo",
    2 => "Quần",
    3 => "Giày"
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// 👉 Thêm sản phẩm
if (isset($_GET['add'])) {
    $_SESSION['cart'][] = (int)$_GET['add'];

    // 🔑 Redirect để tránh reload bị thêm lại
    header("Location: cart.php");
    exit;
}
?>

<h3>Sản phẩm</h3>
<?php foreach ($products as $id => $name): ?>
    <?php echo $name; ?>
    <a href="?add=<?php echo $id; ?>">Thêm vào giỏ</a><br>
<?php endforeach; ?>

<hr>

<h3>Giỏ hàng</h3>
<?php
foreach ($_SESSION['cart'] as $item_id) {
    echo $products[$item_id] . "<br>";
}
?>
