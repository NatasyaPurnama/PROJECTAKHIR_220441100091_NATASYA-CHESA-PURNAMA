<?php
include_once("koneksi.php");

$query_detail_pasien = "SELECT * FROM detailpasien";
$result_detail_pasien = mysqli_query($mysqli, $query_detail_pasien);

$query_log_pasien = "SELECT * FROM log_pasien";
$result_log_pasien = mysqli_query($mysqli, $query_log_pasien);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detail Pasien</title>
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
            background-color: white;
        }

        .table1 th, .table1 td {
            padding: 15px;
            text-align: left;
        }

        .table1 th {
            background-color: #394939;
            color: white;
        }

        .table1 td {
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
        }

        .table1 tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table1 tbody tr:hover {
            background-color: #e9ecef;
        }

        .btn-custom {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            margin: 5px;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-custom:hover {
            background-color: #45a049;
            color: white;
            text-decoration: none;
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

        .form-control {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <header>
        Log Pasien
    </header>
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Log</th>
                            <th>ID Pasien</th>
                            <th>Nama Pasien</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Tanggal Daftar</th>
                            <th>Waktu Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result_log_pasien)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_log'] . "</td>";
                            echo "<td>" . $row['id_pasien'] . "</td>";
                            echo "<td>" . $row['namapasien'] . "</td>";
                            echo "<td>" . $row['no_hp'] . "</td>";
                            echo "<td>" . $row['alamat'] . "</td>";
                            echo "<td>" . $row['tgldaftar'] . "</td>";
                            echo "<td>" . $row['waktu_daftar'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <a href="Website.php" class="btn btn-custom"><i class="fas fa-arrow-left"></i> Kembali ke Halaman Utama</a>
                <a href="LogHapus.php" class="btn btn-custom"><i class="fas fa-trash-alt"></i> Log Hapus Pasien</a>
            </div>
        </div>
    </div>
</body>

</html>
