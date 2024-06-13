<?php

function get_connection() {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "test";
    return new mysqli($servername, $username, $password, $database);
}
