<?php

require_once './routes.php';

$indexFiles = ['index.html', 'index.php'];

$requestedAbsoluteFile = dirname(__FILE__) . $_SERVER['REQUEST_URI'];
$route = null;

// check if the the request matches one of the defined routes
foreach ($routes as $fn)
{
  if (preg_match('%^'. $fn[0] .'?$%', $_SERVER['REQUEST_URI']) && $fn[1] === $_SERVER['REQUEST_METHOD'])
  {
    $requestedAbsoluteFile = dirname(__FILE__) . '/controllers/' . $fn[2] . '.php';
    $route = $fn;
    break;
  }
}

// if request is a directory call check if index files exist
if (is_dir($requestedAbsoluteFile))
{
  foreach ($indexFiles as $filename)
  {
    $fn = $requestedAbsoluteFile.'/'.$filename;
    if (is_file($fn))
    {
      $requestedAbsoluteFile = $fn;
      break;
    }
  }
}

// if requested file does not exist or is directory => 404
if (!is_file($requestedAbsoluteFile))
{
  header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
  printf('"%s" does not exist', $_SERVER['REQUEST_URI']);
  return true;
}

// if requested file is'nt a php file
if (!preg_match('/\.php$/', $requestedAbsoluteFile)) {
  header('Content-Type: '.mime_content_type($requestedAbsoluteFile));
  $fh = fopen($requestedAbsoluteFile, 'r');
  fpassthru($fh);
  fclose($fh);
  return true;
}

// if requested file is php, include it
include_once $requestedAbsoluteFile;

if($route) { // Verbo HTTP _ GET
    $controller = new $route[2];
    $content = $controller->{$route[3]}();
    if($content) {
      echo $content;
    }
} 
