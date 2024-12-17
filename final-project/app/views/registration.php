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
                <h2>Registration Form</h2>
            </div>

            <div class="card-body">
                <p>Please fill in your details.</p>
                <?php

                if (isset($_SESSION['message'])) {
                    echo '<div class="alert '.$_SESSION["message_type"].'" role="alert">';
                    echo $_SESSION['message'];
                    echo "</div>";
                    unset($_SESSION['message']);
                }
                ?>
                <form action="./registration" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="./login" class=""btn btn-danger>Login</a>
                </form>
            </div>
        </div>
        
        
    </div>
  </div>
</div>
<script>
    /*setTimeout(function() {
        document.querySelector('.alert').style.display = 'none';
    }, 3000);*/
</script>
</body>
</html>
