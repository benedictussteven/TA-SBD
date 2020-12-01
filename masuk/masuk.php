<?php
// Create database connection using config file
include_once("config.php");

session_start();

if ( !isset($_SESSION['status']) ) {
    header("Location: index.php?pesan=belum_login");
}

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM masuk ORDER BY no ASC");
?>

<html>
<head>    
    <title>Penambahan Stok</title>
</head>

<body>
    <a href="logout.php">LOGOUT</a>
    <center> <a href="stock.php">Daftar Stok</a><br/><br/> </center>
    <center> <a href="keluar.php">Penjualan</a><br/><br/> </center>

    <h2>DAFTAR PENAMBAHAN STOK</h2>

    <a href="add.masuk.php">Tambahkan Data</a><br/><br/>

    <table width='80%' border=1 style="text-align:center;">

    <tr>
    <th>No</th> <th>Kode</th> <th>Nama</th> <th>Warna</th> <th>Ram (GB)</th>
        <th>Kapasitas (GB)</th> <th>Tanggal</th> <th>Jumlah</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['no']."</td>";
        echo "<td>".$user_data['kode']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['warna']."</td>";   
        echo "<td>".$user_data['ram']."</td>"; 
        echo "<td>".$user_data['kapasitas']."</td>"; 
        echo "<td>".$user_data['tanggal']."</td>"; 
        echo "<td>".$user_data['jumlah']."</td>";  
        echo "<td><a href='edit.masuk.php?no=$user_data[no]'>Edit</a> | 
        <a href='delete.masuk.php?no=$user_data[no]'>Delete</a></td></tr>";        
    }
    ?>
    </table> 
</body>
</html>
