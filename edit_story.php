<?php
include "connection.php";

// Initialize variables to avoid undefined variable notices
$id = $name = $fname = $mo3gzat = $tamged = $img = $story = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing data from database
    $sql = "SELECT * FROM shohdaa WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error fetching data: " . mysqli_error($conn);
    } elseif (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $fname = $row['fname'];
        $mo3gzat = $row['mo3gzat'];
        $tamged = $row['tamged'];
        $img = $row['img'];
        $story = $row['story'];
    } else {
        echo "No record found with ID: $id";
    }

    mysqli_close($conn); // Close database connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل القصة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center">تعديل القصة</h1>
        <form action="update_story.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">الاسم</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>
            <div class="mb-3">
                <label for="fname" class="form-label">اسم اخر للشهيد</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo htmlspecialchars($fname); ?>" required>
            </div>
            <div class="mb-3">
                <label for="mo3gzat" class="form-label">معجزات</label>
                <input type="text" class="form-control" id="mo3gzat" name="mo3gzat" value="<?php echo htmlspecialchars($mo3gzat); ?>" required>
            </div>
            <div class="mb-3">
                <label for="tamged" class="form-label">تمجيد</label>
                <input type="text" class="form-control" id="tamged" name="tamged" value="<?php echo htmlspecialchars($tamged); ?>" required>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">صورة</label>
                <input type="file" class="form-control" id="img" name="img">
                <?php if ($img): ?>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" alt="Current Image" style="max-width: 800px;">
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="story" class="form-label">القصة</label>
                <textarea class="form-control" id="story" name="story" rows="5" required><?php echo htmlspecialchars($story); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">تحديث</button>
        </form>
    </div>
</body>
</html>
