<?php

require '../app/setup.php';
use app\core\Router;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fahad Khan - Portfolio</title>
  <link rel="stylesheet" href="styles/homepage.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
  />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  
</head>
<body>

  <?php 
    $router = new Router();
    $router->handleRoutes();
  ?>
  

  <script src="js/homepage.js"></script>
</body>
</html>
