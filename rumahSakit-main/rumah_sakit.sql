CREATE TABLE rawat_inap (
  id_inap INT(11) NOT NULL AUTO_INCREMENT,
  id_obat INT(11) NOT NULL,
  id_dokter INT(11) NOT NULL,
  id_pasien INT(11) NOT NULL,
  tgl_keluar DATE NOT NULL,
  tgl_masuk DATE NOT NULL,
  id_kamar INT(11) NOT NULL,
  diagnosa VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_inap),
  CONSTRAINT fk_rawat_inap_dokter FOREIGN KEY (id_dokter) REFERENCES tabel_dokter(id),
  CONSTRAINT fk_rawat_inap_pasien FOREIGN KEY (id_pasien) REFERENCES tabel_pasien(id_pasien),
  CONSTRAINT fk_rawat_inap_kamar FOREIGN KEY (id_kamar) REFERENCES tabel_kamar(id_kamar),
  CONSTRAINT fk_rawat_inap_obat FOREIGN KEY (id_obat) REFERENCES tabel_obat(id_obat)
);

CREATE TABLE rawat_jalan (
  id_jalan INT(11) NOT NULL AUTO_INCREMENT,
  id_dokter INT(11) NOT NULL,
  id_pasien INT(11) NOT NULL,
  id_obat INT(11) NOT NULL,
  diagnosa VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_jalan),
  CONSTRAINT fk_rawat_jalan_dokter FOREIGN KEY (id_dokter) REFERENCES tabel_dokter(id),
  CONSTRAINT fk_rawat_jalan_pasien FOREIGN KEY (id_pasien) REFERENCES tabel_pasien(id_pasien),
  CONSTRAINT fk_rawat_jalan_obat FOREIGN KEY (id_obat) REFERENCES tabel_obat(id_obat)
);

CREATE TABLE tabel_dokter (
  id INT(5) NOT NULL AUTO_INCREMENT,
  namadokter VARCHAR(50) NOT NULL,
  nohp VARCHAR(20) NOT NULL,
  spesialis VARCHAR(50) NOT NULL,
  jadwal VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE tabel_kamar (
  id_kamar INT(3) NOT NULL AUTO_INCREMENT,
  nama_kamar VARCHAR(50) NOT NULL,
  namagedung VARCHAR(50) NOT NULL,
  STATUS VARCHAR(50) NOT NULL,
  harga INT(50) NOT NULL,
  PRIMARY KEY (id_kamar)
);

CREATE TABLE tabel_obat (
  id_obat INT(11) NOT NULL AUTO_INCREMENT,
  nama_obat VARCHAR(50) NOT NULL,
  harga_obat INT(11) NOT NULL,
  stok INT(11) NOT NULL,
  PRIMARY KEY (id_obat)
);

CREATE TABLE tabel_pasien (
  id_pasien INT(7) NOT NULL AUTO_INCREMENT,
  namapasien VARCHAR(50) NOT NULL,
  no_hp VARCHAR(100) NOT NULL,
  alamat VARCHAR(50) NOT NULL,
  tgldaftar DATE NOT NULL,
  PRIMARY KEY (id_pasien)
);

CREATE TABLE tb_pembayaran (
  id_pembayaran INT(11) NOT NULL AUTO_INCREMENT,
  id_pasien INT(11) NOT NULL,
  lama_menginap INT(20) NOT NULL,
  harga INT(20) NOT NULL,
  nominal_pembayaran INT(20) NOT NULL,
  kembalian INT(20) NOT NULL,
  STATUS VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_pembayaran),
  CONSTRAINT fk_tb_pembayaran_pasien FOREIGN KEY (id_pasien) REFERENCES tabel_pasien(id_pasien)
);


INSERT INTO rawat_inap (id_inap, id_obat, id_dokter, id_pasien, tgl_keluar, tgl_masuk, id_kamar, diagnosa) VALUES
(2, 4, 1, 4, '2024-06-20', '2024-06-02', 4, 'Flu'),
(3, 1, 1, 2, '2024-06-17', '2024-06-14', 1, 'Sakit Hati');

