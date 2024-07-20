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

$sql = "SELECT * FROM reqstory WHERE email = '$email'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض بيانات جدول reqstory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Your existing styles */
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            margin: 0;
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
        }

        table.paleBlueRows td,
        table.paleBlueRows th {
            border: 1px solid #FFFFFF; 
            padding: 8px;
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
            text-align: center;
            border-left: 2px solid #1C6EA4; 
            padding: 10px; 
        }

        table.paleBlueRows thead th:first-child {
            border-left: none;
        }

        table.paleBlueRows tfoot {
            font-size: 14px;
            font-weight: bold;
            background: #204060; 
            border-top: 3px solid #1C6EA4; 
        }

        table.paleBlueRows tfoot td {
            font-size: 14px;
            padding: 20px; 
        }

        /* Status background colors */
        table.paleBlueRows td.accepted {
           background-color: #4CAF50; /* Green */
         }

        table.paleBlueRows td.rejected {
          background-color: #FF5733; /* Red */
        }

        table.paleBlueRows td.pending {
          background-color: #F9C74F; /* Yellow */
        }

        /* Footer styles */
        footer {
            background-color: #204060;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer .container {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        /* Message box styles */
        .message-box {
            background-color: #FFFFFF;
            color: #000000;
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .message-box a {
            text-decoration: none;
            color: #FFFFFF;
            background-color: #204060;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .message-box a:hover {
            background-color: #1A4060;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php
            if ($result->num_rows > 0) {
                // Data found, display table
                echo "<table class='paleBlueRows'>";
                echo "<thead><tr><th>الحالة</th><th>السبب</th><th>اسم الشهيد</th></tr></thead><tbody>";
                
                while($row = $result->fetch_assoc()) {
                    // Determine CSS class based on status
                    $statusClass = '';
                    switch ($row['status']) {
                        case 'accepted':
                            $statusClass = 'accepted';
                            break;
                        case 'rejected':
                            $statusClass = 'rejected';
                            break;
                        case 'pending':
                            $statusClass = 'pending';
                            break;
                        default:
                            $statusClass = '';
                            break;
                    }

                    // Output table rows
                    echo "<tr>";
                    echo "<td class='" . $statusClass . "'>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['reason']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "</tr>";
                }
                
                echo "</tbody></table>";
            } else {
                // No data found, show message box with a link to homepage
                echo "<div class='message-box' style='text-align: center;'>";
                echo "<p>لا توجد بيانات لعرضها.</p>";
                echo "<a href='index.php'>العودة إلى الصفحة الرئيسية</a>";
                echo "</div>";
            }

            $conn->close();
            ?>
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-p2Os/YBc8zVBf8fO+lsckd6z6t4QzUtbIHaGhoB9z4UCtnqK+5hxU+5z2tcuJ3Jk" crossorigin="anonymous"></script>

<!-- Footer -->
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
                <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
