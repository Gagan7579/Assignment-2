<?php include 'config.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM orders WHERE id = $id");
    $order = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $order_number = $_POST['order_number'];
    $order_date = $_POST['order_date'];
    $status = $_POST['status'];

    $stmt = $mysqli->prepare("UPDATE orders SET order_number=?, order_date=?, status=? WHERE id=?");
    $stmt->bind_param("sssi", $order_number, $order_date, $status, $id);
    $stmt->execute();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order - Turban Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Edit Order #<?php echo $order['order_number']; ?></h1>
    </header>
    <main>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $order['id']; ?>">

            <label for="order_number">Order Number:</label>
            <input type="text" name="order_number" id="order_number" value="<?php echo $order['order_number']; ?>" required>

            <label for="order_date">Order Date:</label>
            <input type="date" name="order_date" id="order_date" value="<?php echo $order['order_date']; ?>" required>

            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="Processing" <?php if ($order['status'] == 'Processing') echo 'selected'; ?>>Processing</option>
                <option value="Shipped" <?php if ($order['status'] == 'Shipped') echo 'selected'; ?>>Shipped</option>
                <option value="Delivered" <?php if ($order['status'] == 'Delivered') echo 'selected'; ?>>Delivered</option>
            </select>

            <button type="submit">Update Order</button>
        </form>
        <a href="index.php">Back to Order List</a>
    </main>
    <footer>
        <p>&copy; 2024 Turban Store. All rights reserved.</p>
    </footer>
</body>
</html>
