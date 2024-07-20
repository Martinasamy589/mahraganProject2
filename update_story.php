<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $mo3gzat = $_POST['mo3gzat'];
    $tamged = $_POST['tamged'];
    $story = $_POST['story'];

    // Check if a new image was uploaded
    if (isset($_FILES['img']) && $_FILES['img']['size'] > 0) {
        $img = file_get_contents($_FILES['img']['tmp_name']);
    } else {
        // If no new image was uploaded, fetch the existing image from the database
        $sql = "SELECT img FROM shohdaa WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $img = $row['img'];
        } else {
            echo "Error fetching existing image: " . mysqli_error($conn);
            exit();
        }
    }

    // Update the database record
    $query = "UPDATE shohdaa SET name=?, fname=?, mo3gzat=?, tamged=?, img=?, story=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssssi", $name, $fname, $mo3gzat, $tamged, $img, $story, $id);
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        // Redirect to indexAdmin.php upon successful update
        header("Location: indexAdmin.php");
        exit(); // Make sure to exit after redirection
    } else {
        echo "<div class='message'><p>فشل في تحديث القصة</p></div><br>";
        echo "<a href='indexAdmin.php'><button class='btn'>العودة</button></a>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
