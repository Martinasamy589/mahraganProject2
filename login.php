<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$username = "root";
$password = "";
$db = "asakfa";

$conn = new mysqli($server, $username, $password, $db);


if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $password = $row['password'];
        $decrypt = password_verify($pass, $password);

        if ($decrypt) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
// بعد التحقق من صحة كلمة المرور
            $_SESSION['email'] = $email;
            $_SESSION['isChild'] = $row['isChild'];


            if ($row['isChild'] == 1) {
                header("Location: indexAdmin.php");
           
            } else {
                header("Location: index.php");
           
            }
            exit();
        } else {
            echo "<div class='message'>
                    <p> الرقم السري غير صحيح</p>
                    </div><br>";

            echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
        }

    } else {
       echo "<div class='message'>
                    <p>   الرقم السري او الايميل غير صحيح</p>
                    </div><br>";

                    echo "<div style='text-align: center;'><a href='login.php'><button class='btn btn-go-back'>Go Back</button></a></div>";
                }
}

?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
.btn {
    background-color: #4CAF50; /* Green background color */
    color: white;
    padding: 8px 16px; /* Padding أصغر لحجم أصغر */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border: none;
    cursor: pointer;
    font-size: 14px; /* حجم الخط داخل الزر */
    line-height: 1; /* تعديل خط النص ليكون أقرب إلى الزر */
}

.btn-go-back {
    font-size: 12px; /* حجم الخط أصغر للزر الصغير */
    padding: 6px 12px; /* padding أصغر للزر الصغير */
    margin-top: 10px; /* تباعد بين الرسالة والزر */
}

.message {
    background-color: #f44336; /* Red background color */
    color: white;
    text-align: center;
    padding: 10px;
    margin-bottom: 20px; /* Spacing below the message */
}


</style>

</head>

<body>
    <div class="container">
        <div class="form-box box" >
            <header>Login</header>
            <hr>
            <form action="#" method="POST">
                <div class="form-box">
                    <div class="input-container">
                        <i class="fa fa-envelope icon"></i>
                        <input class="input-field" type="email" placeholder=" البريد الالكتروني" name="email">
                    </div>
                    <div class="input-container">
                        <i class="fa fa-lock icon"></i>
                        <input class="input-field password" type="password" placeholder="الرقم السري" name="password">
                        <i class="fa fa-eye toggle icon"></i>
                    </div>
                    <div class="remember">
                        <input type="checkbox"style="margin-left: 20px" class="check" name="remember_me">
                        <label for="remember"style="margin-left: 30px;" > تذكرني</label>
                        <span style="margin-left: 150px;"><a href="forgot.php" >عدم تذكر الرقم السري</a></span>
                    </div>
                </div>
                <center><input type="submit" name="login" id="submit" value="sign in " class="btn"></center>
                <div class="links">
                   ليس لديك حساب؟ <a href="signup.php">Signup Now</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        const toggle = document.querySelector(".toggle"),
            input = document.querySelector(".password");
        toggle.addEventListener("click", () => {
            if (input.type === "password") {
                input.type = "text";
                toggle.classList.replace("fa-eye-slash", "fa-eye");
            } else {
                input.type = "password";
            }
        })
    </script>
</body>

</html>
