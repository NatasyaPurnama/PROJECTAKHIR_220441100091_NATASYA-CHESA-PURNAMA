<?php
include_once("koneksi.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM tabel_dokter WHERE id = '$id'");

while($res = mysqli_fetch_array($result)) { 
    $namadokter = $res['namadokter'];
    $nohp = $res['nohp'];
    $spesialis = $res['spesialis'];
    $jadwal = $res['jadwal'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Update Dokter</title>
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
    <header>Daftar Dokter Rumah Sakit Harapan</header>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th><button id="btn-batal" onclick="window.location.href='Dokter.php'"><i class="fas fa-times"></i></button> FORM UPDATE DOKTER </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="table-responsive">
                                    <form class="col-12" action="Dokter_Edit1.php" method="post" name="form">
                                        <div class="form-group">
                                            <label for="id">Id Dokter</label>
                                            <input type="text" class="form-control" name="id" value="<?php echo $id;?>" placeholder="Masukkan ID" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="namadokter">Nama Dokter</label>
                                            <input type="text" class="form-control" name="namadokter" value="<?php echo $namadokter;?>" placeholder="Masukkan Nama Dokter">
                                        </div>
                                        <div class="form-group">
                                            <label for="nohp">No HP</label>
                                            <input type="text" class="form-control" name="nohp" value="<?php echo $nohp;?>" placeholder="Masukkan No HP">
                                        </div>
                                        <div class="form-group">
                                            <label for="spesialis">Spesialis</label>
                                            <input type="text" class="form-control" name="spesialis" value="<?php echo $spesialis;?>" placeholder="Masukkan Spesialis">
                                        </div>
                                        <div class="form-group">
                                            <label for="jadwal">Jadwal</label>
                                            <input type="text" class="form-control" name="jadwal" value="<?php echo $jadwal;?>" placeholder="Masukkan Jadwal">
                                        </div>
                                        <div style="display: flex; justify-content: flex-end; margin-top: 15px">
                                            <button id="submit-btn" type="submit" name="update1"><i class="fas fa-save"></i> SIMPAN</button>
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
        function validateForm() {
            var id = document.forms["form"]["id"];
            var namadokter = document.forms["form"]["namadokter"];
            var nohp = document.forms["form"]["nohp"];
            var spesialis = document.forms["form"]["spesialis"];
            var jadwal = document.forms["form"]["jadwal"];

            if (id.value == "") {
                id.classList.add("invalid-input");
            } else {
                id.classList.remove("invalid-input");
            }

            if (namadokter.value == "") {
                namadokter.classList.add("invalid-input");
            } else {
                namadokter.classList.remove("invalid-input");
            }

            if (nohp.value == "") {
                nohp.classList.add("invalid-input");
            } else {
                nohp.classList.remove("invalid-input");
            }

            if (spesialis.value == "") {
                spesialis.classList.add("invalid-input");
            } else {
                spesialis.classList.remove("invalid-input");
            }

            if (jadwal.value == "") {
                jadwal.classList.add("invalid-input");
            } else {
                jadwal.classList.remove("invalid-input");
            }

            if (id.value == "" || namadokter.value == "" || nohp.value == "" || spesialis.value == "" || jadwal.value == "") {
                alert("Kolom harus diisi");
                return false;
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            var inputs = document.querySelectorAll("input");
            inputs.forEach(function(input) {
                input.addEventListener("input", function() {
                    this.classList.remove("invalid-input");
                });
            });
        });

    </script>
</body>

</html>

