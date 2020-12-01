<?php
// include database connection file
include_once("config.php");

session_start();

if ( !isset($_SESSION['status']) ) {
    header("Location: index.php?pesan=belum_login");
}

// Check if form is submitted for user update, then redirect to data mahasiswa after update
if(isset($_POST['update']))
{   
    $kode = $_POST['kode'];
    
    $nama=$_POST['nama'];
    $warna=$_POST['warna'];
    $ram=$_POST['ram'];
    $kapasitas=$_POST['kapasitas'];
    $harga=$_POST['harga'];
    $stok=$_POST['stok'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE stock_barang SET nama='$nama',warna='$warna',ram='$ram',
    kapasitas='$kapasitas',harga='$harga',stok='$stok' WHERE kode=$kode");

    // Redirect to data mahasiswa to display updated user in list
    header("Location: stock.php");
}
?>
<?php
// Display selected user data based on nim
// Getting nim from url
$kode = $_GET['kode'];

// Fetech user data based on nim
$result = mysqli_query($mysqli, "SELECT * FROM stock_barang WHERE kode=$kode");

while($user_data = mysqli_fetch_array($result))
{
    $kode = $user_data['kode'];
    $nama = $user_data['nama'];
    $warna = $user_data['warna'];
    $ram = $user_data['ram'];
    $kapasitas = $user_data['kapasitas'];
    $harga = $user_data['harga'];
    $stok = $user_data['stok'];
}
?>
<html>
<head>  
    <title>Edit Stok</title>
</head>

<body>
    <a href="stock.php">Daftar Stok Gudang</a>
    <br/><br/>

    <h2>EDIT STOK</h2>

    <form name="update_stok" method="post" action="edit.stock.php">
        <table border="0">
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Warna Barang</td>
                <td><input type="text" name="warna" value=<?php echo $warna;?>></td>
            </tr>
            <tr> 
                <td>Ram Barang</td>
                <td><input type="text" name="ram" value=<?php echo $ram;?>></td>
            </tr>
            <tr> 
                <td>Kapasitas Penyimpanan</td>
                <td><input type="text" name="kapasitas" value=<?php echo $kapasitas;?>></td>
            </tr>
            <tr> 
                <td>Harga Barang</td>
                <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr> 
                <td>Jumlah Stok</td>
                <td><input type="text" name="stok" value=<?php echo $stok;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="kode" value=<?php echo $_GET['kode'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
