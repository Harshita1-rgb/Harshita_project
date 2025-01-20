<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $division = $_POST['division'];
        $stmt = $pdo->prepare("INSERT INTO students (name, division) VALUES (:name, :division)");
        $stmt->execute(['name' => $name, 'division' => $division]);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['student_id'];
        $stmt = $pdo->prepare("DELETE FROM students WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}

$students = $pdo->query("SELECT * FROM students")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Students</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Manage Students</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Division:</label>
        <select name="division">
            <option value="Div A">Div A</option>
            <option value="Div B">Div B</option>
        </select>
        <button type="submit" name="add">Add Student</button>
    </form>
    <h3>Student List</h3>
    <ul>
        <?php foreach ($students as $student): ?>
            <li>
                <?= $student['name'] ?> (<?= $student['division'] ?>)
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="student_id" value="<?= $student['id'] ?>">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
