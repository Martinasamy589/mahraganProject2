<?php
include "connection.php";

$conn = new mysqli($server, $username, $password, $db);
$sql = "SELECT * FROM reqstory ";
 $firstR=$sql[0];
      
 $sql = "SELECT * FROM reqstory WHERE status = 'pending'";
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
    
<section class="project-section" id="projects"style="text-align:center;">
<div class="container">
        <div class="row text">
            <div class="col-lg-6 col-md-12 order-lg-2 order-md-1">
                <h1>طلبات اضافه شهداء</h1>
                <hr>
            </div>
        </div>
    </div>
        <div class="row project">
            
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
</body>

</html>


