INSERT INTO Account (username, password, role_name)
VALUES ('johndoe', 'password123', 'Mahasiswa');

-- Menambahkan akun untuk admin
INSERT INTO Account (username, password, role_name)
VALUES ('adminuser', 'adminpassword', 'Admin');


INSERT INTO Mahasiswa (nama, nim, email, angkatan, nama_kelas, account_id, status)
VALUES ('Jak Smith', '2024101001', 'jak.Smith@example.com', 2021, 'SIB-A', 1, 'Aktif');

INSERT INTO Admin (nama, email, kontak, account_id)
VALUES ('Admin User', 'admin@example.com', '08123456789', 2);

select *
from Mahasiswa;

select * 
from Admin;


INSERT INTO BebasTanggungan (mahasiswa_id,kategori ,status_bebas_tanggungan, tanggal_pengajuan, admin_id, catatan)
VALUES (1, 'Jurusan','Pending', GETDATE(), 1, 'Pengajuan Bebas Tanggungan Awal');

INSERT INTO Dokumen (
    bt_id, 
    nama_dokumen, 
    path, 
    laporan_ta_path, 
    program_ta_path, 
    surat_publikasi_path, 
    tanda_terima_ta_path, 
    tanda_terima_pkl_path, 
    surat_bebas_kompen_path, 
    toeic_scan_path
)
VALUES (
    7, 
    'Dokumen Bebas Tanggungan', 
    '/path/to/dokumen_umum.pdf', 
    '/path/to/laporan_ta.pdf', 
    '/path/to/program_ta.zip', 
    '/path/to/surat_publikasi.pdf', 
    '/path/to/tanda_terima_ta.pdf', 
    '/path/to/tanda_terima_pkl.pdf', 
    '/path/to/surat_bebas_kompen.pdf', 
    '/path/to/toeic_scan.pdf'
);

select * from BebasTanggungan;
