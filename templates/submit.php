<?php
// 数据库连接信息
$host = 'Noir';      // MySQL 主机名
$dbname = 'travel_contact'; // 数据库名
$user = 'root';           // 数据库用户名
$password = '123456';           // 数据库密码

// 获取表单数据
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

try {
    // 连接数据库
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 插入数据
    $sql = "INSERT INTO contacts (name, email, phone, message) VALUES (:name, :email, :phone, :message)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

    echo "提交成功！感谢您的反馈。";
} catch (PDOException $e) {
    die("数据库连接失败: " . $e->getMessage());
}

// 关闭连接
$conn = null;
?>