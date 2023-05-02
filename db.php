<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = 'admin';
$database = 'task';

// Create a new database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Retrieve the list of tasks from the database
function getTasks(): array
{
    global $conn;
    $tasks = [];

    $stmt = $conn->prepare("SELECT * FROM tasks");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }

    return $tasks;
}

// Add a new task to the database
function addTask($title): void
{
    global $conn;

    $stmt = $conn->prepare("INSERT INTO tasks (title, completed) VALUES (?, 0)");
    $stmt->bind_param("s", $title);
    $stmt->execute();
}

// Mark a task as completed in the database
function completeTask($taskId, $completed): void
{
    global $conn;

    $stmt = $conn->prepare("UPDATE tasks SET completed = ? WHERE id = ?");
    $stmt->bind_param("ii", $completed, $taskId);
    $stmt->execute();
}