INSERT INTO rawat_jalan (id_jalan, id_dokter, id_pasien, id_obat, diagnosa) VALUES
(1, 1, 1, 1, 'Sakit Kep'),
(2, 3, 3, 3, 'Batuk Kronis'),
(3, 5, 5, 5, 'Sakit Perut'),
(4, 7, 7, 7, 'Asam Lambung'),
(5, 9, 9, 9, 'Infeksi Kulit');

INSERT INTO tabel_dokter (id, namadokter, nohp, spesialis, jadwal) VALUES
(1, 'Dr. Budi Santosoo', '081234567890', 'Bedah', 'Senin-Jumat, 08.00-16.00'),
(2, 'Dr. Ani Cahyani', '087654321098', 'Kandungan', 'Selasa-Kamis, 09.00-17.00'),
(3, 'Dr. Agus Wijaya', '081298765432', 'Anak', 'Senin-Jumat, 07.00-15.00'),
(4, 'Dr. Rita Setiawan', '085712345678', 'Gigi', 'Senin-Jumat, 10.00-18.00'),
(5, 'Dr. Fajar Rahman', '089876543210', 'Kulit', 'Rabu-Minggu, 11.00-19.00'),
(6, 'Dr. Susi Hartati', '081112233445', 'Mata', 'Senin-Jumat, 08.00-16.00'),
(7, 'Dr. Iwan Wibowo', '081234567890', 'Jantung', 'Selasa-Kamis, 09.00-17.00'),
(8, 'Dr. Lina Amelia', '087654321098', 'Paru-paru', 'Senin-Jumat, 07.00-15.00'),
(9, 'Dr. Bambang Sugianto', '081298765432', 'Saraf', 'Senin-Jumat, 10.00-18.00'),
(10, 'Dr. Nia Permata', '085712345678', 'Endokrin', 'Rabu-Minggu, 11.00-19.00'),
(10015, 'Dr. Nat', '09123193', 'Hati', 'Besok');

INSERT INTO tabel_kamar (id_kamar, nama_kamar, namagedung, STATUS, harga) VALUES
(1, 'Mawar Merah', 'RKBF-401', 'Kosong', 120000),
(2, 'Melati Putih', 'RKBF-402', 'Terisi', 150000),
(3, 'Kenanga Hijau', 'RKBF-403', 'Kosong', 110000),
(4, 'Anggrek Biru', 'RKBF-404', 'Kosong', 130000),
(5, 'Dahlia Ungu', 'RKBF-405', 'Terisi', 160000),
(6, 'Kamboja Kuning', 'RKBF-406', 'Kosong', 100000),
(7, 'Bougenville Pink', 'RKBF-407', 'Terisi', 170000),
(8, 'Cempaka Orange', 'RKBF-408', 'Kosong', 140000),
(9, 'Teratai Merah Jambu', 'RKBF-409', 'Terisi', 180000),
(10, 'Mawar Putih', 'RKBF-410', 'Kosong', 110000),
(23, 'aw', 'aw', '3', 0);

INSERT INTO tabel_obat (id_obat, nama_obat, harga_obat, stok) VALUES
(1, 'Paracetamomoomo', 7000, 10),
(2, 'Amoxicillin', 10000, 50),
(3, 'Lansoprazole', 15000, 75),
(4, 'Simvastatin', 20000, 30),
(5, 'Metformin', 25000, 40),
(6, 'Ibuprofen', 8000, 60),
(7, 'Aspirin', 7000, 80),
(8, 'Omeprazole', 12000, 70),
(9, 'Metronidazole', 18000, 45),
(10, 'Atorvastatin', 22000, 35);

