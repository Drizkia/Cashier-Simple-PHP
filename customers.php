<?php 
    $conn = require "config.php";
    if (!$conn) {
        echo (mysqli_error($conn));
    }

    $query = "SELECT * FROM customers";
    $result = mysqli_query($conn, $query);

    $nomor = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMERS</title>
</head>
<body>
    <h1>LAMAN CUSTOMERS</h1>
    <table border="1">
        <tr>
            <th>No</th>
            <th>CustomerID</th>
            <th>CompanyName</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_object($result)): ?>
        <tr>
            <td><?= $nomor += 1 ?></td>
            <td><?= $row->CustomerID ?></td>
            <td><?= $row->CompanyName ?></td>
            <td><button><a href="orderlist.php?CustomerID=<?= $row->CustomerID ?>">HALAMAN 2</a></button></td>
        </tr>
        <?php endwhile;?>
    </table>
</body>
</html>