<!DOCTYPE html>
<html>

<head>
    <title>Pendaftaran</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
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
        transition: color 0.3s ease;
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

    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 30px;
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
</style>

<body>
    <header>
        Daftar Pasien Rumah Sakit Harapan
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table1 table table-bordered">
                    <thead>
                        <tr>
                            <th><button id="btn-batal" onclick="window.location.href='Website.php'"><i class="fas fa-times"></i></button>  FORM PENDAFTARAN PASIEN </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="table-responsive">
                                    <form action="Pendaftaran_Aksi.php" method="post" name="form" id="registrationForm" onsubmit="return validateForm()">
                                        <div class="form-group">
                                            <label for="namapasien">Nama Pasien</label>
                                            <input type="text" class="form-control" name="namapasien">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No. Hp</label>
                                            <input type="text" class="form-control" name="no_hp">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgldaftar">Tanggal Daftar</label>
                                            <input type="date" class="form-control" name="tgldaftar">
                                        </div>
                                        <div style="display: flex; justify-content: flex-end;">
                                        <button id="submit-btn" type="submit" name="submitpasien">
    <i class="fas fa-save"></i> SIMPAN
</button>
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
    var noregistrasi = document.forms["form"]["noregistrasi"].value;
    var namapasien = document.forms["form"]["namapasien"].value;
    var sakit = document.forms["form"]["sakit"].value;
    var tgldaftar = document.forms["form"]["tgldaftar"].value;
    var jenisrawat = document.forms["form"]["jenisrawat"].value;
    var kamar = document.forms["form"]["kamar"].value;
    
    if (noregistrasi == "" || namapasien == "" || sakit == "" || tgldaftar == "" || jenisrawat == "" || kamar == "") {
        alert("Kolom harus diisi");
        return false;
    }
}

function changeJenisRawat() {
        var jenisRawat = document.querySelector(".jenisRawat");
        var kamarSection = document.querySelector(".kamarSection");

        var selectedOption = jenisRawat.options[jenisRawat.selectedIndex].value;

        if (selectedOption === "Rawat Jalan") {
            kamarSection.innerHTML = '<label for="kamar">Kamar</label><select name="kamar" class="form-control"><option value="-">-</option></select>';
        } else {
            kamarSection.innerHTML = '<label for="kamar">Kamar</label><select name="kamar" class="form-control"><option value="">- Pilih Kamar -</option><option value="-">-</option><option value="Melati">Melati</option><option value="Mawar">Mawar</option><option value="Anggrek">Anggrek</option><option value="Cendana">Cendana</option></select>';
        }
    }
</script>

</body>
</html>