<?php 
if (isset($_GET['id'])) {
	include "db_conn.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "SELECT * FROM item WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    } else {
    	header("Location: read_item.php");
    }
} else if (isset($_POST['update'])) {
    include "../db_conn.php";

    function validate($data){
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
	$id = validate($_POST['id']);

	if (empty($item_code)) {
		header("Location: ../update_item.php?id=$id&error=Item code is required");
	} else if (empty($item_category)) {
		header("Location: ../update_item.php?id=$id&error=Item category is required");
	} else if (empty($item_subcategory)) {
		header("Location: ../update_item.php?id=$id&error=Item subcategory is required");
	} else if (empty($item_name)) {
		header("Location: ../update_item.php?id=$id&error=Item name is required");
	} else if (empty($quantity)) {
		header("Location: ../update_item.php?id=$id&error=Quantity is required");
	} else if (empty($unit_price)) {
		header("Location: ../update_item.php?id=$id&error=Unit price is required");
	} else {
		$sql = "UPDATE item
				SET item_code='$item_code', item_category='$item_category', item_subcategory='$item_subcategory', item_name='$item_name', quantity='$quantity', unit_price='$unit_price'
				WHERE id=$id ";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: ../read_item.php?success=Item successfully updated");
		} else {
			header("Location: ../update_item.php?id=$id&error=Unknown error occurred");
		}
	}
} else {
	header("Location: read_item.php");
}
?>
