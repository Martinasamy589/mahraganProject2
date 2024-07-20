<?php
// accept.php

// Database connection credentials
$server = "localhost";
$username = "root";
$password = "";
$db = "login";

// Establishing connection
$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    $card_id = $_POST['card_id'];

    if ($action === 'accept') {
        // Perform accept action if needed
        // For example, update status in database
        $sql_update = "UPDATE reqstory SET status = 'Accepted' WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("i", $card_id);

        if ($stmt_update->execute()) {
            // Fetch the record from reqstory
            $sql_fetch = "SELECT name, img, fname, tamged, mo3gzat, story FROM reqstory WHERE id = ?";
            $stmt_fetch = $conn->prepare($sql_fetch);
            $stmt_fetch->bind_param("i", $card_id);
            $stmt_fetch->execute();
            $stmt_fetch->store_result();
            $stmt_fetch->bind_result($name, $img, $fname, $tamged, $mo3gzat, $story);

            if ($stmt_fetch->fetch()) {
                // Insert into shohdaa table
                $sql_insert = "INSERT INTO shohdaa (name, img, fname, tamged, mo3gzat, story) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt_insert = $conn->prepare($sql_insert);
                
                // Bind parameters
                $null = null; // Needed for binding blob data
                $stmt_insert->bind_param("sbssss", $name, $null, $fname, $tamged, $mo3gzat, $story);
                $stmt_insert->send_long_data(1, $img); // Bind the img data as a blob

                if ($stmt_insert->execute()) {
                    echo "تم اضافة القصة بنجاح ";
                } else {
                    echo "Error inserting into shohdaa table: " . $stmt_insert->error;
                }

                $stmt_insert->close();
            } else {
                echo "No record found in reqstory table.";
            }

            $stmt_fetch->close();
        } else {
            echo "Error accepting card: " . $stmt_update->error;
        }

        $stmt_update->close();
    } elseif ($action === 'reject') {
        // Perform reject action if needed
        // Update status and reason in database
        $reason = $_POST['reason'];

        $sql = "UPDATE reqstory SET status = 'Rejected', reason = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $reason, $card_id);

        if ($stmt->execute()) {
            echo "Card rejected successfully.";
        } else {
            echo "Error rejecting card: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid action.";
    }
} else {
    echo "Method not allowed.";
}

$conn->close();
?>
