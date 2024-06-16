<?php
include_once("koneksi.php");

function checkRawatInapStatus($idPasien) {
    $db_host = '152.67.198.76';
    $db_name = 'DB220441100091';
    $db_username = '220441100091';
    $db_password = 'Pw@22091';

    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("CALL cekranap(:idPasien)");
    $stmt->bindParam(':idPasien', $idPasien, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $conn = null;

    return $result['status_rawat'];
}

function getLamaMenginap($idInap) {
    $db_host = '152.67.198.76';
    $db_name = 'DB220441100091';
    $db_username = '220441100091';
    $db_password = 'Pw@22091';

    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("CALL lamamenginap(:idInap)");
    $stmt->bindParam(':idInap', $idInap, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $conn = null;

    return $result['LamaMenginap'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['id_pasien'])) {
        $idPasien = $_POST['id_pasien'];
        $statusRawat = checkRawatInapStatus($idPasien);
         $lamaMenginap = "";

        if ($statusRawat == 'Pasien Rawat Inap') {
            $lamaMenginap = getLamaMenginap($idPasien);
        }else{
            $lamaMenginap = 1;
    }

        echo json_encode(array("statusRawat" => $statusRawat, "lamaMenginap" => $lamaMenginap));
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pembayaran</title>
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

    .btn {
        border-radius: 3px;
        transition: all 0.3s ease;
    }

    #btn-batal {
        background-color: transparent;
        color: #ffffff;
        border: none;
        padding: 10px 15px;
        font-size: 1.2rem;
        cursor: pointer;
        transition: color 0.3s ease;
        margin-left: 5px;
    }

    #btn-batal:hover {
        color: #5a6268;
    }

    #cek-pasien-btn {
        background-color: #007bff;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        cursor: pointer;
    }

    #cek-pasien-btn:hover {
        background-color: #0056b3;
    }

    #lanjutkan-btn {
        background-color: #28a745;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        cursor: pointer;
    }

    #lanjutkan-btn:hover {
        background-color: #218838;
    }

    .form-control[readonly] {
        background-color: #f8f9fa !important;
        cursor: not-allowed;
    }
</style>

<body>
    <header>Rumah Sakit Harapan</header>
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
                                    <form class="col-12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form">
                                        <div class="form-group">
                                            <label for="id_pasien">Nama Pasien</label>
                                            <select class="form-control" name="id_pasien" id="id_pasien">
                                                <?php
                                                    $query_pasien = "SELECT id_pasien, namapasien FROM tabel_pasien";
                                                    $result_pasien = mysqli_query($mysqli, $query_pasien);
                                                    while ($row_pasien = mysqli_fetch_assoc($result_pasien)) {
                                                        echo "<option value='" . $row_pasien['id_pasien'] . "'>" . $row_pasien['namapasien'] . "</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div style="display: flex; justify-content: flex-end; margin-top: 15px">
                                            <button id="cek-pasien-btn" type="button" class="btn btn-primary"><i class="fas fa-search"></i> Cek Pasien</button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form class="col-12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form">
                                    <div class="form-group">
                                        <label for="jenis_perawatan">Jenis Perawatan</label>
                                        <input type="text" class="form-control" name="jenis_perawatan" id="jenis-perawatan" readonly>
                                    </div>
                                    
    <div class="form-group">
        <label for="lama_menginap">Lama Menginap (hari)</label>
        <input type="text" class="form-control" name="lama_menginap" id="lama-menginap" readonly>
    </div>
<button id="lanjutkan-btn" type="button" class="btn btn-success"><i class="fas fa-arrow-right"></i> Lanjutkan Pembayaran</button>
</form>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     <script>
        document.getElementById("cek-pasien-btn").addEventListener("click", function() {
    var idPasien = document.getElementById("id_pasien").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById("jenis-perawatan").value = response.statusRawat;
                document.getElementById("lama-menginap").value = response.lamaMenginap;
            } else {
                console.error('Request failed: ' + xhr.status);
            }
        }
    };
    xhr.open("POST", "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id_pasien=" + idPasien);
});

document.getElementById("lanjutkan-btn").addEventListener("click", function() {
    var idPasien = document.getElementById("id_pasien").value;
    var namaPasien = document.getElementById("id_pasien").options[document.getElementById("id_pasien").selectedIndex].text;
    var lamaMenginap = document.getElementById("lama-menginap").value;

    window.location.href = "Pembayaran_Tambah.php?id_pasien=" + encodeURIComponent(idPasien) + "&lama_menginap=" + encodeURIComponent(lamaMenginap);
});

</script>
</body>
</html>
