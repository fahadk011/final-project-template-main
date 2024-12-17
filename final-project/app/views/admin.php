<?php
// Ensure no output is sent before session_start() or header()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_name'])) {
    header('Location: ./login');
    exit; // Ensure script stops after redirection
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h2>Admin Dashboard</h2>
            </div>

            <div class="card-body">
                <p>Welcome <?php echo $_SESSION['user_name']; ?>. You are logged in as an admin.</p>
                <a href="./logout" class="btn btn-danger">Logout</a>
                <a href="./" class="btn btn-success">Website</a>
            </div>
        </div>
        
        
    </div>
  </div>
</div>

</body>
</html>