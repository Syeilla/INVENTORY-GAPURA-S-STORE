<?php
// Menyambungkan ke database
include("function.php");
include("cek.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['editId'];
    $tanggal = $_POST['tanggal'];
    $nama_barang = $_POST['nama_barang'];
    $ukuran_barang = $_POST['ukuran_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $id_jenis = $_POST['id_jenis'];
    $harga_barang = $_POST['harga_barang'];
    $id_satuan = $_POST['id_satuan'];
    $id_distributor = $_POST['id_distributor'];

    // Query untuk mengupdate data berdasarkan ID
    $query = "UPDATE stok_barang SET tanggal = ?, nama_barang = ?, ukuran_barang = ?, jumlah_barang = ?, id_jenis = ?, harga_barang = ?, id_satuan = ?, id_distributor = ? WHERE id_stokbarang = ?";
    
    // Menyiapkan statement
    if ($stmt = $conn->prepare($query)) {
        // Mengikat parameter
        $stmt->bind_param("sssiiiisi", $tanggal, $nama_barang, $ukuran_barang, $jumlah_barang, $id_jenis, $harga_barang, $id_satuan, $id_distributor, $id);


        // Eksekusi query
        if ($stmt->execute()) {
            // Menampilkan alert dan mengarahkan ke stok.php
            echo "<script>
                    alert('Data berhasil diedit');
                    window.location.href = 'stok.php'; 
                  </script>";
        } else {
            echo "Gagal mengedit data: " . $stmt->error;
        }

        // Menutup statement
        $stmt->close();
    } else {
        echo "Gagal menyiapkan statement: " . $conn->error;
    }

    // Menutup koneksi database
    $conn->close();
} else {
    echo "Semua data harus diisi.";
}
?>
