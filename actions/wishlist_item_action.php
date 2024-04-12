<?php
session_start();

include "../settings/connection.php";

if (isset($_POST['submit_button'])) {
    $itemName = mysqli_real_escape_string($conn, $_POST['itemName']);
    $itemDescription = mysqli_real_escape_string($conn, $_POST['itemDescription']);
    $userrole = $_SESSION['user_role'];
    $userid = $_SESSION['user_id'];

    if ($_FILES['photo']['size'] == 0) {
        header("Location: ../view/wishlist_item_adding.php?error=Image file is required");
        exit();
    }


    if (empty($itemName)) {
        header("Location: ../view/wishlist_item_adding.php?error=Item Name is required");
        exit();
    } else if (empty($itemDescription)) {
        header("Location: ../view/wishlist_item_adding.php?error=Item Description is required");
        exit();
    }

    if (isset($_POST["category"])) {
        $category = $_POST["category"];
    } else {
        header("Location: ../view/wishlist_item_adding.php?error=Please select a category.");
        exit();
    }

    
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        header("Location: ../view/wishlist_item_adding.php?error=Sorry, file already exists.");
        exit();
    }

    if ($uploadOk == 0) {
        header("Location: ../view/wishlist_item_adding.php?error=Sorry, your file was not uploaded.");
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $file_Size = $_FILES["photo"]["size"];

            $sql = "INSERT INTO image (file_name, file_size, file_type) VALUES ('$target_file', '$file_Size', '$imageFileType','$userid')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $sql_img = "SELECT * from image ORDER BY image_id DESC";
                $result_img = mysqli_query($conn, $sql_img);
                $row = mysqli_fetch_assoc($result_img);

                if ($row) {
                    $image_id = $row['image_id'];
                }
                $sql2 = "SELECT * from Wishlist_Items where item_name='$itemName'";
                $result2 = mysqli_query($conn, $sql2);
                $count_items = mysqli_num_rows($result2);

                if ($count_items == 0) {
                    $sql3 = "INSERT INTO Wishlist_Items(rid,sid,image_id,item_name,description,uid,category,uid) VALUES('$userrole',1,'$image_id' ,'$itemName','$itemDescription','$category','$userid')";
                    $result3 = mysqli_query($conn, $sql3);

                    if ($result3) {
                        header("Location: ../view/items.php");
                    }
                } else {
                    if ($count_items > 0) {
                        header("Location: ../view/wishlist_item_adding.php?error=This item has already been added");
                    }
                }
            }
        } else {
            header("Location: ../view/wishlist_item_adding.php?error=Sorry, there was an error uploading your file.");
        }
    }
}
