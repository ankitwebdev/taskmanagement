<?php
require_once 'db.php';

// Retrieve the list of tasks from the database
$tasks = getTasks();

// Display the task list
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task Management</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Task List</h1>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <?php if ($task['completed'] == 1): ?>
                <label>
                    <input type="checkbox" checked disabled>
                </label>
                <del><?php echo $task['title']; ?></del>
            <?php else: ?>
                <form action="complete_task.php" method="POST">
                    <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                    <label>
                        <input type="checkbox" name="completed" onchange="this.form.submit()">
                    </label>
                    <?php echo $task['title']; ?>
                </form>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

<h2>Add Task</h2>
<form action="add_task.php" method="POST">
    <label>
        <input type="text" name="title" placeholder="Enter task title" required>
    </label>
    <button type="submit">Add</button>
</form>
</body>
</html>
