<?php
if (isset($_POST['create'])) {
    include "../../db_conn.php";
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $item_code = validate($_POST['item_code']);
    $item_category = validate($_POST['item_category']);
    $item_subcategory = validate($_POST['item_subcategory']);
    $item_name = validate($_POST['item_name']);
    $quantity = validate($_POST['quantity']);
    $unit_price = validate($_POST['unit_price']);

    $item_data = 'item_code=' . $item_code . '&item_category=' . $item_category . '&item_subcategory=' . $item_subcategory . '&item_name=' . $item_name . '&quantity=' . $quantity . '&unit_price=' . $unit_price;

    if (empty($item_code)) {
        header("Location: ../create_item.php?error=Item code is required&$item_data");
    } elseif (empty($item_category)) {
        header("Location: ../create_item.php?error=Item category is required&$item_data");
    } elseif (empty($item_subcategory)) {
        header("Location: ../create_item.php?error=Item subcategory is required&$item_data");
    } elseif (empty($item_name)) {
        header("Location: ../create_item.php?error=Item name is required&$item_data");
    } elseif (empty($quantity)) {
        header("Location: ../create_item.php?error=Quantity is required&$item_data");
    } elseif (empty($unit_price)) {
        header("Location: ../create_item.php?error=Unit price is required&$item_data");
    } else {
        $sql = "INSERT INTO item(item_code, item_category, item_subcategory, item_name, quantity, unit_price) 
                VALUES('$item_code', '$item_category', '$item_subcategory', '$item_name', '$quantity', '$unit_price')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../read_item.php?success=Item created successfully");
        } else {
            header("Location: ../read_item.php?error=Unknown error occurred&$item_data");
        }
    }
}
?>
