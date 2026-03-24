<?php
/**
 * WordPress Router for PHP Built-in Web Server
 * Routes requests to WordPress or serves static files directly
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve existing static files directly (CSS, JS, images, etc.)
$file = __DIR__ . $uri;
if ($uri !== '/' && file_exists($file) && !is_dir($file)) {
    return false; // Serve the file as-is
}

// For directories, check for index.php
if (is_dir($file)) {
    if (file_exists($file . '/index.php')) {
        require $file . '/index.php';
        return true;
    }
    if (file_exists($file . '/index.html')) {
        return false;
    }
}

// Route everything else through WordPress
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/index.php';
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['PHP_SELF'] = '/index.php';

require __DIR__ . '/index.php';
