<?php
session_start();

include("connection.php");

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>

    <!-- navbar section   -->

    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bi bi-arrows-move"></i>شهداء الكنيسة المعاصرة</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="4akawi.php">الشكاوي</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#home">الرئيسيه</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#projects">القصص</a>
                        </li>

                        <li class="nav-item">
                            <div class="dropdown">
                                <a class='nav-link dropdown-toggle' href='edit.php?id=$res_id' id='dropdownMenuLink'
                                    data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='bi bi-person'></i>
                                </a>


                                <ul class="dropdown-menu mt-2 mr-0" aria-labelledby="dropdownMenuLink">

                                    <li>
                                        <?php

                                        $id = $_SESSION['id'];
                                        $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

                                        while ($result = mysqli_fetch_assoc($query)) {
                                            $res_username = $result['username'];
                                            $res_email = $result['email'];
                                            $res_id = $result['id'];
                                        }


                                        echo "<a class='dropdown-item' href='edit.php?id=$res_id'>Change Profile</a>";


                                        ?>

                                    </li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <div class="name">
        <center>مرحبا 
            <?php
            // echo $_SESSION['valid'];
            
            echo $_SESSION['username'];

            ?>
            
        </center>
    </div>

    <!-- hero section  -->

    <section id="home" class="hero-section">
        <div class="container">
            <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12" >
                    <img src="images/shohdaa.jpg" alt="شهداء الكنيسه المعاصره" class="img-fluid">
                </div>
               
    <div class="col-lg-4 col-md-12 col-sm-12 text-content" class="RSinHERO" style="text-align: right;">
                    <h2>شهداء الكنيسه الحديثه</h2>
                    <p style="color:black;">
                      الاستشهاد المسيحي بنتائجه هو برهان عملي على صحة قول السيد المسيح له المجد: "إن لم تقع حبة الحنطة في الأرض وتمت فهي تبقى وحدها. ولكن إن ماتت تأتى بثمر كثير. " (إنجيل يوحنا 12: 24)..
                     <span id="story"  style="display: none;">وويقول القديس يوستينوس الشهيد: [ها أنت تستطيع أن ترى بوضوح أنه حينما تقطع رؤوسنا ونُصلب، ونلقى للوحوش المفترسة، ونقيد بالسلاسل، ونلقى في النار، وكل أنواع التعذيب، أننا لا نترك إيماننا. بل بقدر ما نعاقب بهذه الضيقات، بقدر ما ينضم مسيحيون أكثر إلى الإيمان باسم يسوع المسيح.</span>
                    </p>
                    <button class="btn" id="showStoryButton"><a href="#">اضغط هنا </a></button>
                </div>
                

            </div>
        </div>
        <script>
        document.getElementById('showStoryButton').addEventListener('click', function() {
            var storyDiv = document.getElementById('story');
            if (storyDiv.style.display === 'none') {
                storyDiv.style.display = 'block'; // Show the story
                this.textContent = 'اخفاء '; // Change button text
            } else {
                storyDiv.style.display = 'none'; // Hide the story
                this.textContent = ' اضغط هنا'; // Change button text
            }
        });
    </script>
    </section>

    <!-- services section  -->


    <!-- about section  -->


    <!-- project section  -->
    <?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "login";
    
    $conn = new mysqli($server, $username, $password, $db);
    $sql = "SELECT * FROM shohdaa LIMIT 4";
      $firstR=$sql[0];
      
    ?>
    <?php
$sql = "SELECT * FROM shohdaa LIMIT 4"; 
$result = mysqli_query($conn, $sql);
$projects = array();
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $projects[] = $row;
    }
} else {
   
    $projects = array(); 
}


?>

<section class="project-section" id="projects"style="text-align:center;">
<div class="container">
        <div class="row text">
            <div class="col-lg-6 col-md-12 order-lg-2 order-md-1">
                <h1>شهداء الكنيسه المعاصره</h1>
                <hr>
            </div>
            <div class="col-lg-6 col-md-12 order-lg-1 order-md-2"style="text-align:left; padding: 15px;">
                <p  >لمزيد من الشهداء عليك بالضغط هنا</p>
                <a href="totalCards.php">
                    <button style="height: 45px; width: 100px; border-radius: 50%; background-color: #fff; border: 0; margin-left: 40px;">اضغط هنا</button>
                </a>
            </div>
        </div>
    </div>
        <div class="row project  justify-content-end">
            
        <?php foreach ($projects as $project) : ?>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card" >
            <?php
            // Check if $project['img'] contains data
            if (!empty($project['img'])) {
                // Encode image data to base64
                $base64img = base64_encode($project['img']);
                // Output image with base64 encoded data
                echo '<div class="text-center">';
                echo '<img src="data:image/jpeg;base64,' . $base64img . '" class="card-img-top imgCard" alt="..." style="width: 220px; height: 120px; border-radius: 20px; box-shadow: 25px 15px 25px rgba(1, 0, 0, 0.3); transition: transform 0.3s ease-in-out; display: inline-block;">';
                echo '</div>';
                        } else {
                // Output a placeholder or default image if $project['img'] is empty
                echo '<img  style="text-align: center;" src="path/to/placeholder.jpg" class="card-img-top imgCard" alt="Placeholder Image">';
            }
            ?>
            <div class="card-body">
                <div class="text">
                    <h4 class="card-title"><?php echo htmlspecialchars($project['name']); ?></h4>
                    <p class="card-text"><?php echo htmlspecialchars($project['fname']); ?></p>
                    <a href="story.php?id=<?php echo $project['id']; ?>">
                        <button name="read_story">اقرأ القصه</button>
                    </a>
                    <a href="edit_story.php?id=<?php echo $project['id']; ?>">
                        <button name="edit_story">تعديل القصه</button>
                    </a>
                    <form action="delete_story.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
                        <button type="submit" name="delete_story">حذف القصة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


