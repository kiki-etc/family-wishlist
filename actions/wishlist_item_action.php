<?php
session_start();

include "../settings/connection.php";

if (isset($_POST['submit_button'])) {
    // Retrieve form data and escape special characters
    $itemName = mysqli_real_escape_string($conn, $_POST['itemName']);
    $itemDescription = mysqli_real_escape_string($conn, $_POST['itemDescription']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $userrole = $_SESSION['user_role'];
    $userid = $_SESSION['user_id'];

    // Check for file upload errors
    if ($_FILES['photo']['error'] != UPLOAD_ERR_OK) {
        // Retrieve the error message based on the error code
        $uploadErrorMessages = [
            UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
            UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
            UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
            UPLOAD_ERR_NO_FILE => "No file was uploaded.",
            UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
            UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
            UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
        ];
        $uploadError = $uploadErrorMessages[$_FILES['photo']['error']] ?? "Unknown error occurred during file upload.";
        header("Location: ../view/wishlist_item_adding.php?error=" . urlencode($uploadError));
        exit();
    }

    // Validate the file type (image only)
    $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];
    $imageFileType = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
    if (!in_array($imageFileType, $allowedFileTypes)) {
        header("Location: ../view/wishlist_item_adding.php?error=Unsupported file type. Allowed file types: jpg, jpeg, png, gif.");
        exit();
    }

    // Define the target directory and target file path
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);

    // Check if the file already exists
    if (file_exists($target_file)) {
        header("Location: ../view/wishlist_item_adding.php?error=Sorry, file already exists.");
        exit();
    }

    // Check file size limit
    if ($_FILES["photo"]["size"] > 5000000) { // Example limit of 5MB
        header("Location: ../view/wishlist_item_adding.php?error=Sorry, your file is too large. Maximum size allowed is 5MB.");
        exit();
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        // Insert file details into the image table
        $sql = "INSERT INTO image (file_name, file_size, file_type, upload_date) VALUES ('$target_file', '{$_FILES["photo"]["size"]}', '$imageFileType', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Get the last inserted image_id
            $image_id = mysqli_insert_id($conn);

            // Check for duplicate item in Wishlist_Items table
            $sql2 = "SELECT * FROM Wishlist_Items WHERE item_name = '$itemName' AND uid = $userid";
            $result2 = mysqli_query($conn, $sql2);
            
            if (mysqli_num_rows($result2) > 0) {
                header("Location: ../view/wishlist_item_adding.php?error=This item has already been added.");
                exit();
            }

            // Insert the new item into Wishlist_Items table
            $sql3 = "INSERT INTO Wishlist_Items (rid, sid, image_id, item_name, description, category, uid) VALUES ($userrole, 2, $image_id, '$itemName', '$itemDescription', '$category', $userid)";
            $result3 = mysqli_query($conn, $sql3);

            if ($result3) {
                header("Location: ../view/items.php");
                exit();
            } else {
                header("Location: ../view/wishlist_item_adding.php?error=Failed to add item to wishlist.");
                exit();
            }
        } else {
            header("Location: ../view/wishlist_item_adding.php?error=Failed to insert file details into database.");
            exit();
        }
    } else {
        // Provide more specific error information
        // Check if the target directory exists
        if (!is_dir($target_dir)) {
            $errorMsg = "Sorry, the target directory does not exist.";
        }
        // Check file permissions
        elseif (!is_writable($target_dir)) {
            $errorMsg = "Sorry, the target directory is not writable.";
        }
        // General error message for other issues
        else {
            // Retrieve the last error message
            $lastError = error_get_last();
            $errorMsg = "Sorry, there was an error uploading your file. " . $lastError['message'];
        }
        
        // Redirect with the error message
        header("Location: ../view/wishlist_item_adding.php?error=" . urlencode($errorMsg));
        exit();
    }
}
