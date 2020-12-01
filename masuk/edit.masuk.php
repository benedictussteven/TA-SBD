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
    $no = $_POST['no'];
    
    $kode = $_POST['kode'];
    $nama=$_POST['nama'];
    $warna=$_POST['warna'];
    $ram=$_POST['ram'];
    $kapasitas=$_POST['kapasitas'];
    $tanggal=$_POST['tanggal'];
    $jumlah=$_POST['jumlah'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE masuk SET kode='$kode',nama='$nama',warna='$warna',ram='$ram',
    kapasitas='$kapasitas',tanggal='$tanggal',jumlah='$jumlah' WHERE no=$no");

    // Redirect to data mahasiswa to display updated user in list
    header("Location: masuk.php");
}
?>
<?php
// Display selected user data based on nim
// Getting nim from url
$no = $_GET['no'];

// Fetech user data based on nim
$result = mysqli_query($mysqli, "SELECT * FROM masuk WHERE no=$no");

while($user_data = mysqli_fetch_array($result))
{
    $no = $user_data['no'];
    $kode = $user_data['kode'];
    $nama = $user_data['nama'];
    $warna = $user_data['warna'];
    $ram = $user_data['ram'];
    $kapasitas = $user_data['kapasitas'];
    $tanggal = $user_data['tanggal'];
    $jumlah = $user_data['jumlah'];
}
?>
<html>
<head>  
    <title>Edit Pemasukan</title>
</head>

<body>
    <a href="masuk.php">Daftar Penambahan Stok</a>
    <br/><br/>

    <h2>EDIT PENAMBAHAN STOK</h2>

    <form name="update_stok" method="post" action="edit.masuk.php">
        <table border="0">
            <tr> 
                <td>Kode Barang</td>
                <td><input type="text" name="kode" value=<?php echo $kode;?>></td>
            </tr>   
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
                <td>Tanggal Masuk Barang</td>
                <td><input type="date" name="tanggal" value=<?php echo $tanggal;?>></td>
            </tr>
            <tr> 
                <td>Jumlah Barang Masuk</td>
                <td><input type="text" name="jumlah" value=<?php echo $jumlah;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="no" value=<?php echo $_GET['no'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
