<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
  
</head>

<body >
  <div class="container">
    <div class="form-box box">


      <header>Sign Up</header>
      <hr>

      <form action="#" method="POST">


        <div class="form-box">

          <?php

          session_start();
          include "connection.php";




          if (isset($_POST['register'])) {

            $name = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $cpass = $_POST['cpass'];
            $phone=$_POST['phone'];
            $BOD = $_POST['birthDay'];
                // Calculate age
    $today = date('Y-m-d');
    $age = date_diff(date_create($BOD), date_create($today))->y;

    // Determine ischild value
    $ischild = ($age < 12) ? 0 : 1; // Assuming children under 12 are considered 'children'

    $passwd = password_hash($pass, PASSWORD_DEFAULT);
    $key = bin2hex(random_bytes(12));



            $check = "select * from users where email='{$email}'";

            $res = mysqli_query($conn, $check);

            $passwd = password_hash($pass, PASSWORD_DEFAULT);

            $key = bin2hex(random_bytes(12));




            if (mysqli_num_rows($res) > 0) {
              echo "<div class='message'>
        <p>This email is used, Try another One Please!</p>
        </div><br>";

              echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";


            } else {

              if ($pass === $cpass) {

                $sql = "INSERT INTO users (name, email, password, phone, birthDay, ischild) 
                    VALUES ('$name', '$email', '$passwd', '$phone', '$BOD', '$ischild')";
                $result = mysqli_query($conn, $sql);

                if ($result) {


                  header("Location: login.php");
                } else {
                  echo "<div class='message'>
        <p>   هذا الايميل مستخدم حاول مره اخري</p>
        </div><br>";

                  echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                }

              } else {
                echo "<div class='message'>
      <p>   الرقم السري غير متطابق</p>
      </div><br>";

                echo "<a href='signup.php'><button class='btn'>Go Back</button></a>";
              }
            }
          } else {

            ?>

            <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input class="input-field" type="text" placeholder="أسم المستخدم" name="username" required>
            </div>

            <div class="input-container">
               <i class="fa fa-envelope icon"></i>
              <input class="input-field" type="email" placeholder=" الايميل" name="email" required>
            </div>  

            <div class="input-container">
                <i class="fa fa-volume-control-phone icon"></i>
              <input class="input-field" type="text" placeholder="رقم التليفون" name="phone" required>
            </div>

            <div class="input-container">
                        <i class="fa fa-volume-control-phone icon"></i>
                        <input class="input-field" type="date" placeholder="تاريخ الميلاد " name="birthDay" required>
                    </div>

            <div class="input-container">
              <i class="fa fa-lock icon"></i>
              <input class="input-field password" type="password" placeholder="الرقم السري" name="password" required>
              <i class="fa fa-eye icon toggle"></i>
            </div>

            <div class="input-container">
              <i class="fa fa-lock icon"></i>
              <input class="input-field" type="password" placeholder=" تأكيد الرقم السري" name="cpass" required>
              <i class="fa fa-eye icon"></i>
            </div>

            

          </div>


          <center><input type="submit" name="register" id="submit" value="Signup" class="btn"></center>


          <div class="links">
          هل لديك بالفعل حساب؟  <a href="login.php"> sign in now</a>
          </div>

        </form>
      </div>
      <?php
          }
          ?>
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