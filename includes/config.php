<?php

    // database configuration
    define('SMC_HOST', 'localhost');
    define('SMC_USER', 'root');
    define('SMC_PASSWORD', 'mysql');
    define('SMC_NAME', 'sms_db');

    // create connection
    $conn = new mysqli(SMC_HOST, SMC_USER, SMC_PASSWORD, SMC_NAME);

    // check connection
    if ($conn->connect_errno)
        die ('Falied to connect database: ' . $mysqli->connect_errno);

    // set character set
    $conn->set_charset('utf8mb4');