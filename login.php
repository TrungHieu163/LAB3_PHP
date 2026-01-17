<form method="post">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Đăng nhập</button>
</form>

<?php
session_start();
require_once "../LAB2/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password_input = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password_input, $user['password'])) {
        $_SESSION['user'] = $user['email'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Sai email hoặc mật khẩu";
    }
}
?>
