<?php

    // include database connection
    if (file_exists('includes/config.php')) {
        require_once('includes/config.php');
    }

    // empty array
    $messages = [];

    // ---- users table ----
    $users_table = $conn->query("SHOW TABLES LIKE 'users'");
    if ($users_table->num_rows == 0) {
        // SQL to create 'users' table
        $sql_users = "CREATE TABLE users (
            id INT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            role VARCHAR(20) DEFAULT 'admin',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        if ($conn->query($sql_users) === TRUE) {
            $messages[] = '<p class="alert alert-success">Users table created successfully!</p>';
        } else {
            $messages[] = '<p class="alert alert-danger">Error stublishing '/users/' table</p>' . $conn->error . '<br>';
        }
    }

    // ---- students table ----
    $students_table = $conn->query("SHOW TABLES LIKE 'students'");
    if ($students_table->num_rows == 0) {
        // SQL to create 'students' table
        $sql_students = "CREATE TABLE students (
            id INT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(50) NOT NULL UNIQUE,
            phone VARCHAR(20),
            dob DATE,
            gender VARCHAR(20),
            class VARCHAR(50),
            photo VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        if ($conn->query($sql_students) === TRUE) {
            $messages[] = '<p class="alert alert-success">Student table created successfully!</p>';
        } else {
            $messages[] = '<p class="alert alert-danger">Error stublishing '/users/' table</p>' . $conn->error . '<br>';
        }
    }

    ?>


    <script>
    // Auto-hide alert messages after 3 seconds
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(el) {
            el.style.display = 'none';
        });
    }, 3000);
    </script>