<?php
include_once("koneksi.php");

$query_tampilkan_pasien = "CALL tampilkanpasien2()";
$result_tampilkan_pasien = mysqli_query($mysqli, $query_tampilkan_pasien);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Pasien</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
       <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Arial', sans-serif;
        }

        header {
            background-color: #28a745;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 2.5rem;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .container {
            margin-top: 20px;
        }

        .btn-custom {
            background-color: #28a745;
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
            background-color: #218838;
            color: white;
            text-decoration: none;
        }

        .table1 {
            border: none;
            width: 100%;
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
            background-color: #343a40;
            color: white;
        }

        .table1 td {
            background-color: #ffffff;
        }

        .table1 tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table1 tbody tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <header>
        Detail Pasien
    </header>
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <a href="Pasien.php" class="btn btn-custom"><i class="fas fa-arrow-left"></i> Kembali ke Halaman Pasien</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Perawatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($result_tampilkan_pasien) > 0) {
                            while ($row = mysqli_fetch_assoc($result_tampilkan_pasien)) {
                                echo "<tr>";
                                echo "<td>" . $row['id_pasien'] . "</td>";
                                echo "<td>" . $row['namapasien'] . "</td>";
                                echo "<td>" . $row['jenis_perawatan'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>Data tidak ditemukan</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <a href="Website.php" class="btn btn-custom"><i class="fas fa-home"></i> Kembali ke Home</a>
            </div>
        </div>
    </div>
</body>
</html>
