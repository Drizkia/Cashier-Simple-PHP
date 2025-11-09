<?php 
    $conn = require "config.php";
    if (!$conn) {
        echo (mysqli_error($conn));
    }

    $OrderID = $_GET['OrderID'];

    $query = "SELECT o.OrderID, p.ProductName, o.UnitPrice, o.Quantity, o.Discount
        FROM orderdetails o JOIN products p ON o.ProductID = p.ProductID";
    
    $result = mysqli_query($conn, $query);
    $nomor = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORDER DETAIL</title>
</head>
<body>
    <h1>ORDER DETAIL DARI ORDER ID: <?= $OrderID ?></h1>

    <table border="1">
        <tr>
            <th>No</th>
            <th>OrderID</th>
            <th>ProductName</th>
            <th>UnitPrice</th>
            <th>Quantity</th>
            <th>Discount</th>
            <th>Sub Total</th>
            <th>Total Harga</th>
        </tr>
        <?php while($row = mysqli_fetch_object($result)):
            $SubTotal = $row->UnitPrice * $row->Quantity;
            $TotalHarga = $SubTotal * (1 - $row->Discount);
            ?>
            <tr>
                <td><?= $nomor += 1 ?></td>
                <td><?= $row->OrderID ?></td>
                <td><?= $row->ProductName ?></td>
                <td><?= $row->UnitPrice ?></td>
                <td><?= $row->Quantity ?></td>
                <td><?= $row->Discount ?></td>
                <td><?= $SubTotal ?></td>
                <td><?= $TotalHarga ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>