</div>
    </div>
</section>


<!-- contact section  -->

<section class="contact-section" id=""style="text-align:center;">
        <div class="container">

            <div class="row gy-4 ">

                <h1> اضافه شهيد</h1>
                <div >
                <form action="add_story.php" method="post" enctype="multipart/form-data" class="php-email-form">
    <div class="row gy-4">
        <div class="col-md-6">
            <input type="text" name="fname" class="form-control" placeholder="اسم اخر للشهيد" required style="text-align:right;">
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name" placeholder="الاسم" required style="text-align:right;">
        </div>
        <div class="col-md-12">
            <input type="file" class="form-control" name="img" placeholder="الصوره " required style="text-align:right;">
        </div>
        <div class="col-md-6">
            <textarea class="form-control" name="mo3gzat" rows="5" placeholder="المعجزات" required style="text-align:right;"></textarea>
        </div>
        <div class="col-md-6">
            <textarea class="form-control" name="story" rows="5" placeholder="القصه" required style="text-align:right;"></textarea>
        </div>
        <div class="col-md-12">
            <textarea class="form-control" name="tamged" rows="5" placeholder="التمجيد" required style="text-align:right;"></textarea>
        </div>
        <div class="col-md-12 text-center">
            <button name="reqStory" type="submit">ارسال</button>
        </div>
    </div>
</form>

                </div>
             
                </div>

              

            </div>

        </div>
    </section>

<!-- reqest -->




<?php
$conn = new mysqli($server, $username, $password, $db);
$sql = "SELECT * FROM reqstory WHERE status = 'pending'";
 $firstR=$sql[0];
      
$sql = "SELECT * FROM reqstory WHERE status = 'pending' LIMIT 4"; 
$result = mysqli_query($conn, $sql);
$requests = array();
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $requests[] = $row;
    }
} else {
   
    $requests = array(); 
}


?>

<section class="project-section" id="projects"style="text-align:center;">
<div class="container">
        <div class="row text ">
            <div class="col-lg-6 col-md-12 order-lg-2 order-md-1">
                <h1>الطلبات المحوله من المستخدمين</h1>
                <hr>
            </div>
            <div class="col-lg-6 col-md-12 order-lg-1 order-md-2"style="text-align:left; padding: 15px;">
                <p >لمزيد من طلبات الشهداء عليك بالضغط هنا</p>
                <a href="totalReq.php">
                    <button style="height: 45px; width: 100px; border-radius: 50%; background-color: #fff; border: 0; margin-left: 40px;">اضغط هنا</button>
                </a>
            </div>
        </div>
    </div>
        <div class="row project justify-content-end">
            
        <?php foreach ($requests as $request) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($request['img']); ?>" class="card-img-top,imgCard" alt="..." style="display: inline-block; width: 260px; height: 200px ;border-radius: 20px; box-shadow: 25px 15px 25px rgba(1, 0, 0, 0.3); transition: transform 0.3s ease-in-out;">
                <div class="card-body">
                    <div class="text">
                        <h4 class="card-title"><?php echo htmlspecialchars($request['name']); ?></h4>
                        <p class="card-text"><?php echo htmlspecialchars($request['fname']); ?></p>
                        <a href="vstoryReq.php?id=<?php echo $request['id']; ?>">
                            <button name="read_request" >اقرأ القصه</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    
</div> 
    </div>
</section>



   

    <!-- footer section  -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                <h3 style ="color : #fff;"><i ></i>شهداء الكنيسة المعاصرة</h3>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <ul class="d-flex">
                        <li><a href="#home">الرئيسيه</a></li>
                        <li><a href="#projects">القصص</a></li>
                        <li><a href="#contact">تواصل معنا</a></li>
                       
                    </ul>
                </div>

                <div class="col-lg-2 col-md-12 col-sm-12">
                </div>

                <div class="col-lg-1 col-md-12 col-sm-12">
                    <!-- back to top  -->

                    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                            class="bi bi-arrow-up-short"></i></a>
                </div>

            </div>

        </div>

    </footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>