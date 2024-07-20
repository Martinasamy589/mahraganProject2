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
        
        body{
            background-color: #2B547E;  
        }
        table.paleBlueRows {
            font-family: Arial, Helvetica, sans-serif;
            border: 1px solid #1C6EA4;
            background-color: #2B547E;
            width: 100%;
            height: 100%;
            text-align: center;
            border-collapse: collapse;
        }

        table.paleBlueRows td,
        table.paleBlueRows th {
            border: 1px solid #FFFFFF;
            padding: 8px;
            color: #FFFFFF;
        }

        table.paleBlueRows tbody td {
            font-size: 13px;
            color: #FFFFFF;
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
            border-left: 2px solid #1C6EA4;
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

<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "login";

$conn = new mysqli($server, $username, $password, $db);
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $card_id = intval($_GET['id']);
    $sql = "SELECT * FROM reqstory WHERE id = $card_id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {

        $first_row = mysqli_fetch_assoc($result);

        echo "<table border='1' class='paleBlueRows'>";

        $column_labels = array(
            'name' => 'الاسم',
            'img' => 'الصورة',
            'fname' => 'اسم اخر للشهيد',
            'tamged' => 'تمجيد',
            'mo3gzat' => 'معجزات',
            'story' => 'القصه',
        );

        mysqli_data_seek($result, 0);
        $row = mysqli_fetch_assoc($result);

        foreach ($column_labels as $column_name => $label) {
            echo "<tr>";
            echo "<td>";

            if ($column_name === 'img') {
                $image_style = "style='height: 300px; width: 300px;'";
                echo "<img src='data:image/jpeg;base64," . base64_encode($row[$column_name]) . "' alt='Card Image' $image_style>";
            } else {
                echo htmlspecialchars($row[$column_name]);
            }

            echo "</td>";
            echo "<th>" . htmlspecialchars($label) . "</th>";
            echo "</tr>";
        }

        echo "</table>";

        
    } else {
        echo "No data found for this ID.";
    }
}

?>
<!-- Accept and Reject buttons with AJAX functionality -->
<div class="d-flex justify-content-center">
    <button id="acceptButton" class="btn btn-success">Accept</button>
    <button id="rejectButton" class="btn btn-danger ml-2">Reject</button>
</div>

<script>
    document.getElementById('acceptButton').addEventListener('click', function() {
        var cardId = <?= $card_id ?>;
        
        if (confirm('هل انت متأكد من اضافة هذه القصة؟')) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'accept.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Success
                    alert(xhr.responseText);
                    window.location.href = 'indexAdmin.php'; 
                } else {
                    // Error
                    alert('Error: ' + xhr.statusText);
                }
            };
            xhr.onerror = function() {
                alert('Request failed.');
            };
            xhr.send('action=accept&card_id=' + cardId);
        }
    });

    document.getElementById('rejectButton').addEventListener('click', function() {
        var cardId = <?= $card_id ?>;
        var reason = prompt('Enter reason for rejection:');
        
        if (reason !== null) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'accept.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Success
                    alert(xhr.responseText);
                    window.location.href = 'indexAdmin.php'; 
                } else {
                    // Error
                    alert('Error: ' + xhr.statusText);
                }
            };
            xhr.onerror = function() {
                alert('Request failed.');
            };
            xhr.send('action=reject&card_id=' + cardId + '&reason=' + encodeURIComponent(reason));
        }
    });
</script>


<!-- Footer Section -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <p class="logo"><i ></i>شهداء الكنيسة المعاصرة</p>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <ul class="d-flex">
                    <li><a href="index.php">الرئيسيه</a></li>
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
