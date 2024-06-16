<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <img src="pict/logo.png" alt="Hospitaly Logo">
            </div>
            <nav class="menu">
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="#"><i class="fas fa-calendar-check"></i> Jadwal</a>
                <a href="datapasien.php" class="active"><i class="fas fa-user"></i> Pasien</a>
                <a href="rill.php"><i class="fas fa-user-md"></i> Dokter</a><a href="#"><i class="fas fa-users"></i> Staff</a>
                <a href="#"><i class="fas fa-bed"></i> Kamar</a>
                <a href="#"><i class="fas fa-money-check-alt"></i> Pembayaran</a>
            </nav>
        </aside>
        <main class="main-content">
            <header class="header">
                <div class="user-info">
                    <p>Om Joe</p>
                    <p>Admin</p>
                </div>
            </header>
            <section class="doctor-list">
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                    <button><i class="fas fa-search"></i> Search</button>
                </div>
                <div class="filters">
                <button><i class="fas fa-plus"></i> Tambah Dokter</button>
                </div>
                <div class="doctor-cards">
                </div>
            </section>
        </main>
    </div>
</body>
</html>
