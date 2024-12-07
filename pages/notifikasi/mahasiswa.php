<!-- searching section -->
<section class="content-header">
    <!-- toggle -->
    <?php include('layouts/toggle.php'); ?>
    <!-- toggle -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="input-group mb-3 w-50 m-auto">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="button-addon2">Button</button>
                </div>
            </div>
        </div>
    </div>
</section>

<hr>

<!-- Notifikasi Mahasiswa -->
<section class="notifications">
    <h3>Notif Mahasiswa</h3>
    
    <!-- Menambahkan Gambar Dosen -->
    <div class="dosen-image">
        <img src="assets/img/dosen.jpg" alt="Dosen" class="img-fluid" style="max-width: 200px; margin: 10px auto; display: block;">
    </div>

    <div class="notification-list">
        <div class="notification">
            <!-- Gambar Profil Admin -->
            <img src="avatar.png" alt="Admin" class="avatar">
            <div class="text">
                <h4>Admin</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
            </div>
            <span class="badge">!</span>
        </div>
        <div class="notification">
            <img src="avatar.png" alt="Admin" class="avatar">
            <div class="text">
                <h4>Admin</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
            </div>
            <span class="badge">!</span>
        </div>
        <div class="notification">
            <img src="avatar.png" alt="Admin" class="avatar">
            <div class="text">
                <h4>Admin</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
            </div>
            <span class="badge">!</span>
        </div>
    </div>
</section>
<?php include('components/detail.php')?>
