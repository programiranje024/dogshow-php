<?php

// Set PHP error reporting
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$db_username = 'dog';   // MySQL username
$db_password = 'dog';   // MySQL password
$db_name = 'dog';       // MySQL database name
$db_host = 'mysql';     // MySQL hostname or IP address. If running in Docker, this is the name of the service

// Connect to MySQL via PDO
$pdo = new PDO( 'mysql:host=' . $db_host . ';dbname=' . $db_name, $db_username, $db_password );

// If we can't connect, throw an error
if ( ! $pdo ) {
  die( 'Could not connect to MySQL' );
}
