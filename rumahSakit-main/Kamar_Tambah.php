<!DOCTYPE html>
<html>

<head>
    <title>Tambah Kamar</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
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
    <header>Daftar Kamar Rumah Sakit Harapan</header>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th><button id="btn-batal" onclick="window.location.href='Kamar.php'"><i class="fas fa-times"></i></button> FORM TAMBAH KAMAR </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="table-responsive">
                                    <form action="Kamar_Aksi.php" method="post" name="form" onsubmit="return validateForm()">
                                        <div class="form-group">
                                            <label for="nama_kamar">Nama Kamar</label>
                                            <input type="text" class="form-control" name="nama_kamar" placeholder="Masukkan Nama Kamar">
                                        </div>
                                        <div class="form-group">
                                            <label for="namagedung">Nama Gedung</label>
                                            <select class="form-control" name="namagedung">
                                                <option value="RKBF-401">RKBF-401</option>
                                                <option value="RKBF-402">RKBF-402</option>
                                                <option value="RKBF-403">RKBF-403</option>
                                                <option value="RKBF-404">RKBF-404</option>
                                                <option value="RKBF-405">RKBF-405</option>
                                                <option value="RKBF-406">RKBF-406</option>
                                                <option value="RKBF-407">RKBF-407</option>
                                                <option value="RKBF-408">RKBF-408</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="Kosong">Kosong</option>
                                                <option value="Terisi">Terisi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga">
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
        var id_kamar = document.forms["form"]["id_kamar"];
        var nama_kamar = document.forms["form"]["nama_kamar"];
        var namagedung = document.forms["form"]["namagedung"];
        var status = document.forms["form"]["status"];
        var harga = document.forms["form"]["harga"];

        var valid = true;

        if (id_kamar.value == "") {
            id_kamar.classList.add("invalid-input");
            valid = false;
        } else {
            id_kamar.classList.remove("invalid-input");
        }

        if (nama_kamar.value == "") {
            nama_kamar.classList.add("invalid-input");
            valid = false;
        } else {
            nama_kamar.classList.remove("invalid-input");
        }

        if (namagedung.value == "") {
            namagedung.classList.add("invalid-input");
            valid = false;
        } else {
            namagedung.classList.remove("invalid-input");
        }

        if (status.value == "") {
            status.classList.add("invalid-input");
            valid = false;
        } else {
            status.classList.remove("invalid-input");
        }

        if (harga.value == "") {
            harga.classList.add("invalid-input");
            valid = false;
        } else {
            harga.classList.remove("invalid-input");
        }

        if (!valid) {
            alert("Kolom harus diisi");
        }
        return valid;
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
