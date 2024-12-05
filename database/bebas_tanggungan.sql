create database bebas_tanggungan_pbl;

use bebas_tanggungan_pbl;

-- Tabel Mahasiswa
CREATE TABLE Mahasiswa (
    mahasiswa_id INT PRIMARY KEY IDENTITY(1,1),
    nama VARCHAR(255) NOT NULL,
    nim VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL,
    angkatan INT NOT NULL,
    nama_kelas VARCHAR(50) NOT NULL,
    account_id INT NOT NULL,
    status VARCHAR(50) NOT NULL,
    FOREIGN KEY (account_id) REFERENCES Account(account_id)
);

-- Tabel BebasTanggungan
CREATE TABLE BebasTanggungan (
    bt_id INT PRIMARY KEY IDENTITY(1,1),
    mahasiswa_id INT NOT NULL,
    kategori VARCHAR(100) NOT NULL,
    status_bebas_tanggungan VARCHAR(50) NOT NULL,
    tanggal_pengajuan DATE NOT NULL,
    admin_id INT NOT NULL,
    catatan TEXT,
    FOREIGN KEY (mahasiswa_id) REFERENCES Mahasiswa(mahasiswa_id),
    FOREIGN KEY (admin_id) REFERENCES Admin(admin_id)
);

-- Tabel Dokumen
CREATE TABLE Dokumen (
    dokumen_id INT PRIMARY KEY IDENTITY(1,1),
    bt_id INT NOT NULL,
    nama_dokumen VARCHAR(255) NOT NULL,
    path VARCHAR(500) NOT NULL,
    laporan_ta_path VARCHAR(500),
    program_ta_path VARCHAR(500),
    surat_publikasi_path VARCHAR(500),
    tanda_terima_ta_path VARCHAR(500),
    tanda_terima_pkl_path VARCHAR(500),
    surat_bebas_kompen_path VARCHAR(500),
    toeic_scan_path VARCHAR(500),
    FOREIGN KEY (bt_id) REFERENCES BebasTanggungan(bt_id)
);

-- Tabel Admin
CREATE TABLE Admin (
    admin_id INT PRIMARY KEY IDENTITY(1,1),
    nama VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    kontak VARCHAR(20) NOT NULL,
    account_id INT NOT NULL,
    FOREIGN KEY (account_id) REFERENCES Account(account_id)
);

-- Tabel Account
CREATE TABLE Account (
    account_id INT PRIMARY KEY IDENTITY(1,1),
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_name VARCHAR(50) NOT NULL
);

