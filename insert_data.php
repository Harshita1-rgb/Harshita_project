<?php
include 'db.php'; // Include the database connection file

// Insert students into the students table
$stmt1 = $pdo->prepare("INSERT INTO students (name, division) VALUES (:name, :division)");
$stmt1->execute(['name' => 'Raj Modi', 'division' => 'Div A']);
$rajId = $pdo->lastInsertId(); // Get the last inserted ID for Raj Modi

$stmt2 = $pdo->prepare("INSERT INTO students (name, division) VALUES (:name, :division)");
$stmt2->execute(['name' => 'Arnav Khanna', 'division' => 'Div A']);
$arnavId = $pdo->lastInsertId(); // Get the last inserted ID for Arnav Khanna

// Insert attendance for Raj Modi
for ($i = 1; $i <= 22; $i++) {
    $stmt = $pdo->prepare("INSERT INTO attendance (student_id, date, status) VALUES (:student_id, :date, :status)");
    $stmt->execute([
        'student_id' => $rajId,
        'date' => "2025-01-" . str_pad($i, 2, '0', STR_PAD_LEFT), // January dates
        'status' => $i <= 20 ? 'Present' : 'Absent' // Mark absent on last 2 days
    ]);
}

// Insert attendance for Arnav Khanna
for ($i = 1; $i <= 22; $i++) {
    $stmt = $pdo->prepare("INSERT INTO attendance (student_id, date, status) VALUES (:student_id, :date, :status)");
    $stmt->execute([
        'student_id' => $arnavId,
        'date' => "2025-01-" . str_pad($i, 2, '0', STR_PAD_LEFT), // January dates
        'status' => 'Present' // Always present
    ]);
}

// Confirm insertion with a success message
echo "Data inserted successfully!<br><br>";

// Fetch and display students
echo "Students in the database:<br>";
$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll();
foreach ($students as $student) {
    echo $student['name'] . " - " . $student['division'] . "<br>";
}

// Fetch and display attendance data
echo "<br>Attendance records:<br>";
$stmt = $pdo->query("SELECT * FROM attendance");
$attendance = $stmt->fetchAll();
foreach ($attendance as $record) {
    echo "Student ID: " . $record['student_id'] . ", Date: " . $record['date'] . ", Status: " . $record['status'] . "<br>";
}
?>
