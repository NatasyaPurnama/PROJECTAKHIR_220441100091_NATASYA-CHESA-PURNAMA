<?php
include_once("koneksi.php");
$result = mysqli_query($mysqli, "SELECT * FROM tabel_dokter ORDER BY id ASC"); 

$query_jumlah_dokter = "SELECT COUNT(*) AS total_dokter FROM tabel_dokter";
$result_jumlah_dokter = mysqli_query($mysqli, $query_jumlah_dokter);
$row_jumlah_dokter = mysqli_fetch_assoc($result_jumlah_dokter);
$total_dokter = $row_jumlah_dokter['total_dokter'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dokter</title>
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
        }
        .table1, .table-responsive {
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
        .table2 {
            border: none;
            width: 100%;
            margin-top: 5px;
            border-radius: 10px;
            overflow: hidden;
        }
        .table2 th, .table2 td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table2 tr:nth-child(even) {
            background-color: #f2f2f2;
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
        <?php
        function headeer() {
            echo "Daftar Dokter Rumah Sakit Harapan";
        }
        headeer();
        ?>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th>DATA KELOLA DOKTER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="Dokter_Tambah.php" class="btn btn-custom"><i class="fa fa-plus"></i> Tambah data</a>
                                        <a href="Website.php" class="btn btn-custom"><i class="fa fa-home"></i> Home</a>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <form class="form-inline justify-content-end" action="Dokter.php" method="get">
                                            <input class="form-control mr-2" type="search" placeholder="Search by name" aria-label="Search" name="cari">
                                            <button class="btn btn-secondary" type="submit">Search</button>
                                        </form>
                                        <br>
                                        <?php 
                                            if(isset($_GET['showall']) && $_GET['showall'] == 'true'){
                                                echo '<button class="btn btn-custom" onclick="window.location.href=\'Dokter.php\'">Tampilkan Data Lebih Sedikit</button>';
                                            } else {
                                                echo '<button class="btn btn-custom" onclick="window.location.href=\'Dokter.php?showall=true\'">Tampilkan Semua Data</button>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table2 table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAMA DOKTER</th>
                                                <th>NOHP</th>
                                                <th>SPESIALIS</th>
                                                <th>JADWAL</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(isset($_GET['cari'])){
                                                $cari = $_GET['cari'];
                                                $result = mysqli_query($mysqli, "SELECT * FROM tabel_dokter WHERE namadokter LIKE '%$cari%' LIMIT 5");
                                            } elseif(isset($_GET['showall'])) {
                                                $result = mysqli_query($mysqli, "SELECT * FROM tabel_dokter ORDER BY id ASC");
                                            } else {
                                                $result = mysqli_query($mysqli, "SELECT * FROM tabel_dokter ORDER BY id ASC LIMIT 5");
                                            }
                                            while($res = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>".$res['id']."</td>";
                                                echo "<td>".$res['namadokter']."</td>";
                                                echo "<td>".$res['nohp']."</td>";
                                                echo "<td>".$res['spesialis']."</td>";
                                                echo "<td>".$res['jadwal']."</td>";
                                                echo "<td class='text-center'>
                                                    <a class='btn-icon' href=\"Dokter_Edit.php?id=$res[id]\"><i class='fa fa-edit'></i></a>  
                                                    <a class='btn-icon btn-icon-danger' href=\"Dokter_Delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='fa fa-trash'></i></a>
                                                </td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
				<div class="text-center">
                    <p>Jumlah Dokter: <?php echo $total_dokter; ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
