<?php 
    $conn = require "config.php";
    if (!$conn) {
        echo (mysqli_error($conn));
    }

    $CustomerID = $_GET['CustomerID'];

    $query = "SELECT * FROM orders WHERE CustomerID='$CustomerID'";
    $result = mysqli_query($conn, $query);

    $nomor = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORDERLIST</title>
</head>
<body>
    <h1>ORDER LIST</h1>
    <table border="1">
        <tr>
            <th>No</th>
            <th>OrderID</th>
            <th>OrderDate</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_object($result)):?>
        <tr>
            <td><?= $nomor += 1 ?></td>
            <td><?= $row->OrderID ?></td>
            <td><?= $row->OrderDate ?></td>
            <td><button><a href="orderdetail.php?OrderID=<?= $row->OrderID ?>">HALAMAN 3</a></button></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>