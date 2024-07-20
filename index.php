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
    <style>
        
        .zoomed {
            transform: scale(1.1);
            z-index: 1;
        }

        .hero-section .mt-4 {
         
        }

        .hero-section .mt-4 .row {
            justify-content: center;
        }

        .hero-section .mt-4 .col-4 {
            margin-bottom: -20px;
    text-align: center;
    position: relative; /* تحديد الوضع النسبي للعناصر */
}

        .hero-section .mt-4 img {
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            width: 250px;
            height: 300px;
            max-height: 150px; /* يمكنك تعديل هذا الرقم لتقليل حجم الصور حسب الحاجة */
            cursor: pointer; /* Cursor pointer for image */
        }

        .hero-section .mt-4 .image-text {
            position: absolute;
            top: 0;
            right: 100%; /* Position to the right of the col-4 */
            width: 300px; /* Adjust width as needed */
            padding: 20px;
            background-color: #f0f0f0;
            border-left: 1px solid #ccc;
            direction: rtl; /* اتجاه النص لليمين */
            text-align: right;
            display: none; /* Initially hide sidebar text */
            z-index: 1;
        }

        .hero-section .mt-4 .col-4:hover .image-text {
            display: block; /* Show text on hover */
        }

        .sidebar-container {
            position: absolute;
            top: 0;
            right: 0;
            width: 300px; /* تعديل عرض النص حسب الحاجة */
            padding: 20px;
            background-color: #f0f0f0;
            border-left: 1px solid #ccc;
            direction: rtl; /* اتجاه النص لليمين */
            text-align: right;
            display: none; /* Initially hide sidebar text */
            z-index: 1;
        }

        .sidebar-container.active {
            display: block; /* Show sidebar text when active */
        }

        .sidebar-container h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .image-text {
            position: absolute;
            top: 0;
            right: 0;
            width: 300px; /* تعديل عرض النص حسب الحاجة */
            padding: 20px;
            background-color: #f0f0f0;
            border-left: 1px solid #ccc;
            direction: rtl; /* اتجاه النص لليمين */
            text-align: right;
            display: none; /* Initially hide sidebar text */
            z-index: 1;
        }

        /* Custom styles for responsiveness */
        @media (max-width: 768px) {
            .hero-section .col-4 {
                width: 100%; /* Full width on smaller screens */
                margin-bottom: 1rem; /* Adjust margin for spacing */
            }

            .hero-section .mt-4 .image-text,
            .hero-section .mt-4 .sidebar-container {
                width: 100%; /* Full width for text and sidebar containers */
                right: 0; /* Align to the left on smaller screens */
                text-align: center; /* Center align text on smaller screens */
                direction: ltr; /* Left-to-right text direction on smaller screens */
            }
        }
    </style>
<script>
    function zoomImage(image) {
        image.classList.toggle('zoomed');
    }
</script>

</head>

<body>

    <!-- navbar section   -->

    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bi bi-arrows-move"></i>   اساقفه الكنيسه الارثوذكسيه</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                    
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#home">الرئيسيه</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="vStoryAsakfa.php">القصص</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactUsFr.php">تواصل معنا</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="as2ela.php" >اسئله  </a>
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
            <div class="row align-items-center">
                <!-- Text Content -->
               

                <!-- Images -->
                <div class="col-lg-8 col-md-12 col-sm-12 mt-4">
                    <div class="row align-items-center">
                        <div class="col-4 mb-4">
                        <img src="./images/home4.jpg" alt="Image 1" class="img-fluid">
                        </div>
                        <div class="col-4 mb-4">
                        <img src="./images/asakfaHome2.jpeg" alt="Image 1" class="img-fluid" >
                        </div>
                        <div class="col-4 mb-4">
                        <img src="./images/home3.jpg" alt="Image 1" class="img-fluid" >
                        </div>
                        <div class="col-4 mb-4">
                        <img src="./images/home5.jpg" alt="Image 1" class="img-fluid">
                        </div>
                        <div class="col-4 mb-4">
                        <img src="./images/Lbaba.jpg" alt="Image 1" class="img-fluid" >
                        </div>
                        <div class="col-4 mb-4">
                        <img src="./images/home6.jpg" alt="Image 1" class="img-fluid">
                        </div>
                        <div class="col-4 mb-4">
                        <img src="./images/home7.jpg" alt="Image 1" class="img-fluid" >
                        </div>
                        <div class="col-4 mb-4">
                        <img src="./images/home8.jpg" alt="Image 1" class="img-fluid" >
                        </div>
                        <div class="col-4 mb-4">
                        <img src="./images/home9.jpg" alt="Image 1" class="img-fluid" >
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 text-content RSinHERO">
                    <h2> اساقفه الكنيسه الارثوذكسيه</h2>
                    <p style="color:black;">
                    "أَنْتُمْ نُورُ الْعَالَمِ. لاَ يُمْكِنُ أَنْ تُخْفَى مَدِينَةٌ مَوْضُوعَةٌ عَلَى جَبَل،" (مت 5: 14).
                        <span id="story" style="display: none;">وويقول القديس يوستينوس الشهيد: [ها أنت تستطيع أن ترى بوضوح أنه حينما تقطع رؤوسنا ونُصلب، ونلقى للوحوش المفترسة، ونقيد بالسلاسل، ونلقى في النار، وكل أنواع التعذيب، أننا لا نترك إيماننا. بل بقدر ما نعاقب بهذه الضيقات، بقدر ما ينضم مسيحيون أكثر إلى الإيمان باسم يسوع المسيح.</span>
                    </p>
                    <button class="btn" id="showStoryButton"><a href="#">اضغط هنا</a></button>
                </div>
            </div>
        </div>
    </section>

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

    <!-- footer section  -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <h3 style="color : #fff;"><i></i>  اساقفه الكنيسه الارثوذكسيه</h3>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <ul class="d-flex">
                        <li><a href="#home">الرئيسيه</a></li>
                        <li><a href="vStoryAsakfa.php">القصص</a></li>
                        <li><a href="contactUsFr.php">تواصل معنا</a></li>

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
        <script>
        // JavaScript function to add 'zoomed' class on hover
        document.addEventListener("DOMContentLoaded", function () {
            var images = document.querySelectorAll('.hero-section .col-4 img');
            images.forEach(function (img) {
                img.addEventListener('mouseenter', function () {
                    this.classList.add('zoomed');
                });
                img.addEventListener('mouseleave', function () {
                    this.classList.remove('zoomed');
                });
            });
        });

        function updateText(img, text, sidebarId) {
            var sidebar = document.getElementById(sidebarId);
            sidebar.querySelector('h3').textContent = text;
            // You can update other content in the sidebar here if needed
        }
    </script>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>
