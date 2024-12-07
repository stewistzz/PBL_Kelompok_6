<style>
    
    hr  {
        height: 10px; 
    }
</style>


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
<?php include('components/detail.php')?>