<?php
include_once("koneksi.php");

$result = mysqli_query($mysqli, "SELECT * FROM tabel_kamar ORDER BY id_kamar ASC");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Kamar</title>
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
        Daftar Kamar Rumah Sakit Harapan
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th>DATA KELOLA KAMAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="Kamar_Tambah.php" class="btn btn-custom"><i class="fa fa-plus"></i> Tambah data</a>
                                        <a href="Website.php" class="btn btn-custom"><i class="fa fa-home"></i> Home</a>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <form class="form-inline justify-content-end" action="Kamar.php" method="get">
                                            <input class="form-control mr-2" type="search" placeholder="Search by name" aria-label="Search" name="cari">
                                            <button class="btn btn-secondary" type="submit">Search</button>
                                        </form>
										<br>
                                        <a href="CekPasien.php" class="btn btn-custom"><i class="fa fa-user-check"></i> Cek Pasien</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode Kamar</th>
                                                <th>Nama Kamar</th>
                                                <th>Nama Gedung</th>
                                                <th>Status</th>
                                                <th>Harga</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											 if(isset($_GET['cari'])){
                                                $cari = $_GET['cari'];
                                                $result = mysqli_query($mysqli, "SELECT * FROM tabel_kamar WHERE nama_kamar LIKE '%$cari%'");
                                            }
                                            while ($res = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $res['id_kamar'] . "</td>";
                                                echo "<td>" . $res['nama_kamar'] . "</td>";
                                                echo "<td>" . $res['namagedung'] . "</td>";
                                                echo "<td>" . $res['status'] . "</td>";
                                                echo "<td>" . $res['harga'] . "</td>";
                                                echo "<td class='text-center'>
                                                        <a class='btn-icon' href=\"Kamar_Edit.php?id_kamar=$res[id_kamar]\"><i class='fa fa-edit'></i></a>  
                                                        <a class='btn-icon btn-icon-danger' href=\"Kamar_Delete.php?id_kamar=$res[id_kamar]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='fa fa-trash'></i></a>
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
            </div>
        </div>
    </div>
</body>

</html>
