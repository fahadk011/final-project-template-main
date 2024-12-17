<?php
// Ensure no output is sent before session_start() or header()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_name'])) {
    header('Location: ./admin');
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
                <h2>Login Form</h2>
            </div>

            <div class="card-body">
                <p>Please fill in your credentials to login.</p>
                <?php

                  if (isset($_SESSION['message'])) {
                      echo '<div class="alert '.$_SESSION["message_type"].'" role="alert">';
                      echo $_SESSION['message'];
                      echo "</div>";
                      unset($_SESSION['message']);
                  }
                  ?>
                <form action="./login" method="post">
                    <div class="mb-3">
                    <label for="email" class="form-label">Email address:</label>
                    <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        
        
    </div>
  </div>
</div>

</body>
</html>
