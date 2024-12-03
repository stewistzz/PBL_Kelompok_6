<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-inter">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r shadow">
            <div class="p-6">
                <img src="https://via.placeholder.com/150x50" alt="Logo" class="h-12 mb-6">
            </div>
            <nav class="space-y-4 px-4">
                <a href="#" class="flex items-center text-gray-700 hover:text-blue-500 space-x-3">
                    <i class="fas fa-home"></i>
                    <span>Beranda</span>
                </a>
                <a href="#" class="flex items-center text-gray-700 hover:text-blue-500 space-x-3">
                    <i class="fas fa-file-alt"></i>
                    <span>Surat Keterangan</span>
                </a>
                <a href="#" class="flex items-center text-gray-700 hover:text-blue-500 space-x-3">
                    <i class="fas fa-check-circle"></i>
                    <span>Cek Status Tanggungan</span>
                </a>
                <a href="#" class="flex items-center text-gray-700 hover:text-blue-500 space-x-3">
                    <i class="fas fa-print"></i>
                    <span>Cetak Bebas Tanggungan</span>
                </a>
                <a href="#" class="flex items-center text-gray-700 hover:text-blue-500 space-x-3">
                    <i class="fas fa-bell"></i>
                    <span>Notifikasi</span>
                </a>
                <a href="#" class="flex items-center text-gray-700 hover:text-blue-500 space-x-3">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1">
            <header class="bg-blue-700 text-white py-4 px-6">
                <h1 class="text-xl font-semibold">Jurusan Teknologi Informasi - Politeknik Negeri Malang</h1>
            </header>
            <main class="p-6">
                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4">Dashboard Admin</h2>
                    <div class="flex justify-between items-center mb-4">
                        <input type="text" placeholder="Cari Mahasiswa..." class="border border-gray-300 rounded-lg px-4 py-2 w-1/3">
                    </div>
                    <table class="min-w-full border divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIM</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Mahasiswa</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status Foto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status UKT</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status SKKM</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">File</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu Pengajuan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2341760188</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rahmalia Mutia Farda</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-green-600">Valid</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-green-600">Valid</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-red-600">Tidak Valid</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <i class="fas fa-edit text-blue-500"></i>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">14/06/2024 08:41:54</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-lg text-xs font-semibold">Menunggu Verifikasi</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-sm text-gray-500">Menampilkan 1 dari 300 data</span>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 border border-gray-300 rounded-lg bg-white text-gray-500">Sebelum</button>
                            <button class="px-3 py-1 border border-gray-300 rounded-lg bg-blue-500 text-white">1</button>
                            <button class="px-3 py-1 border border-gray-300 rounded-lg bg-white text-gray-500">2</button>
                            <button class="px-3 py-1 border border-gray-300 rounded-lg bg-white text-gray-500">3</button>
                            <button class="px-3 py-1 border border-gray-300 rounded-lg bg-white text-gray-500">Selanjutnya</button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>
