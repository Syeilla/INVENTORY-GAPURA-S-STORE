<?php
// Menyambungkan ke database
include("function.php");
include("cek.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = "SELECT id_stokbarang, tanggal, nama_barang, ukuran_barang, jumlah_barang, id_jenis, harga_barang, id_satuan, id_distributor FROM stok_barang WHERE id_stokbarang = ?";
    
    // Menyiapkan statement
    if ($stmt = $conn->prepare($query)) {
        // Mengikat parameter
        $stmt->bind_param("i", $id);

        // Eksekusi query
        $stmt->execute();

        // Mengambil hasil
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            echo json_encode($data); // Mengembalikan data dalam format JSON
        } else {
            echo "Data tidak ditemukan.";
        }

        // Menutup statement
        $stmt->close();
    } else {
        echo "Gagal menyiapkan statement: " . $conn->error;
    }

    // Menutup koneksi database
    $conn->close();
} else {
    echo "ID tidak ditemukan.";
}
?>
