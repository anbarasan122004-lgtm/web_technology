<?php

include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$department = $_POST['department'];
$salary = $_POST['salary'];

$sql = "INSERT INTO employees 
        (name, email, phone, department, salary)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssssd",
    $name,
    $email,
    $phone,
    $department,
    $salary
);

if ($stmt->execute()) {
    echo "<h2>Employee details inserted successfully!</h2>";
    echo "<a href='index.html'>Add Another Employee</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>