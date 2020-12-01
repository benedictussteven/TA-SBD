<?php
// Create database connection using config file
include_once("config.php");

session_start();

if ( !isset($_SESSION['status']) ) {
    header("Location: index.php?pesan=belum_login");
}

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM admin ORDER BY id_admin ASC");
?>

<html>
<head>    
    <title>Daftar Admin</title>
</head>

<body>
    <a href="logout.php">LOGOUT</a>
    <center> <a href="stock.php">Daftar Stok</a><br/><br/> </center>
    <center> <a href="keluar.php">Penjualan</a><br/><br/> </center>

    <h2>DAFTAR ADMIN</h2>

    <a href="add.admin.php">Admin Baru</a><br/><br/>

    <table width='80%' border=1 style="text-align:center;">

    <tr>
        <th>ID Admin</th> <th>Username</th> <th>Password</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id_admin']."</td>";
        echo "<td>".$user_data['username']."</td>";
        echo "<td>".$user_data['password']." </td>";   
        echo "<td><a href='edit.admin.php?id_admin=$user_data[id_admin]'>Edit</a> | 
        <a href='delete.admin.php?id_admin=$user_data[id_admin]'>Delete</a></td></tr>";        
    }
    ?>
    </table> 
</body>
</html>
