<?php
include_once("koneksi.php");

$query_detail_pasien_ranap = "SELECT * FROM DetailPasienRanap";
$result_detail_pasien_ranap = mysqli_query($mysqli, $query_detail_pasien_ranap);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detail Pasien Rawat Inap</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        header {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 2rem;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .container {
            margin-bottom: 20px;
        }

        .table1 {
            border: none;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .table1 th {
            background-color: #394939;
            color: white;
            padding: 10px;
            text-align: left;
        }

        .table1 td {
            background-color: #fbfbfb;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .btn-custom {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #45a049;
        }

        .btn-icon {
            border: none;
            background: none;
            cursor: pointer;
            color: #4caf50;
            margin: 0 5px;
        }

        .btn-icon:hover {
            color: #45a049;
        }

        .btn-icon-danger {
            color: #dc3545;
        }

        .btn-icon-danger:hover {
            color: #c82333;
        }

        .form-control {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <header>
        Detail Pasien Rawat Inap
    </header>
    <div class="container">
        <div class="row">
                <a href="RawatInap.php" class="btn btn-custom"><i class="fas fa-arrow-left"></i> Kembali ke Halaman Rawat Inap</a>
            <div class="col-12">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Rawat Inap</th>
                            <th>Nama Dokter</th>
                            <th>Nama Pasien</th>
                            <th>Nama Obat</th>
                            <th>Diagnosa</th>
                            <th>Nama Kamar</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result_detail_pasien_ranap)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_inap'] . "</td>";
                            echo "<td>" . $row['namadokter'] . "</td>";
                            echo "<td>" . $row['namapasien'] . "</td>";
                            echo "<td>" . $row['nama_obat'] . "</td>";
                            echo "<td>" . $row['diagnosa'] . "</td>";
                            echo "<td>" . $row['nama_kamar'] . "</td>";
                            echo "<td>" . $row['tgl_masuk'] . "</td>";
                            echo "<td>" . $row['tgl_keluar'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div class="col-12 text-center">
                 <a href="Website.php" class="btn btn-custom"><i class="fas fa-home"></i> Kembali ke Home</a>
            </div>
            </div>
        </div>
    </div>
</body>

</html>