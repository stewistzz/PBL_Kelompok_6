<style>
    .card-body {
        display: flex;
        /* Menggunakan Flexbox untuk tata letak horizontal */
        align-items: center;
        /* Vertikal align ke tengah */
        gap: 15px;
        /* Jarak antar elemen */
    }

    .image {
        flex-shrink: 0;
        /* Membatasi ukuran gambar agar tidak mengecil */
    }

    .image img {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Menambahkan bayangan */
    }

    .content {
        flex: 1;
        /* Isi sisa ruang yang tersedia */
        margin-left: 10px;
    }

    .content .judul h5 {
        margin: 0;
        /* Menghapus margin default */
        font-size: 1.25rem;
        /* Ukuran font heading */
        color: #fff;
        /* Warna teks untuk kontras dengan background */
    }

    .content p {
        margin: 5px 0 0;
        /* Margin atas kecil dan menghapus margin bawah */
        color: #f8f9fa;
        /* Warna teks */
        font-size: 15px;
    }

    .content a:hover {
        text-decoration: underline;
        color: white;
    }
</style>

<section class="notifications m-5">
    <div class="card">
        <div class="card-body bg-secondary rounded">
            <!-- gambar dosen -->
            <div class="image">
                <img src="pages/notifikasi/image/dosenn.jpg" class="rounded-circle" alt="...">
            </div>
            <div class="content">
                <div class="user-admin">
                    <h5>Admin 1</h5>
                </div>
                <!-- content -->
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ea minima laudantium perspiciatis officia tempore repellendus quo, porro molestias nisi ducimus.....</p>
                
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Detail
    </button>
        </div>

        <!-- notification detail -->
    </div>
</section>