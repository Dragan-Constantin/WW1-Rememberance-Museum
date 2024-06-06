<?php
use Dotenv\Dotenv;

require __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once('./router.php');

// Get the requested URI
$address = $_SERVER['REQUEST_URI'];

// Get the site URL from environment variables
$site_url = $_ENV["SITE_URL"];

// Construct the current URL
$current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Derive the requested page by removing the site URL from the current URL
$request = str_replace($site_url, '', $current_url);

// Remove extra backslashes and convert the request to lowercase
$request = str_replace('/', '', $request);
$request = strtolower($request);
$request = "/" . $request;

// Route the request
route_request($request);
