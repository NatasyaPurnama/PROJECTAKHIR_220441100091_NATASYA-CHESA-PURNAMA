<?php
include_once("koneksi.php");

$idPasien = $_GET['id_pasien'] ?? '';
$lamaMenginap = $_GET['lama_menginap'] ?? '';

function checkRawatInap($idPasien, $mysqli) {
    $query_check = "SELECT * FROM rawat_inap WHERE id_pasien = '$idPasien'";
    $result_check = mysqli_query($mysqli, $query_check);
    $row_check = mysqli_fetch_assoc($result_check);
    
    if ($row_check) {
        return true;
    } else {
        return false;
    }
}

$isRawatInap = checkRawatInap($idPasien, $mysqli);

if ($isRawatInap) {
    $query_harga_kamar = "SELECT total_bayar FROM cek_ranap WHERE id_pasien = '$idPasien'";
} else {
    $query_harga_kamar = "SELECT harga_obat FROM cek_ralan WHERE id_pasien = '$idPasien'";
}

$result_harga_kamar = mysqli_query($mysqli, $query_harga_kamar);
$row_harga_kamar = mysqli_fetch_assoc($result_harga_kamar);

if ($isRawatInap) {
    $harga = $row_harga_kamar['total_bayar'];
} else {
    $harga = $row_harga_kamar['harga_obat'];
}

$totalBayar = $harga * $lamaMenginap;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Pembayaran</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" media="screen" title="no title">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    header {
        width: 100%;
        height: 60px;
        background-color: #4caf50;
        color: white;
        font-size: 27px;
        text-align: center;
        font-weight: bold;
        line-height: 60px;
    }

    body {
        background-color: #c9f5c9;
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 30px;
    }

    .table1 {
        border: none;
        width: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .table1 th {
        background-color: #394939;
        color: white;
        padding: 15px;
        text-align: left;
    }

    .table1 td {
        background-color: #fbfbfb;
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }

    #submit-btn {
        background-color: #4caf50;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 3px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #submit-btn:hover {
        background-color: #45a049;
    }

    #btn-batal {
        background-color: transparent;
        color: #FFFFFF;
        border: none;
        padding: 0;
        font-size: 1.2rem;
        cursor: pointer;
        transition: color 0.3s ease;
        margin-left: 5px;
        margin-right: 10px;
    }

    #btn-batal:hover {
        color: #5a6268;
    }

    .invalid-input {
        border-color: red;
    }
</style>

<body>
    <header>Daftar Pasien Rumah Sakit Harapan</header>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th><button id="btn-batal" onclick="window.location.href='Pembayaran.php'"><i class="fas fa-times"></i></button> FORM PEMBAYARAN PASIEN </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="table-responsive">
                                    <form class="col-12" action="Pembayaran_Aksi.php" method="post" name="form">
                                        <div class="form-group">
                                            <label for="id_pasien">ID Pasien</label>
                                            <input type="text" class="form-control" name="id_pasien" id="id_pasien" value="<?php echo htmlspecialchars($idPasien); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="lama_menginap">Lama Menginap</label>
                                            <input type="text" class="form-control" name="lama_menginap" id="lama_menginap" value="<?php echo htmlspecialchars($lamaMenginap); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Total Bayar</label>
                                            <input type="text" class="form-control" name="harga" value="<?php echo htmlspecialchars($totalBayar); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nominal_pembayaran">Nominal Pembayaran</label>
                                            <input type="number" class="form-control" name="nominal_pembayaran" id="nominal_pembayaran">
                                        </div>
                                        <div class="form-group">
                                            <label for="kembalian">Kembalian</label>
                                            <input type="text" class="form-control" name="kembalian" id="kembalian">
                                        </div>
                                        <div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" name="status" id="status">
        <option value="Belum Lunas">Belum Lunas</option>
        <option value="Lunas">Lunas</option>
    </select>
</div>

                                        <div style="display: flex; justify-content: flex-end; margin-top: 15px">
                                            <button id="submit-btn" type="submit" name="submit"><i class="fas fa-money-bill-wave"></i> BAYAR</button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("cek-pasien-btn").addEventListener("click", function () {
            var idPasien = document.getElementById("id_pasien").value;
            fetch(`BayarAwal.php?id_pasien=${idPasien}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        document.getElementById("id_pasien").value = data.idPasien;
                    } else {
                        alert(data.message || 'Data pasien tidak ditemukan.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
        document.getElementById("hitung-btn").addEventListener("click", function () {
            var totalBayar = <?php echo $totalBayar; ?>;
            var nominalPembayaran = parseFloat(document.getElementById("nominal_pembayaran").value);
            var kembalian = nominalPembayaran - totalBayar;
            if (kembalian < 0) {
                kembalian = 0;
            }
            document.getElementById("kembalian").value = kembalian.toFixed(2);
        });
    </script>
</body>

</html>
