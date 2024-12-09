INSERT INTO Account (username, password, role_name)
VALUES ('johndoe', 'password123', 'Mahasiswa');

-- Menambahkan akun untuk admin
INSERT INTO Account (username, password, role_name)
VALUES ('adminuser', 'adminpassword', 'Admin');


INSERT INTO Mahasiswa (nama, nim, email, angkatan, nama_kelas, account_id, status)
VALUES ('Jak Smith', '2024101001', 'jak.Smith@example.com', 2021, 'SIB-A', 1, 'Aktif');

INSERT INTO Admin (nip, nama, email, kontak, account_id)
VALUES (1234, 'Admin User', 'admin@example.com', '08123456789', 2);


INSERT INTO KategoriDokumen(
    nama_dokumen,
	jenis_dokumen
)
VALUES (
    'TOEIC',
	'scan toeic'
);

INSERT INTO BebasTanggungan (
	mahasiswa_id,
	kategori_id,
	status_bebas_tanggungan, 
	tanggal_pengajuan, 
	admin_id, 
	catatan,
	path
)
VALUES (
	1,
	1, 
	'Pending', 
	GETDATE(), 
	2, 
	'Pengajuan Bebas Tanggungan Awal',
	'kosongan'
);