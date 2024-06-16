<?php
include_once("koneksi.php");
$id_obat = $_GET['id_obat'];

$result = mysqli_query($mysqli, "SELECT * FROM tabel_obat WHERE id_obat = '$id_obat'");

while($res = mysqli_fetch_array($result)) { 
    $nama_obat = $res['nama_obat'];
    $harga_obat = $res['harga_obat'];
    $stok = $res['stok'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Update Obat</title>
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
    <header>Daftar Obat Rumah Sakit Harapan</header>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th><button id="btn-batal" onclick="window.location.href='Obat.php'"><i class="fas fa-times"></i></button> FORM UPDATE OBAT </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="table-responsive">
                                <form class="col-12" action="ObatEdit1.php" method="post" name="form">
    <div class="form-group">
        <label for="id">ID Obat</label>
        <input type="text" class="form-control" name="id_obat" value="<?php echo $id_obat;?>" readonly>
    </div>
    <div class="form-group">
        <label for="nama_obat">Nama Obat</label>
        <input type="text" class="form-control" name="nama_obat" value="<?php echo $nama_obat;?>">
    </div>
    <div class="form-group">
        <label for="harga_obat">Harga Obat</label>
        <input type="text" class="form-control" name="harga_obat" value="<?php echo $harga_obat;?>">
    </div>
    <div class="form-group">
        <label for="stok">Stok Obat</label>
        <input type="text" class="form-control" name="stok" value="<?php echo $stok;?>">
    </div>
    <div style="display: flex; justify-content: flex-end; margin-top: 15px">
        <button id="submit-btn" type="submit" name="submit"><i class="fas fa-save"></i> SIMPAN</button>
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
        var id_obat = document.forms["form"]["id_obat"];
        var nama_obat = document.forms["form"]["nama_obat"];
        var harga_obat = document.forms["form"]["harga_obat"];
        var stok = document.forms["form"]["stok"];

        if (id_obat.value == "") {
            id_obat.classList.add("invalid-input");
        } else {
            id_obat.classList.remove("invalid-input");
        }

        if (nama_obat.value == "") {
            nama_obat.classList.add("invalid-input");
        } else {
            nama_obat.classList.remove("invalid-input");
        }

        if (harga_obat.value == "") {
            harga_obat.classList.add("invalid-input");
        } else {
            harga_obat.classList.remove("invalid-input");
        }

        if (stok.value == "") {
            stok.classList.add("invalid-input");
        } else {
            stok.classList.remove("invalid-input");
        }

        if (id_obat.value == "" || nama_obat.value == "" || harga_obat.value == "" || stok.value == "") {
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
