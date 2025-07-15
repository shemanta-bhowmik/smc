<?php

    // database configuration
	if (!defined('SMC_HOST')) define('SMC_HOST', 'localhost');
	if (!defined('SMC_USER')) define('SMC_USER', 'root');
	if (!defined('SMC_PASSWORD')) define('SMC_PASSWORD', 'mysql');
	if (!defined('SMC_NAME')) define('SMC_NAME', 'sms_db');

    // create connection
    $conn = new mysqli(SMC_HOST, SMC_USER, SMC_PASSWORD, SMC_NAME);

    // check connection
    if ($conn->connect_errno)
        die ('Falied to connect database: ' . $mysqli->connect_errno);

    // set character set
    $conn->set_charset('utf8mb4');