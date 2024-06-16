<?php
include_once("koneksi.php");

$query_obat = "SELECT * FROM tabel_obat";
$result_obat = mysqli_query($mysqli, $query_obat);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Obat</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

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
            margin-top: 30px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            padding: 15px;
            font-size: 1rem;
        }

        #submit-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #submit-btn:hover {
            background-color: #218838;
        }

        #btn-batal {
            background-color: transparent;
            color: #dc3545;
            border: none;
            padding: 0;
            font-size: 1.2rem;
            cursor: pointer;
            transition: color 0.3s ease;
            margin-left: 10px;
            margin-top: 10px;
        }

        #btn-batal:hover {
            color: #c82333;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <header>
        Tambah Obat
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                        <button id="btn-batal" onclick="window.location.href='Obat.php'"><i class="fas fa-times"></i> Batal</button>
                <div class="form-container">
                    <form action="TambahObatAksi.php" method="post">
                        <div class="form-group">
                            <label for="nama_obat">Nama Obat</label>
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Masukkan nama obat" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_obat">Harga Obat</label>
                            <input type="number" class="form-control" id="harga_obat" name="harga_obat" placeholder="Masukkan harga obat" required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan jumlah stok" required>
                        </div>
                        <button id="submit-btn" type="submit" name="submit"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
