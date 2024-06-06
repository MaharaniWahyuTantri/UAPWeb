<?php
include "koneksi.php";

$sql = "SELECT id, nama, jenis, harga, stock FROM obat";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!--Navbar-->
    <header class="bg-light py-3" style="position: fixed; top: 0; left: 0; right: 0; z-index: 1000;">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">Cegil Farma</h1>
            <nav>
                <a href="about.html" class="text-dark mx-2">About</a>
                <a href="obat.php" class="text-dark mx-2">Obat</a>
                <a href="penjualan.php" class="text-dark mx-2">Penjualan</a>
                <a href="#" class="text-dark mx-2">Anything else?</a>
                <a href="#" class="btn btn-primary ml-3">Log In</a>
            </nav>
        </div>
    </header>
    <div class="container mt-5">
        <h2 class="mb-4" style="padding-top: 50px;">Obat</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["jenis"] . "</td>";
                        echo "<td>" . $row["harga"] . "</td>";
                        echo "<td>" . $row["stock"] . "</td>";
                        echo "<td>
                                <a href='obat.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='obat.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="obat.php" class="btn btn-primary mb-3">Tambah Obat</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>