INSERT INTO tabel_pasien (id_pasien, namapasien, no_hp, alamat, tgldaftar) VALUES
(1, 'Siti Rahmawati', '081234567890', 'Jakarta', '2024-06-08'),
(2, 'Ahmad Santoso', '087654321098', 'Bandung', '2024-06-07'),
(3, 'Dewi Cahyaningrum', '081298765432', 'Surabaya', '2024-06-06'),
(4, 'Rudi Setiawan', '085712345678', 'Yogyakarta', '2024-06-05'),
(5, 'Lia Kurniati', '081112233445', 'Semarang', '2024-06-04'),
(6, 'Budi Hartono', '081234567890', 'Solo', '2024-06-03'),
(7, 'Ani Supriati', '087654321098', 'Malang', '2024-06-02'),
(8, 'Eko Wibowo', '081298765432', 'Denpasar', '2024-06-01'),
(9, 'Dini Permata', '085712345678', 'Makassar', '2024-05-31'),
(10, 'Rina Wijaya', '081112233445', 'Manado', '2024-05-30');

INSERT INTO tb_pembayaran (id_pembayaran, id_pasien, lama_menginap, harga, nominal_pembayaran, kembalian, STATUS) VALUES
(1, 1, 1, 7000, 10000, 3000, 'Belum Lunas'),
(2, 2, 3, 381000, 9000, 90000, 'Lunas'),
(3, 4, 18, 2700000, 300000, 30000, 'Lunas');

#View 1 (Done)
CREATE VIEW detailpasien AS
SELECT
    p.id_pasien, 
    p.namapasien,
    CASE 
        WHEN r.id_pasien IS NOT NULL THEN 'Rawat Inap'
        WHEN rj.id_pasien IS NOT NULL THEN 'Rawat Jalan'
    END AS jenis_perawatan,
    COALESCE(r.diagnosa, rj.diagnosa) AS diagnosa,
    o.nama_obat,
    tp.status AS "Status Pembayaran"
FROM 
    tb_pembayaran tp
JOIN 
    tabel_pasien p ON tp.id_pasien = p.id_pasien
LEFT JOIN 
    rawat_inap r ON tp.id_pasien = r.id_pasien
LEFT JOIN 
    rawat_jalan rj ON tp.id_pasien = rj.id_pasien
LEFT JOIN 
    tabel_obat o ON r.id_obat = o.id_obat OR rj.id_obat = o.id_obat;

SELECT * FROM detailpasien;

#View 2 (Done)
CREATE VIEW DetailPasienRanap AS
SELECT
    ri.id_inap,
    td.namadokter,
    tp.namapasien,
    o.nama_obat,
    k.nama_kamar,
    ri.tgl_masuk,
    ri.tgl_keluar,
    ri.diagnosa
FROM
    rawat_inap ri
JOIN
    tabel_dokter td ON ri.id_dokter = td.id
JOIN
    tabel_pasien tp ON ri.id_pasien = tp.id_pasien
JOIN
    tabel_kamar k ON ri.id_kamar = k.id_kamar
JOIN
    tabel_obat o ON ri.id_obat = o.id_obat;
    
SELECT * FROM detailpasienranap;

#View 3 (done)
CREATE VIEW DetailPasienRalan AS
SELECT
    rj.id_jalan,
    td.namadokter,
    tp.namapasien,
    o.nama_obat,
    rj.diagnosa
FROM
    rawat_jalan rj
JOIN
    tabel_dokter td ON rj.id_dokter = td.id
JOIN
    tabel_pasien tp ON rj.id_pasien = tp.id_pasien
JOIN
    tabel_obat o ON rj.id_obat = o.id_obat;

SELECT * FROM detailpasienralan;

#View 4 (Done)
CREATE VIEW PasienKamar AS
SELECT
    tp.id_pasien,
    tp.namapasien,
    tk.nama_kamar,
    ri.tgl_masuk,
    ri.tgl_keluar
FROM
    rawat_inap ri
JOIN
    tabel_pasien tp ON ri.id_pasien = tp.id_pasien
