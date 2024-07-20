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

            $email = $_SESSION['email'];

            include "connection.php";
            $conn = new mysqli($server, $username, $password, $db);

            if ($conn->connect_error) {
                die("فشل الاتصال: " . $conn->connect_error);
            }

            include "connection.php";

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];


                $query = "INSERT INTO contact(name,email,subject,message) VALUES('$name','$email','$subject','$message')";

                $data = mysqli_query($conn, $query);

                if ($data) {
                    echo "<div class='message'>
                    <p> تم ارسال الشكوي ✨ </p>
                    </div><br>";

                    echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                } else {
                    echo "<div class='message'>
                    <p>حدث خطأ اثناء الارسال  😔</p>
                    </div><br>";

                    echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                }
            }

            ?>

        </div>
    </div>
</body>

</html>