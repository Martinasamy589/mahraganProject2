<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <div class="container">
        <div class="form-box box">

            <?php

            include "connection.php";

            if (isset($_POST['reqStory'])) {
                $name = $_POST['name'];
                $fname = $_POST['fname'];
                $mo3gzat = $_POST['mo3gzat'];
                $tamged = $_POST['tamged'];
                $story = $_POST['story'];

                // Handling file upload
                if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                    $imgData = file_get_contents($_FILES['img']['tmp_name']);
                } else {
                    $imgData = null;
                }

                $query = "INSERT INTO shohdaa (name, fname, img, mo3gzat, tamged, story) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $query);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "ssssss", $name, $fname, $imgData, $mo3gzat, $tamged, $story);
                    $success = mysqli_stmt_execute($stmt);

                    if ($success) {
                        echo "<div class='message'>
                            <p>✨تم اضافة القصة بنجاح ✨</p>
                            </div><br>";

                        echo "<a href='indexAdmin.php'><button class='btn'>Go Back</button></a>";
                    } else {
                        echo "<div class='message'>
                            <p>Message sending failed 😔</p>
                            </div><br>";

                        echo "<a href='indexAdmin.php'><button class='btn'>Go Back</button></a>";
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error preparing statement: " . mysqli_error($conn);
                }

                mysqli_close($conn);
            }
            ?>

        </div>
    </div>
</body>

</html>
