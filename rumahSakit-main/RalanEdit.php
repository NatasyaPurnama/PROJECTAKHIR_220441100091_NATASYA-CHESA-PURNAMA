<?php
include_once("koneksi.php");

$id_jalan = $_GET['id_jalan'];

$result = mysqli_query($mysqli, "SELECT * FROM rawat_jalan WHERE id_jalan = '$id_jalan'");

while($res = mysqli_fetch_array($result)) { 
    $id_obat = $res['id_obat'];
    $id_dokter = $res['id_dokter'];
    $id_pasien = $res['id_pasien'];
    $diagnosa = $res['diagnosa'];
}

$query_dokter = "SELECT * FROM tabel_dokter";
$result_dokter = mysqli_query($mysqli, $query_dokter);

$query_pasien = "SELECT * FROM tabel_pasien";
$result_pasien = mysqli_query($mysqli, $query_pasien);

$query_obat = "SELECT * FROM tabel_obat";
$result_obat = mysqli_query($mysqli, $query_obat);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Update Rawat Jalan</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" media="screen" title="no title">
</head>

<body>
    <header>Form Update Rawat Jalan</header>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th><button id="btn-batal" onclick="window.location.href='RawatJalan.php'"><i class="fas fa-times"></i></button> FORM UPDATE RAWAT JALAN </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="table-responsive">
                                    <form action="RalanEdit1.php" method="post">
                                        <div class="form-group">
                                            <label for="id_jalan">ID Rawat Jalan</label>
                                            <input type="text" class="form-control" name="id_jalan" value="<?php echo $id_jalan;?>" readonly>
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
