CREATE TABLE Account (
    account_id INT PRIMARY KEY IDENTITY(1,1),
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_name VARCHAR(50) NOT NULL
);

-- Table Mahasiswa
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

-- Table Admin
CREATE TABLE Admin (
    admin_id INT PRIMARY KEY IDENTITY(1,1),
    nama VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    kontak VARCHAR(20) NOT NULL,
    account_id INT NOT NULL,
    FOREIGN KEY (account_id) REFERENCES Account(account_id)
);
-- Table BebasTanggungan
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

-- Table Dokumen
CREATE TABLE Dokumen (
    dokumen_id INT PRIMARY KEY IDENTITY(1,1),
    bt_id INT NOT NULL,
    nama_dokumen VARCHAR(255) NOT NULL,
    path VARCHAR(500) NOT NULL,
    FOREIGN KEY (bt_id) REFERENCES BebasTanggungan(bt_id)
);

