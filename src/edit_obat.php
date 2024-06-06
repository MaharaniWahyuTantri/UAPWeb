<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $jenis = $_POST["jenis"];
    $harga = $_POST["harga"];
    $stock = $_POST["stock"];

    $sql = "UPDATE obat SET nama='$nama', jenis='$jenis', harga='$harga', stock='$stock' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: bat.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM obat WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nama = $row["nama"];
            $jenis = $row["jenis"];
            $harga = $row["harga"];
            $stock = $row["stock"];
        } else {
            echo "No record found";
            exit();
        }
    } else {
        echo "Invalid request";
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat</title>
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
        <h2 class="mb-4">Edit Obat</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="nama">Nama Obat</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Obat</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $jenis; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga Obat</label>
                <input type="number" step="0.01" class="form-control" id="harga" name="harga" value="<?php echo $harga; ?>" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock Obat</label>
                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $stock; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="oba.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>