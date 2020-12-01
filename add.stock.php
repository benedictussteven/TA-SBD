<html>
<head>
    <title>Stok Baru</title>
</head>

<body>
    <a href="stock.php">Back</a>
    <br/><br/>

    <h2>Data Stok Baru</h2>

    <form action="add.stock.php" method="post" name="form1">
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
                <td>Harga Barang</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr> 
                <td>Stok Barang</td>
                <td><input type="text" name="stok"></td>
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
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO stock_barang(kode,nama,warna,ram,kapasitas,harga,stok) 
        VALUES('$kode','$nama','$warna','$ram','$kapasitas','$harga','$stok')");

        // Show message when user added
        echo "MANTAP BARANG BARU BOR . <a href='stock.php'>Liat Tabel</a>";
    }
    ?>
</body>
</html>
