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
        body {
            display: flex;
            justify-content: center;
            margin: 130px auto; /* Adjusted margin for centering */
            padding: 20px;
            background-color: #c5c9cb;
        }

        .stories-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 30px;
            justify-content: center;
            width: 80%;
            margin: auto;
            border-radius: 20px;
            box-shadow: -7px 7px 1px rgba(0, 0, 0, 0.869);
            background-color: #1d5374;
            padding: 50px;
            transition: all 0.3s;
        }

        .story-container {
            position: relative;
            padding: 30px;
            border-radius: 20px;
            background: linear-gradient(to right, #fff4f6, #a8a8a7);
            text-align: center;
            margin-bottom: 30px;
            transition: all 0.3s;
            box-shadow: -5px 5px 1px rgba(0, 0, 0, 0.604);
            overflow: hidden;
        }

        .story-image {
            width: 160px;
            height: 160px;
            cursor: pointer;
            border: 3px solid;
            border-radius: 8px;
            box-shadow: -5px 5px 0px rgba(0, 0, 0, 0.604);
            transition: all 0.3s;
            object-fit: cover;
        }

        .story-image:hover {
            transform: scale(1.1);
        }

        .story-image:active {
            transform: scale(1.2);
            box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.601);
            transition: all 0.2s;
        }

        .story-box {
            display: none;
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-shadow: -5px 5px 0px rgba(0, 0, 0, 0.604);
            background-color: #f9f9f9;
            transition: all 0.3s;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #1d5374;
            padding: 20px 0;
            color: white;
            text-align: center;
            z-index: 1000;
        }

        .footer ul {
            list-style-type: none;
            padding: 0;
        }

        .footer ul li {
            display: inline-block;
            margin: 0 10px;
        }

        .footer ul li a {
            color: white;
            text-decoration: none;
        }

        .footer ul li a:hover {
            text-decoration: underline;
        }

        @media only screen and (max-width: 850px) {
            .stories-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
    </style>
</head>
<body>

<div class="stories-container">

    <?php
    session_start();
    // Database credentials
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "asakfa";

    // Create connection
    $conn = new mysqli($server, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to retrieve images from the database
    $sql = "SELECT img FROM asakfaS";
    $result = $conn->query($sql);

    // Display images if there are results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="story-container">';
            // Display image from database as base64, wrapped with a link to story.php
            echo '<a href="story.php"><img src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" class="story-image"></a>';
            echo '<div class="story-box">';
            echo '<p>This is the story for this image</p>'; // Customize this text as per your needs
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Footer Content</h4>
                <p>This is the footer content. You can customize it as per your needs.</p>
            </div>
            <div class="col-md-6">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li><a href="#">Link 3</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
    function toggleStory(imageElement) {
        var storyBox = imageElement.nextElementSibling;
        var allBoxes = document.getElementsByClassName("stories-container")[0];
        var containers = document.getElementsByClassName("story-container");

        // Toggle the clicked story box
        if (storyBox.style.display === "none" || storyBox.style.display === "") {
            storyBox.style.display = "block";
        } else {
            storyBox.style.display = "none";
        }

        // Check if any story box is visible
        var anyVisible = false;
        for (var i = 0; i < containers.length; i++) {
            if (containers[i].getElementsByClassName("story-box")[0].style.display === "block") {
                anyVisible = true;
            }
        }

        // Adjust the display of all Boxes and text alignment
        if (anyVisible) {
            allBoxes.style.display = "block";
            for (var i = 0; i < containers.length; i++) {
                containers[i].style.textAlign = "left";
            }
        } else {
            allBoxes.style.display = "grid";
            for (var i = 0; i < containers.length; i++) {
                containers[i].style.textAlign = "center";
            }
        }
    }
</script>

</body>
</html>
