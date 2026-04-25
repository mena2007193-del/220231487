<?php

function calculateStatus($grade) {
    if ($grade >= 90) {
        return "ممتاز";
    } elseif ($grade >= 80) {
        return "جيد جدا";
    } elseif ($grade >= 70) {
        return "جيد";
    } elseif ($grade >= 60) {
        return "مقبول";
    } else {
        return "راسب";
    }
}

$student = [
    ["name" => "جنى", "grade" => 95, "age" => 20],
    ["name" => "محمد", "grade" => 88, "age" => 21],
    ["name" => "احلام", "grade" => 74, "age" => 19],
    ["name" => "ليلى", "grade" => 69, "age" => 22],
    ["name" => "احمد", "grade" => 55, "age" => 20]
];

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
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>Students Report</title>

<style>
    body {
        font-family: Arial;
        text-align: center;
        direction: rtl;
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

<h2>جدول بيانات الطلاب</h2>

<table>
    <tr>
        <th>اسم الطالب</th>
        <th>العمر</th>
        <th>الدرجة</th>
        <th>الحالة</th>
    </tr>

    <?php foreach ($student as $s) { ?>
        <tr>
            <td><?php echo $s["name"]; ?></td>
            <td><?php echo $s["age"]; ?></td>
            <td><?php echo $s["grade"]; ?></td>
            <td><?php echo calculateStatus($s["grade"]); ?></td>
        </tr>
    <?php } ?>

</table>

<div class="stats">
    <h3>الاحصائيات</h3>
    <p>أعلى درجة: <?php echo $max; ?></p>
    <p>أدنى درجة: <?php echo $min; ?></p>
    <p>معدل الدرجات: <?php echo number_format($average, 2); ?></p>
    <p>عدد الطلاب الناجحين: <?php echo $passed; ?></p>
</div>

</body>
</html>
