<?php include 'config.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_number = $_POST['order_number'];
    $order_date = $_POST['order_date'];
    $status = $_POST['status'];

    $stmt = $mysqli->prepare("INSERT INTO orders (order_number, order_date, status) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $order_number, $order_date, $status);
    $stmt->execute();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Order - Turban Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Create New Order</h1>
    </header>
    <main>
        <form method="POST">
            <label for="order_number">Order Number:</label>
            <input type="text" name="order_number" id="order_number" required>

            <label for="order_date">Order Date:</label>
            <input type="date" name="order_date" id="order_date" required>

            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="Processing">Processing</option>
                <option value="Shipped">Shipped</option>
                <option value="Delivered">Delivered</option>
            </select>

            <button type="submit">Create Order</button>
        </form>
        <a href="index.php">Back to Order List</a>
    </main>
    <footer>
        <p>&copy; 2024 Turban Store. All rights reserved.</p>
    </footer>
</body>
</html>
