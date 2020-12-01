<html>
<head>
    <title>Penjualan</title>
</head>

<body>
    <a href="keluar.php">Back</a>
    <br/><br/>

    <h2>Data Penjualan</h2>

    <form action="add.keluar.php" method="post" name="form3">
        <table width="25%" border="0">
            <tr> 
                <td>Kode Barang</td>
                <td><input type="text" name="kode"></td>
            </tr>
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Warna Barang</td>
                <td><input type="text" name="warna"></td>
            </tr>
            <tr> 
                <td>Ram</td>
                <td><input type="text" name="ram"></td>
            </tr>
            <tr> 
                <td>Kapasitas Penyimpanan</td>
                <td><input type="text" name="kapasitas"></td>
            </tr>
            <tr> 
                <td>Nama Pembeli</td>
                <td><input type="text" name="pembeli"></td>
            </tr>
            <tr> 
                <td>Tanggal Pembelian</td>
                <td><input type="date" name="tanggal"></td>
            </tr>
            <tr> 
                <td>Jumlah</td>
                <td><input type="text" name="jumlah"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    session_start();

    if ( !isset($_SESSION['status']) ) {
        header("Location: index.php?pesan=belum_login");
    }
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $warna = $_POST['warna'];
        $ram = $_POST['ram'];
        $kapasitas = $_POST['kapasitas'];
        $pembeli = $_POST['pembeli'];
        $tanggal = $_POST['tanggal'];
        $jumlah = $_POST['jumlah'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO keluar(kode,nama,warna,ram,kapasitas,pembeli,tanggal,jumlah) 
        VALUES('$kode','$nama','$warna','$ram','$kapasitas','$pembeli','$tanggal','$jumlah')");

        // Show message when user added
        echo "MANTAP CUAN. GAS TERUSSS !!!! <a href='keluar.php'>Liat Tabel</a>";
    }
    ?>
</body>
</html>