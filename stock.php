<?php
// Create database connection using config file
include_once("config.php");

session_start();

if ( !isset($_SESSION['status']) ) {
    header("Location: index.php?pesan=belum_login");
}

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM stock_barang ORDER BY kode ASC");
?>

<html>
<head>    
    <title>Stock Barang</title>
</head>

<body>
    <a href="logout.php">LOGOUT</a>
    <center> <a href="admin.php">Daftar Admin</a><br/><br/> </center>
    <center> <a href="keluar.php">Penjualan</a><br/><br/> </center>

    <h2>DAFTAR STOK GUDANG</h2>

    <a href="add.stock.php">Stok Baru</a><br/><br/>

    <table width='80%' border=1 style="text-align:center;">

    <tr>
        <th>Kode</th> <th>Nama</th> <th>Warna</th> <th>Ram (GB)</th>
        <th>Kapasitas (GB)</th> <th>Harga (Rp)</th> <th>Stok</th> <th>ID Admin</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['kode']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['warna']."</td>";   
        echo "<td>".$user_data['ram']."</td>"; 
        echo "<td>".$user_data['kapasitas']."</td>"; 
        echo "<td>".$user_data['harga']."</td>"; 
        echo "<td>".$user_data['stok']."</td>";  
        echo "<td>".$user_data['id_admin']."</td>";
        echo "<td><a href='edit.stock.php?kode=$user_data[kode]'>Edit</a> | 
        <a href='delete.stock.php?kode=$user_data[kode]'>Delete</a></td></tr>";        
    }
    ?>
    </table> 
</body>
</html>
