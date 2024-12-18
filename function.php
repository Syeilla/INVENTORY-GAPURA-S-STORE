<?php
    session_start();
    
    //membuat koneksi di db
    $conn=mysqli_connect("localhost", "root","","inventarisbarang");

    //menambah barang masuk
    if(isset($_POST['addnewbarang'])){
        $idbarang = $_POST['idbarang'];
        $tanggal = $_POST['tanggal'];
        $namabarang = $_POST['namabarang'];
        $ukuranbarang = $_POST['ukuranbarang'];
        $jumlahbarang = $_POST['jumlahbarang'];
        $hargabarang = $_POST['hargabarang'];
        $idjenis = $_POST['idjenis'];
        $iddistributor = $_POST['iddistributor'];

        $addtomasuk = mysqli_query($conn, "insert into barang_masuk (tanggal_masuk, nama_barang, ukuran_barang, jumlah_barang, harga_barang, id_jenis, id_distributor) values('$tanggal', '$namabarang', '$ukuranbarang', '$jumlahbarang', '$hargabarang', '$idjenis', '$iddistributor')");
        if($addtomasuk){
            header('location:masuk.php');
        } else{
            echo'gagal';
            header('location:masuk.php');
        }
    };

    //menambah stok barang
    if(isset($_POST['addnewstok'])){
        $tanggal = $_POST['tanggal'];
        $namabarang = $_POST['namabarang'];
        $ukuranbarang = $_POST['ukuranbarang'];
        $jumlahbarang = $_POST['jumlahbarang'];
        $idjenis = $_POST['idjenis'];
        $hargabarang = $_POST['hargabarang'];
        $idsatuan = $_POST['idsatuan'];
        $iddistributor = $_POST['iddistributor'];

        // $cekstoksekarang = mysqli_query($conn, "select * from stok_barang where id_stokbarang='$namabarang'");
        // $ambildatanya = mysqli_fetch_array($cekstoksekarang);

        // $stoksekarang = $ambildatanya['jumlah_barang'];
        // $tambahkanstoksekarangdgjumlahmasuk = $stoksekarang+$jumlahbarang;

        $addtotable = mysqli_query($conn, "insert into stok_barang(tanggal, nama_barang, ukuran_barang, jumlah_barang, id_jenis, harga_barang, id_satuan, id_distributor) values('$tanggal', '$namabarang', '$ukuranbarang', '$jumlahbarang', '$idjenis', '$hargabarang', '$idsatuan', '$iddistributor')");
        if($addtotable){
            header('location:stok.php');
        } else{
            echo'gagal';
            header('location:stok.php');
        }
    };

    //menambah jenis baru
    if(isset($_POST['addnewjenis'])){
        $jenisbarang = $_POST['jenisbarang'];
        $namabarang = $_POST['namabarang'];
        $ukuranbarang = $_POST['ukuranbarang'];
        $idsatuan = $_POST['idsatuan'];

        $addtotable = mysqli_query($conn, "insert into jenis(jenis_barang, nama_barang, ukuran_barang, id_satuan) values('$jenisbarang', '$namabarang', '$ukuranbarang', '$idsatuan')");
        if($addtotable){
            header('location:jenis.php');
        } else{
            echo'gagal';
            header('location:jenis.php');
        }
    };

    //menambah harga satuan baru
    if(isset($_POST['addnewsatuan'])){
        $hargasatuan = $_POST['hargasatuan'];
        $namabarang = $_POST['namabarang'];
        $ukuranbarang = $_POST['ukuranbarang'];
        $idjenis = $_POST['idjenis'];

        $addtotable = mysqli_query($conn, "insert into satuan(harga_satuan, nama_barang, ukuran_barang, id_jenis) values('$hargasatuan', '$namabarang', '$ukuranbarang', '$idjenis')");
        if($addtotable){
            header('location:satuan.php');
        } else{
            echo'gagal';
            header('location:satuan.php');
        }
    };

    // menambah nama distributor
    if(isset($_POST['addnewdistributor'])){
        $namadistributor = $_POST['namadistributor'];
        $namabarang = $_POST['namabarang'];
        $ukuranbarang = $_POST['ukuranbarang'];
        $idjenis = $_POST['idjenis'];
        $jumlahbarang = $_POST['jumlahbarang'];
        $hargabarang = $_POST['hargabarang'];
        $idsatuan = $_POST['idsatuan'];

        $addtotable = mysqli_query($conn, "insert into distributor(nama_distributor, nama_barang, ukuran_barang, id_jenis, jumlah_barang, harga_barang, id_satuan) values('$namadistributor', '$namabarang', '$ukuranbarang', '$idjenis', '$jumlahbarang', '$hargabarang', '$idsatuan')");
        if($addtotable){
            header('location:distributor.php');
        } else{
            echo'gagal';
            header('location:distributor.php');
        }
    };

    //memasukkan laporan barang
    if(isset($_POST['addnewlaporanba'])){
        $namadistributor = $_POST['namadistributor'];
        $namabarang = $_POST['namabarang'];
        $jenisbarang = $_POST['jenisbarang'];
        $ukuranbarang = $_POST['ukuranbarang'];
        $jumlahbarang = $_POST['jumlahbarang'];
        $hargabarang = $_POST['hargabarang'];
        $hargasatuan = $_POST['hargasatuan'];

        $addtotable = mysqli_query($conn, "insert into laporan_barang(nama_distributor, nama_barang, jenis_barang, ukuran_barang, jumlah_barang, harga_barang, harga_satuan) values('$namadistributor', '$namabarang', '$jenisbarang', '$ukuranbarang', '$jumlahbarang', '$hargabarang', '$hargasatuan')");
        if($addtotable){
            header('location:laporanba.php');
        } else{
            echo'gagal';
            header('location:laporanba.php');
        }
    };

    //memasukkan laporan pesan
    if(isset($_POST['addnewlaporanpes'])){
        $tanggal = $_POST['tanggal'];
        $namadistributor = $_POST['namadistributor'];
        $namabarang = $_POST['namabarang'];
        $ukuranbarang = $_POST['ukuranbarang'];
        $jenisbarang = $_POST['jenisbarang'];
        $jumlahbarang = $_POST['jumlahbarang'];

        $addtotable = mysqli_query($conn, "insert into laporan_pesan(nama_distributor, nama_barang, ukuran_barang, jenis_barang, jumlah_barang) values('$namadistributor', '$namabarang', '$ukuranbarang', '$jenisbarang', '$jumlahbarang')");
        if($addtotable){
            header('location:laporanpes.php');
        } else{
            echo'gagal';
            header('location:laporanpes.php');
        }
    };

    //delete stok barang
    if (isset($_POST['Id'])) {
        $id = $_POST['Id'];
    
        // Query untuk menghapus data berdasarkan ID
        $query = "DELETE FROM stok_barang WHERE id_stokbarang = ?";
        $stmt = $conn->prepare($query); // $conn adalah koneksi database
        $stmt->bind_param("i", $id);    // Pastikan tipe data sesuai
        if ($stmt->execute()) {
            echo "Data berhasil dihapus.";
        } else {
            echo "Gagal menghapus data: " . $stmt->error;
        }
    };










//     if(isset($_POST['Id'])){
//         $id = $_POST['Id'];

//     // Query untuk menghapus data berdasarkan ID
//     $query = "DELETE FROM stok_barang WHERE Id = ?";
    

// } else {
//     echo "ID tidak ditemukan.";
// };




?>