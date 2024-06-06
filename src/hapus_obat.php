<?php
include "koneksi.php";
$obat_id = $_GET['id'];
$query = "DELETE FROM obat WHERE id=$obat_id";

mysqli_query($conn, $query);
if ($conn->query($query) === TRUE) {
    header('Location: kocakobat.php');
    exit;
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>