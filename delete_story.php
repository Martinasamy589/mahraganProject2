<?php
// delete_story.php

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare SQL statement with placeholders
    $sql = "DELETE FROM shohdaa WHERE id = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo "خطأ في تحضير الاستعلام: " . mysqli_error($conn);
        exit();
    }

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "i", $id);

    
    if (mysqli_stmt_execute($stmt)) {
        echo "تم حذف القصة بنجاح.";
    } else {
        echo "خطأ في عملية الحذف: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt); // Close prepared statement
    mysqli_close($conn); // Close database connection

    // Redirect to homepage or any other page after deletion
    header("Location: indexAdmin.php");
    exit();
} else {
    // Handle invalid requests or redirect
    header("Location: indexAdmin.php");
    exit();
}
?>
