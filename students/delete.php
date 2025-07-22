<?php

    // session check
    session_start();
    if (!isset($_SESSION['email'])) {
        header('location: ../');
        exit();
    }

    // include files
    if (file_exists('../includes/config.php')) {
        include('../includes/config.php');
    }

    // ensure ID is passed
    $student_id =  isset($_GET['id']) ? (int) $_GET['id'] : 0;
    
    // fetch student info from the database
    if ($student_id > 0) {
        $check  = $conn->prepare("SELECT id FROM students WHERE id=?");
        $check->bind_param('i', $student_id);
        $check->execute();
        
        $result = $check->get_result();
        if ($result && $result->num_rows > 0) {
            // proceed to delete
            $delete = $conn->prepare("DELETE FROM students WHERE id=?");
            $delete->bind_param('i', $student_id);
            if ($delete->execute()) {
                $_SESSION['success'] = '<small class="alert alert-success text-center">Student deleted successfully</small>';
            } else {
                $_SESSION['error'] = '<small class="alert alert-danger text-center ">Error deleting student. Plase try again.</small>';
            }
        } else {
            $_SESSION['error'] = '<small class="alert alert-danger text-center ">Student not found!</small>';
        }
    } else {
        $_SESSION['error'] = '<small class="alert alert-danger text-center ">Invalid Student ID</small>';
    }

    // Redirect back to the students list
    header('Location: ' . (isset($base_url) ? $base_url : '../') . 'list.php');
    exit();