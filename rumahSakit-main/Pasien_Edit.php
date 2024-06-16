<?php
include_once("koneksi.php");

$id_pasien = $_GET['id_pasien'];

$result = mysqli_query($mysqli, "SELECT * FROM tabel_pasien WHERE id_pasien = '$id_pasien'");

while($res = mysqli_fetch_array($result)) { 
    $namapasien = $res['namapasien'];
    $no_hp = $res['no_hp'];
    $tgldaftar = $res['tgldaftar'];
    $alamat = $res['alamat'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Update Pasien</title>
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
    <header>Daftar Pasien Rumah Sakit Harapan</header>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th><button id="btn-batal" onclick="window.location.href='Pasien.php'"><i class="fas fa-times"></i></button> FORM UPDATE PASIEN </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="table-responsive">
                                <form class="col-12" action="Pasien_Edit1.php" method="post" name="form">
    <div class="form-group">
        <label for="id">No Registrasi</label>
        <input type="text" class="form-control" name="id_pasien" value="<?php echo $id_pasien;?>" readonly>
    </div>
    <div class="form-group">
        <label for="name">Nama Pasien</label>
        <input type="text" class="form-control" name="namapasien" value="<?php echo $namapasien;?>">
    </div>
    <div class="form-group">
        <label for="id">No. Hp</label>
        <input type="text" class="form-control" name="no_hp" value="<?php echo $no_hp;?>">
    </div>
    <div class="form-group">
        <label for="id">Alamat</label>
        <input type="text" class="form-control" name="alamat" value="<?php echo $alamat;?>">
    </div>
    <div class="form-group">
        <label for="name">Tanggal Daftar</label>
        <input type="date" class="form-control" name="tgldaftar" value="<?php echo $tgldaftar;?>" readonly>
    </div>
        <div style="display: flex; justify-content: flex-end; margin-top: 15px">
                                        <button id="submit-btn" type="submit" name="submitpasien1"><i class="fas fa-save"></i> SIMPAN</button>
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
        var noregistrasi = document.forms["form"]["noregistrasi"];
        var namapasien = document.forms["form"]["namapasien"];
        var sakit = document.forms["form"]["sakit"];
        var tgldaftar = document.forms["form"]["tgldaftar"];
        var jenisrawat = document.forms["form"]["jenisrawat"];
        var kamar = document.forms["form"]["kamar"];

        if (noregistrasi.value == "") {
            noregistrasi.classList.add("invalid-input");
        } else {
            noregistrasi.classList.remove("invalid-input");
        }

        if (namapasien.value == "") {
            namapasien.classList.add("invalid-input");
        } else {
            namapasien.classList.remove("invalid-input");
        }

        if (sakit.value == "") {
            sakit.classList.add("invalid-input");
        } else {
            sakit.classList.remove("invalid-input");
        }

        if (tgldaftar.value == "") {
            tgldaftar.classList.add("invalid-input");
        } else {
            tgldaftar.classList.remove("invalid-input");
        }

        if (jenisrawat.value == "") {
            jenisrawat.classList.add("invalid-input");
        } else {
            jenisrawat.classList.remove("invalid-input");
        }

        if (kamar.value == "") {
            kamar.classList.add("invalid-input");
        } else {
            kamar.classList.remove("invalid-input");
        }

        if (noregistrasi.value == "" || namapasien.value == "" || sakit.value == "" || tgldaftar.value
        == "" || jenisrawat.value == "" || kamar.value == "") {
alert("Kolom harus diisi");
return false;
}
}
document.addEventListener("DOMContentLoaded", function() {
    var inputs = document.querySelectorAll("input, select");
    inputs.forEach(function(input) {
        input.addEventListener("input", function() {
            this.classList.remove("invalid-input");
        });
    });
});

</script>
</body>
</html>