JOIN
    tabel_kamar tk ON ri.id_kamar = tk.id_kamar;

SELECT * FROM pasienkamar;

#View 5 (Done)
CREATE VIEW obat_pasien AS
SELECT
    tp.id_pasien,
    tp.namapasien,
    o.nama_obat
FROM
    rawat_inap ri
JOIN
    tabel_pasien tp ON ri.id_pasien = tp.id_pasien
JOIN
    tabel_obat o ON ri.id_obat = o.id_obat
UNION
SELECT
    tp.id_pasien,
    tp.namapasien,
    o.nama_obat
FROM
    rawat_jalan rj
JOIN
    tabel_pasien tp ON rj.id_pasien = tp.id_pasien
JOIN
    tabel_obat o ON rj.id_obat = o.id_obat;

SELECT * FROM obat_pasien;

#View 6 (Done)
CREATE VIEW cek_ranap AS
SELECT
    ri.id_pasien,
    p.namapasien,
    tk.nama_kamar,
    tk.harga AS harga_kamar,
    obat.nama_obat,
    obat.harga_obat,
    (tk.harga + obat.harga_obat) AS total_bayar
FROM
    rawat_inap ri
JOIN
    tabel_pasien p ON p.id_pasien = ri.id_pasien
JOIN
    tabel_kamar tk ON ri.id_kamar = tk.id_kamar
JOIN
    tabel_obat obat ON ri.id_obat = obat.id_obat;

SELECT * FROM cek_ranap;

#View 7 (Done)
CREATE VIEW cek_ralan AS
SELECT
    rj.id_pasien,
    tp.namapasien,
    o.nama_obat,
    o.harga_obat
FROM
    rawat_jalan rj
JOIN
    tabel_pasien tp ON rj.id_pasien = tp.id_pasien
JOIN
    tabel_obat o ON rj.id_obat = o.id_obat;

SELECT * FROM cek_ralan;

#View 8 (Done)
CREATE VIEW jpasien AS
SELECT
    p.id_pasien, 
    p.namapasien,
    CASE 
        WHEN r.id_pasien IS NOT NULL THEN 'Rawat Inap'
        WHEN rj.id_pasien IS NOT NULL THEN 'Rawat Jalan'
        ELSE '-'
    END AS jenis_perawatan
FROM 
    tabel_pasien p
LEFT JOIN 
    rawat_inap r ON p.id_pasien = r.id_pasien
LEFT JOIN 
    rawat_jalan rj ON p.id_pasien = rj.id_pasien;
    
    SELECT * FROM jpasien;

#Stored Procedure
#Hapus ranap (Done)
DELIMITER//
CREATE PROCEDURE hapus_ranap (
    IN idranap INT
)
BEGIN
    DELETE FROM rawat_inap
    WHERE id_inap = idranap;
END//
DELIMITER;

#Update nama obat (Done)
DELIMITER //
CREATE PROCEDURE update_obat (
    IN obat_id INT,
    IN namaobat VARCHAR(50),
    IN hargaobat INT,
    IN stokbaru INT
)
BEGIN
    UPDATE tabel_obat
    SET nama_obat = namaobat,
        harga_obat = hargaobat,
        stok = stokbaru
    WHERE id_obat = obat_id;
END //
DELIMITER ;

#Tambah dokter (Done)
DELIMITER //
CREATE PROCEDURE tambah_dokter (
    IN namadokter VARCHAR(50),
    IN nohp VARCHAR(20),
    IN spesialis VARCHAR(50),
    IN jadwal VARCHAR(50)
)
BEGIN
    INSERT INTO tabel_dokter (namadokter, nohp, spesialis, jadwal)
    VALUES (namadokter, nohp, spesialis, jadwal);
END //
DELIMITER ;

