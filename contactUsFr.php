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

<section class="contact-section" id="contact"style="text-align:center;">
        <div class="container">

            <div class="row gy-4">

                <h1>تواصل معنا</h1>
                <div class="col-lg-6 form">
                    <form action="contact.php" method="post" class="php-email-form">
                        <div class="row gy-4">

                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="الاسم" required style="text-align:right;">
                            </div>


                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="نوع الشكوي" required style="text-align:right;">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="5" placeholder="الرساله"
                                    required style="text-align:right;"></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button name="submit" type="submit">ارسال </button>
                            </div>

                        </div>
                    </form>

                </div>
                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>العنوان</h3>
                                <p>كنيسه الانبا شنوده والانبا كاراس<br>شارع الدكتور</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>اتصل بنا</h3>
                                <p>01210262866</p>
                            </div>
                        </div>
                        <div class="col-md-6" style=" margin-left: 160px;">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>الايميل</h3>
                                <p>martina@gmail.com<br>besho@gmail.com</p>
                            </div>
                        </div>
                       
                        </div>
                    </div>

                </div>

              

            </div>

        </div>
    </section>
    </body>

</html>