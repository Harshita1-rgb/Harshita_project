<?php
session_start();
include 'db.php';

// Query to fetch attendance details for each student
$report = $pdo->query("
    SELECT students.name, students.division, 
           SUM(CASE WHEN status = 'Present' THEN 1 ELSE 0 END) AS present_days, 
           SUM(CASE WHEN status = 'Absent' THEN 1 ELSE 0 END) AS absent_days
    FROM attendance
    JOIN students ON students.id = attendance.student_id
    GROUP BY students.id
")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Attendance Report</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Division</th>
            <th>Present Days</th>
            <th>Absent Days</th>
        </tr>
        <?php foreach ($report as $row): ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['division'] ?></td>
                <td><?= $row['present_days'] ?></td>
                <td><?= $row['absent_days'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
