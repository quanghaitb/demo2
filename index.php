<?php
require_once('connection.php');
require_once "./App.php";

// How controllers call Views & Models
require_once "./controllers/managers_controller.php";
require_once "./controllers/posts_controller.php";
$myApp = new App();
require_once('routes.php');
