<?php
include_once("koneksi.php");

$id_inap = $_GET['id_inap'];

$result = mysqli_query($mysqli, "SELECT * FROM rawat_inap WHERE id_inap = '$id_inap'");

while($res = mysqli_fetch_array($result)) { 
    $id_obat = $res['id_obat'];
    $id_dokter = $res['id_dokter'];
    $id_pasien = $res['id_pasien'];
    $tgl_masuk = $res['tgl_masuk'];
    $tgl_keluar = $res['tgl_keluar'];
    $id_kamar = $res['id_kamar'];
    $diagnosa = $res['diagnosa'];
}

$query_dokter = "SELECT * FROM tabel_dokter";
$result_dokter = mysqli_query($mysqli, $query_dokter);

$query_pasien = "SELECT * FROM tabel_pasien";
$result_pasien = mysqli_query($mysqli, $query_pasien);

$query_kamar = "SELECT * FROM tabel_kamar";
$result_kamar = mysqli_query($mysqli, $query_kamar);

$query_obat = "SELECT * FROM tabel_obat";
$result_obat = mysqli_query($mysqli, $query_obat);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Update Rawat Inap</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" media="screen" title="no title">
</head>
<style>
    header {
        background-color: #4caf50;
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 2rem;
        border-radius: 5px;
        margin-bottom: 20px;
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
    <header>Form Update Rawat Inap</header>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th><button id="btn-batal" onclick="window.location.href='RawatInap.php'"><i class="fas fa-times"></i></button> FORM UPDATE RAWAT INAP </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="table-responsive">
                                    <form action="RanapEdit1.php" method="post">
                                        <div class="form-group">
                                            <label for="id_inap">ID Rawat Inap</label>
                                            <input type="text" class="form-control" name="id_inap" value="<?php echo $id_inap;?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_pasien">Pasien</label>
                                            <input type="text" class="form-control" name="id_pasien" value="<?php echo $id_pasien;?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_dokter">Dokter</label>
                                            <select class="form-control" name="id_dokter">
                                                <?php
                                                while ($row_dokter = mysqli_fetch_assoc($result_dokter)) {
                                                    $selected = ($row_dokter['id_dokter'] == $id_dokter) ? 'selected' : '';
                                                    echo "<option value='" . $row_dokter['id'] . "' $selected>" . $row_dokter['namadokter'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="diagnosa">Diagnosa</label>
                                            <input type="text" class="form-control" name="diagnosa" value="<?php echo $diagnosa;?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_obat">Obat</label>
                                            <select class="form-control" name="id_obat">
                                                <?php
                                                while ($row_obat = mysqli_fetch_assoc($result_obat)) {
                                                    $selected = ($row_obat['id_obat'] == $id_obat) ? 'selected' : '';
                                                    echo "<option value='" . $row_obat['id_obat'] . "' $selected>" . $row_obat['nama_obat'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kamar">Kamar</label>
                                            <select class="form-control" name="id_kamar">
                                                <?php
                                                while ($row_kamar = mysqli_fetch_assoc($result_kamar)) {
                                                    $selected = ($row_kamar['id_kamar'] == $id_kamar) ? 'selected' : '';
                                                    echo "<option value='" . $row_kamar['id_kamar'] . "' $selected>" . $row_kamar['nama_kamar'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_masuk">Tanggal Masuk</label>
                                            <input type="date" class="form-control" name="tgl_masuk" value="<?php echo $tgl_masuk;?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_keluar">Tanggal Keluar</label>
                                            <input type="date" class="form-control" name="tgl_keluar" value="<?php echo $tgl_keluar;?>">
                                        </div>
                                        <button id="submit-btn" type="submit" name="submit"><i class="fas fa-save"></i> SIMPAN</button>
                                    </form>
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
