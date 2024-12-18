<?php
// Menyambungkan ke database
include("function.php");
include("cek.php");

if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM stok_barang WHERE id = ?";
    
    // Menyiapkan statement
    if ($stmt = $conn->prepare($query)) {
        // Mengikat parameter
        $stmt->bind_param("i", $id);

        // Eksekusi query
        if ($stmt->execute()) {
            echo "Data berhasil dihapus";
        } else {
            echo "Gagal menghapus data";
        }

        // Menutup statement
        $stmt->close();
    }

    // Menutup koneksi database
    $conn->close();
} else {
    echo "ID tidak ditemukan.";
}
?>
