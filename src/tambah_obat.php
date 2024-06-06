<?php
include "koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $jenis = $_POST["jenis"];
    $harga = $_POST["harga"];
    $stock = $_POST["stock"];

    $sql = "INSERT INTO obat (nama, jenis, harga, stock) VALUES ('$nama', '$jenis', '$harga', '$stock')";

    if ($conn->query($sql) === TRUE) {
        header("Location: display_obat.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Obat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!--Navbar-->
    <header class="bg-light py-3">
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
        <h2 class="mb-4">Tambah Obat</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="nama">Nama Obat</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Obat</label>
                <input type="text" class="form-control" id="jenis" name="jenis" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga Obat</label>
                <input type="number" step="0.01" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock Obat</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="obat.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>