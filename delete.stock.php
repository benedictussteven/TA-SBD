<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$kode = $_GET['kode'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM stock_barang WHERE kode=$kode");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:stock.php");
?>