#Lama hari pasien ranap nginep (Done) > Ni buat ngecek berapa hari pasien nginep nanti masuk ke kolom lama menginap di Pembayaran_Tambah.php
DELIMITER //
CREATE PROCEDURE lamamenginap(
    IN idPasien INT
)
BEGIN
    DECLARE tglMasuk DATE;
    DECLARE tglKeluar DATE;
    DECLARE lamaMenginap INT;
   
    SELECT MIN(tgl_masuk), MAX(tgl_keluar) INTO tglMasuk, tglKeluar
    FROM rawat_inap
    WHERE id_pasien = idPasien;
    
    SET lamaMenginap = DATEDIFF(tglKeluar, tglMasuk);
    
    SELECT lamaMenginap AS LamaMenginap;
END //
DELIMITER ;

CALL lamamenginap(4);

#Cek Jenis Perawatan (Done) > Ni buat ngecek jenis perawatan, kalo ranap tar stored procedure lamamenginap jalan
DELIMITER //
CREATE PROCEDURE cekranap(IN idPasien INT)
BEGIN
    DECLARE rawatInapp INT;
    SELECT EXISTS(SELECT 1 FROM rawat_inap WHERE id_pasien = idPasien) INTO rawatInapp;
    IF rawatInapp = 1 THEN
        SELECT 'Pasien Rawat Inap' AS status_rawat;
    ELSE
        SELECT 'Bukan Pasien Rawat Inap' AS status_rawat;
    END IF;
END //
DELIMITER ;

CALL cekranap(4);

#Looping (Done)
#Nampilin nama pasien dan jenis perawatan (Done)
DELIMITER $$
CREATE PROCEDURE tampilkanpasien2(
)
BEGIN
    DECLARE idpasien INT DEFAULT 1;
    WHILE idpasien <= 30 DO
        SET idpasien = idpasien + 1;
    END WHILE;
        SELECT * FROM jpasien LIMIT idpasien;    
END$$
DELIMITER ;

CALL tampilkanpasien2;

#Trigger
#Update status kamar (Done)
DELIMITER $$
CREATE TRIGGER upstatuskamar 
AFTER INSERT ON rawat_inap
FOR EACH ROW
BEGIN
    UPDATE tabel_kamar
    SET STATUS = 'Terisi'
    WHERE id_kamar = NEW.id_kamar;
END$$
DELIMITER ;


#LogPasienBaru (Done)
CREATE TABLE log_pasien (
  id_log INT(11) NOT NULL AUTO_INCREMENT,
  id_pasien INT(7),
  namapasien VARCHAR(50),
  no_hp VARCHAR(100),
  alamat VARCHAR(50),
  tgldaftar DATE,
  waktu_daftar TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_log)
);

DELIMITER $$
CREATE TRIGGER logpasienbaru
AFTER INSERT ON tabel_pasien
FOR EACH ROW
BEGIN
    INSERT INTO log_pasien (id_pasien, namapasien, no_hp, alamat, tgldaftar, waktu_daftar) 
    VALUES (NEW.id_pasien, NEW.namapasien, NEW.no_hp, NEW.alamat, NEW.tgldaftar, NOW());
END$$
DELIMITER ;

#LogHapusPasien (Done)
CREATE TABLE log_delete(
  id_logdelete INT(11) NOT NULL AUTO_INCREMENT,
  id_pasien INT(11) NOT NULL,
  nama_pasien INT(20) NOT NULL,
  no_hp INT(20) NOT NULL,
  alamat INT(20) NOT NULL,
  LOG TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_logdelete)
)

DELIMITER$$
CREATE TRIGGER log_delete
BEFORE DELETE ON tabel_pasien
FOR EACH ROW
BEGIN
  INSERT INTO log_delete(
    id_pasien,
    nama_pasien,
    no_hp,
    alamat,
    waktu_hapus
  ) VALUES (
    OLD.id_pasien,
    OLD.namapasien,
    OLD.no_hp,
    OLD.alamat,
    NOW()
  );
END$$
DELIMITER;