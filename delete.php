<?php include 'config.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mysqli->query("DELETE FROM orders WHERE id = $id");
    header("Location: index.php");
}
?>
