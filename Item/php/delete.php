<?php
if (isset($_GET['id'])) {
    include "../db_conn.php";
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "DELETE FROM item
            WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../read_item.php?success=Item deleted successfully");
    } else {
        header("Location: ../read_item.php?error=Unknown error occurred");
    }
} else {
    header("Location: ../read_item.php");
}
?>
