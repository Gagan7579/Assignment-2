<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders - Turban Store</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        nav {
            margin-top: 10px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        .order-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .order {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 48%;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .order h3 {
            margin-top: 0;
        }

        .order p {
            margin: 5px 0;
        }

        .order a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

        .order a:hover {
            background-color: #555;
        }

        .button.delete {
            background-color: #d9534f;
        }

        .button.delete:hover {
            background-color: #c9302c;
        }

        .create-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #5cb85c;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

        .create-button:hover {
            background-color: #4cae4c;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Your Orders</h1>
        <nav>
            <a href="index.html">Home</a>
            <a href="products.html">Products</a>
            <a href="orders.php">Orders</a>
            <a href="contact.html">Contact Us</a>
            <a href="customers.html">Customers</a>
        </nav>
    </header>
    <main>
        <h2>Order History</h2>
        <p>Below is a list of your past orders. Click on an order to view details or edit them.</p>
        <a href="create.php" class="create-button">Create New Order</a>
        <div class="order-list">
            <?php
            $result = $mysqli->query("SELECT * FROM orders ORDER BY order_date DESC");

            while ($row = $result->fetch_assoc()) {
                echo "<div class='order'>
                        <h3>Order #{$row['order_number']}</h3>
                        <p>Date: " . date('m/d/Y', strtotime($row['order_date'])) . "</p>
                        <p>Status: {$row['status']}</p>
                        <a href='edit.php?id={$row['id']}' class='button'>Edit</a>
                        <a href='delete.php?id={$row['id']}' class='button delete' onclick='return confirm(\"Are you sure you want to delete this order?\")'>Delete</a>
                      </div>";
            }
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Turban Store. All rights reserved.</p>
    </footer>
</body>
</html>
