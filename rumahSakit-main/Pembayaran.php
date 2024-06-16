
<?php
include_once("koneksi.php");

$result = mysqli_query($mysqli, "SELECT * FROM tb_pembayaran ORDER BY id_pembayaran ASC"); ?>

<!DOCTYPE html>
<html>

<head>
	<title> Pembayaran</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        header {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 2rem;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .container {
            margin-bottom: 20px;
        }

        .table1, .table-responsive {
            border: none;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .table1 th {
            background-color: #394939;
            color: white;
            padding: 10px;
            text-align: left;
        }

        .table1 td {
            background-color: #fbfbfb;
            padding: 10px;
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
    </style>

<body>
	<header>
		<?php
        function headeer() {
            echo "Sistem Pembayaran Rumah Sakit Harapan";
        }
        headeer();
        ?>
	</header>
	<div id="dokter">
		<table class="table1 table table-bordered">
			<tr>
				<th>DATA KELOLA  PEMBAYARAN</th>
			</tr>
			<tr>
				<td>
					<div class="row">
						
						<div class="col-md-6">
							<a href="BayarAwal.php" class="btn btn-custom"><i class="fa fa-plus"></i> Tambah data</a>
							<a href="Website.php" class="btn btn-custom"> <i class="fa fa-home"></i> Home</a>
							<a href="DetailPasien.php" class="btn btn-custom"> <i class="fa fa-info-circle"></i> Detail Pembayaran</a>
							<?php
							if (isset($_GET['cari'])) {
								$cari = $_GET['cari'];
							}
							?>
						</div>
						<div class="col-md-6 text-right">
							<form class="form-inline justify-content-end" action="Pembayaran.php" method="get">
								<input class="form-control mr-sm-2" type="search" placeholder="Search by id" aria-label="Search" name="cari">
								<button class="btn btn-secondary" type="submit">Search</button>
							</form>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="table-responsive">
                                    <table class="table table-striped">
							<tr>
								<th>No</th>
								<th>Id Pasien</th>
                                <th>Lama Menginap</th>
								<th>Total Bayar</th>
                                <th>Nominal Pembayaran</th>
								<th>Kembalian</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							<tbody>
								<?php
								if(isset($_GET['cari'])){
									$cari = $_GET['cari'];
		
								$result = mysqli_query($mysqli, "SELECT * FROM tb_pembayaran WHERE id_pasien like '%".$cari."%'");
									}
									else{
										$result = mysqli_query($mysqli, "SELECT * FROM tb_pembayaran
										ORDER BY id_pembayaran ASC"); 
										} 
							
								while($res = mysqli_fetch_array($result)) {
								echo "<tr>";
								echo "<td>".$res['id_pembayaran']."</td>";
								echo "<td>".$res['id_pasien']."</td>";
								echo "<td>".$res['lama_menginap']." Hari"."</td>";
                                echo "<td>"."Rp.".$res['harga']."</td>";
                                echo "<td>"."Rp.".$res['nominal_pembayaran']."</td>";
								echo "<td>"."Rp.".$res['kembalian']."</td>";
								echo "<td>".$res['status']."</td>";
								 echo "<td class='text-center'>
                                                        <a class='btn-icon' href=\"Pembayaran_Edit.php?id_pembayaran=$res[id_pembayaran]\"><i class='fa fa-edit'></i></a>  
                                                        <a class='btn-icon btn-icon-danger' href=\"Pembayaran_Delete.php?id_pembayaran=$res[id_pembayaran]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='fa fa-trash'></i></a>
                                               </td>";
                                                echo "</tr>";
                                }
				 ?>
						</table>
					</div>
				</td>
			</tr>
		</table>
		
	</div>
    </section>
</body>

</html>