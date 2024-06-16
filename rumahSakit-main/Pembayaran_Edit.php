<?php
include_once("koneksi.php");

$id_pembayaran = $_GET['id_pembayaran'];

$result = mysqli_query($mysqli, "SELECT * FROM tb_pembayaran WHERE id_pembayaran = '$id_pembayaran'");

while($res = mysqli_fetch_array($result)) { 
    $id_pasien = $res['id_pasien'];
    $lama_menginap = $res['lama_menginap'];
    $harga = $res['harga'];
    $nominal_pembayaran = $res['nominal_pembayaran'];
    $kembalian = $res['kembalian'];
    $status = $res['status'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Update Pembayaran</title>
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
    <header>Pembayaran Rumah Sakit Harapan</header>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th><button id="btn-batal" onclick="window.location.href='Pembayaran.php'"><i class="fas fa-times"></i></button> FORM UPDATE PEMBAYARAN </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="table-responsive">
                                <form class="col-12" action="Pembayaran_Edit2.php" method="post" name="form">
    <div class="form-group">
        <label for="id">No Registrasi</label>
        <input type="text" class="form-control" name="id_pasien" value="<?php echo $id_pasien;?>" readonly>
    </div>
    <div class="form-group">
        <label for="name">Lama Menginap</label>
        <input type="text" class="form-control" name="lama_menginap" value="<?php echo $lama_menginap;?>" readonly>
    </div>
    <div class="form-group">
        <label for="id">Total Bayar</label>
        <input type="text" class="form-control" name="harga" value="<?php echo $harga;?>" readonly>
    </div>
    <div class="form-group">
        <label for="id">Nominal Pembayaran</label>
        <input type="text" class="form-control" name="nominal_pembayaran" value="<?php echo $nominal_pembayaran;?>">
    </div>
    <div class="form-group">
        <label for="id">Kembalian</label>
        <input type="text" class="form-control" name="kembalian" value="<?php echo $kembalian;?>">
    </div>
    <div class="form-group">
        <label for="id">Status</label>
        <input type="text" class="form-control" name="status" value="<?php echo $status;?>">
    </div>
        <div style="display: flex; justify-content: flex-end; margin-top: 15px">
                                        <button id="submit-btn" type="submit" name="submitpembayaran"><i class="fas fa-save"></i> SIMPAN</button>
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
        var nominal_pembayaran = document.forms["form"]["nominal_pembayaran"];
        var kembalian = document.forms["form"]["kembalian"];

        if (nominal_pembayaran.value == "") {
            nominal_pembayaran.classList.add("invalid-input");
        } else {
            nominal_pembayaran.classList.remove("invalid-input");
        }

        if (kembalian.value == "") {
            kembalian.classList.add("invalid-input");
        } else {
            kembalian.classList.remove("invalid-input");
        }

        if (nominal_pembayaran.value == "" || kembalian.value == "") {
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
