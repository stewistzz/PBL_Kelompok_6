<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Modal</title>

    <!-- Link to Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Optional custom styling for the modal */
        #profileModal img {
            border: 2px solid #007bff;
        }

        #profileModal h5 {
            font-weight: bold;
            color: #343a40;
        }

        #profileModal small {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Button to Trigger Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profileModal">
        View Profile
    </button>

    <!-- Modal Structure -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">User Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal Body (Profile Form) -->
                <div class="modal-body">
                    <!-- Profile Image -->
                    <div class="text-center mb-3">
                        <img src="assets/img/dosenn.jpg" alt="User Profile Image" class="rounded-circle mb-3" width="150" height="150">
                    </div>

                    <!-- Profile Form -->
                    <form id="profileForm">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" value="John Doe">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" value="johndoe">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role">
                                <option value="mahasiswa" selected>Mahasiswa</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveChanges">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Example: Simulating save changes action
        document.getElementById('saveChanges').addEventListener('click', function() {
            const name = document.getElementById('name').value;
            const username = document.getElementById('username').value;
            const role = document.getElementById('role').value;

            alert(`Profile updated!\nName: ${name}\nUsername: ${username}\nRole: ${role}`);
        });
    </script>
</body>
</html>
