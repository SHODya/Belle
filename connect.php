<?php

$connect = mysqli_connect('localhost', 'root', '', 'Belle-db');

if (!$connect) {
    die('Error connecting to database');
}

