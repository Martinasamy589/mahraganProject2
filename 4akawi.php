<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data from Database</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            background-color: #2B547E;
            color: #FFFFFF;
        }

        table.paleBlueRows {
            font-family: Arial, Helvetica, sans-serif;
            border: 1px solid #1C6EA4;
            background-color: #2B547E;
            width: 100%;
            text-align: center;
            border-collapse: collapse;
            margin-bottom: 20px; 
        }

        table.paleBlueRows td,
        table.paleBlueRows th {
            border: 1px solid #FFFFFF;
            padding: 8px;
            color: #FFFFFF;
        }

        table.paleBlueRows tbody td {
            font-size: 13px;
            padding: 10px;
        }

        table.paleBlueRows tr:nth-child(even) {
            background: #5080A6;
        }

        table.paleBlueRows thead {
            background: #204060;
            border-bottom: 2px solid #1C6EA4;
        }

        table.paleBlueRows thead th {
            font-size: 15px;
            font-weight: bold;
            color: #FFFFFF;
            text-align: center;
            padding: 10px;
        }

        table.paleBlueRows thead th:first-child {
            border-left: none;
        }

        table.paleBlueRows tfoot {
            font-size: 14px;
            font-weight: bold;
            color: #FFFFFF;
            background: #204060;
            border-top: 3px solid #1C6EA4;
        }

        table.paleBlueRows tfoot td {
            font-size: 14px;
            padding: 20px;
        }

        bi bi-arrows-move {
            background-color: #204060;
            color: #FFFFFF;
            text-align: center;
            padding: 20px 0;
            width: 100%;
            position: absolute;
            bottom: 0;
        }

        .container {
            padding-bottom: 80px; 
        }
        footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #204060;
        color: #FFFFFF;
        padding: 10px 0;
        text-align: center;
    }
    </style>
</head>
<body>
    <div class="container">
        <table class="paleBlueRows">
            <thead>
                <tr>
                    <th>البريد الإلكتروني</th>
                    <th>الاسم</th>
                    <th>الموضوع</th>
                    <th>الرسالة</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $server = "localhost";
                $username = "root";
                $password = "";
                $db = "login";

                $conn = new mysqli($server, $username, $password, $db);

                if ($conn->connect_error) {
                    die("فشل الاتصال: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM Contact";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['subject']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>لا توجد بيانات متاحة</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- footer section  -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                <h3 style ="color : #fff;"><i ></i>شهداء الكنيسة المعاصرة</h3>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <ul class="d-flex">
                        <li><a href="index.php">الرئيسية</a></li>
                        <li><a href="totalCards.php">القصص</a></li>
                        <li><a href="index.php#contact">تواصل معنا</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12">
                </div>
                <div class="col-lg-1 col-md-12 col-sm-12">
                    <!-- back to top  -->
                    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
