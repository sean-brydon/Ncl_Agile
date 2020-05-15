<?php
require_once("../bootstrap.php");

use Src\Controller\MovieController;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

// all of our endpoints start with /person
if ($uri[1] !== 'movies') {
    header("HTTP/1.1 404 Not Found");
    exit();
}
$genre = null;
if (isset($uri[2])) {
    $genre =  $uri[2];
}

$requestMethod = $_SERVER["REQUEST_METHOD"];

// pass the request method and user ID to the MovieController and process the HTTP request:
$controller = new MovieController($dbConnection, $requestMethod, $genre);
$controller->processRequest();
