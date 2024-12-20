<?php

//require our files, remember should be relative to index.php
require '../app/core/Router.php';

require '../app/controllers/Controller.php';
require '../app/controllers/MainController.php';
require '../app/controllers/ContactController.php';
require '../app/controllers/LoginController.php';
require '../app/controllers/AdminController.php';

require '../app/models/Model.php';
require '../app/models/ModelException.php';
require '../app/models/TypeConverter.php';
require '../app/models/ExperienceModel.php';
require '../app/models/ContactModel.php';
require '../app/models/UserModel.php';

//set up env variables
$env = parse_ini_file('../.env');

define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);
define('DBDRIVER', $env['DBDRIVER']);
define('BASE_URL_PATH', $env['BASE_URL_PATH']);