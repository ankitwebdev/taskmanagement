<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];

    // Add the task to the database
    addTask($title);

    // Redirect back to the index page
    header('Location: index.php');
    exit();
}
