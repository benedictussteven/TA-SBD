<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id_admin = $_GET['id_admin'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM admin WHERE id_admin=$id_admin");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:admin.php");
?>
