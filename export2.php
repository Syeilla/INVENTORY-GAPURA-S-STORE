<?php
    require 'function.php';
    require 'cek.php';
?>

<html>
<head>
  <title>LAPORAN PESANAN BARU</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>LAPORAN PESANAN BARU</h2>
			<h4>GAPURA'S STORE</h4>
				<div class="data-tables datatable-dark">
					
					<!-- Masukkan table nya disini, dimulai dari tag TABLE -->
                    <table class="table table-bordered" id="mauExport" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>ID Pesan</th>
                                            <th>Tanggal</th>
                                            <th>Nama Distributor</th>
                                            <th>Nama Barang</th>
                                            <th>Ukuran Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Jumlah Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // Query untuk mendapatkan data dari tabel laporan_pesan
                                            $query = "SELECT * FROM laporan_pesan";
                                            $result = mysqli_query($conn, $query);

                                            // Periksa jika ada data
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                        echo "<td>" . $row['id_pesan'] . "</td>";
                                                        echo "<td>" . $row['tanggal'] . "</td>";
                                                        echo "<td>" . $row['nama_distributor'] . "</td>";
                                                        echo "<td>" . $row['nama_barang'] . "</td>";
                                                        echo "<td>" . $row['ukuran_barang'] . "</td>";
                                                        echo "<td>" . $row['jenis_barang'] . "</td>";
                                                        echo "<td style='color:green'>" . $row['jumlah_barang'] . "</td>";

                                                        //menambahkan button print
                                                        // echo "<td style='white-space: nowrap;'>";
                                                        //     echo "<button class='btn btn-info' data-id='" . $row['id_pesan'] . "' 
                                                        //         onclick='Id(" . $row['id_pesan'] . ")'>Print as PDF</button>";
                                                        // echo "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
                                            }

                                            // Tutup koneksi database
                                            mysqli_close($conn);
                                        ?>
                                    </tbody>
                                </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauExport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>