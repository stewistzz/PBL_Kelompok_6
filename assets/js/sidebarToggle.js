
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggle-sidebar');

            toggleButton.addEventListener('click', function() {
                // Tambahkan atau hapus class 'sidebar-collapse' pada body
                document.body.classList.toggle('sidebar-collapse');
            });
        });