<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_cart";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE cart SET quantity = ? WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii", $quantity, $item_id, $_SESSION['user_id']);
    $stmt->execute();

    echo json_encode(["status" => "success", "message" => "Cart updated successfully."]);
}
?>
