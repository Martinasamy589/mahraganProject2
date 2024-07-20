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
            session_start();

            if (!isset($_SESSION['email'])) {
                header("location: login.php");
                exit();
            }

            include "connection.php";

            $conn = new mysqli($server, $username, $password, $db);

            if ($conn->connect_error) {
                die("فشل الاتصال: " . $conn->connect_error);
            }

            if (isset($_POST['reqStory'])) {
                $name = $_POST['name'];
                $fname = $_POST['fname'];
                $mo3gzat = $_POST['mo3gzat'];
                $tamged = $_POST['tamged'];
                $story = $_POST['story'];
                $email = $_SESSION['email'];

                // Handling file upload
                if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                    $imgData = file_get_contents($_FILES['img']['tmp_name']);
                } else {
                    $imgData = null;
                }

                $query = "INSERT INTO reqstory (name, fname, img, mo3gzat, tamged, story, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($query);

                if ($stmt) {
                    $stmt->bind_param("sssssss", $name, $fname, $imgData, $mo3gzat, $tamged, $story, $email);
                    $success = $stmt->execute();

                    if ($success) {
                        echo "<div class='message'>
                            <p>✨ تم ارسال طلبك ✨ </p>
                            </div><br>";

                        echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                    } else {
                        echo "<div class='message'>
                            <p>حدث خطأ اثناء الارسال 😔</p>
                            </div><br>";

                        echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                    }

                    $stmt->close();
                } else {
                    echo "Error preparing statement: " . $conn->error;
                }

                $conn->close();
            }
            ?>

        </div>
    </div>
</body>

</html>
