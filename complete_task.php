<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskId = $_POST['task_id'];
    $completed = isset($_POST['completed']) ? 1 : 0;

    // Mark the task as completed in the database
    completeTask($taskId, $completed);

    // Redirect back to the index page
    header('Location: index.php');
    exit();
}
