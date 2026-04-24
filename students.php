<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to calculate status
function calculateStatus($grade) {
    if ($grade >= 90) return "Excellent";
    if ($grade >= 80) return "Very Good";
    if ($grade >= 70) return "Good";
    if ($grade >= 60) return "Pass";
    return "Fail";
}

$student = [
    ["name" => "Jana", "grade" => 95, "age" => 20],
    ["name" => "Mohammad", "grade" => 88, "age" => 21],
    ["name" => "Sara", "grade" => 74, "age" => 19],
    ["name" => "Laila", "grade" => 69, "age" => 22],
    ["name" => "Khaled", "grade" => 55, "age" => 20]
];

// Statistics
$sum = 0;
$max = $student[0]["grade"];
$min = $student[0]["grade"];
$passed = 0;

foreach ($student as $s) {
    $grade = $s["grade"];
    $sum += $grade;

    if ($grade > $max) $max = $grade;
    if ($grade < $min) $min = $grade;
    if ($grade >= 60) $passed++;
}

$average = $sum / count($student);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Students Report</title>

<style>
    body {
        font-family: Arial;
        text-align: center;
        background: #f4f4f4;
    }

    table {
        margin: 20px auto;
        border-collapse: collapse;
        width: 70%;
        background: white;
    }

    th, td {
        border: 1px solid #000;
        padding: 10px;
    }

    th {
        background-color: #eee;
    }

    .stats {
        width: 70%;
        margin: 20px auto;
        padding: 15px;
        background: white;
        border: 1px solid #000;
    }
</style>
</head>

<body>

<h2>Students Data Table</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Grade</th>
        <th>Age</th>
        <th>Status</th>
    </tr>

    <?php foreach ($student as $s) { ?>
        <tr>
            <td><?php echo $s["name"]; ?></td>
            <td><?php echo $s["grade"]; ?></td>
            <td><?php echo $s["age"]; ?></td>
            <td><?php echo calculateStatus($s["grade"]); ?></td>
        </tr>
    <?php } ?>

</table>

<div class="stats">
    <h3>Statistics</h3>
    <p>Highest Grade: <?php echo $max; ?></p>
    <p>Lowest Grade: <?php echo $min; ?></p>
    <p>Average Grade: <?php echo number_format($average, 2); ?></p>
    <p>Passed Students: <?php echo $passed; ?></p>
</div>

</body>
</html>