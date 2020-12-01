<html>
<head>
    <title>Penambahan Stok</title>
</head>

<body>
    <a href="masuk.php">Back</a>
    <br/><br/>

    <h2>Penambahan Stok</h2>

    <form action="add.masuk.php" method="post" name="form2">
        <table width="25%" border="0">
            <tr> 
                <td>Kode</td>
                <td><input type="text" name="kode"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Warna</td>
                <td><input type="text" name="warna"></td>
            </tr>
            <tr> 
                <td>Ram</td>
                <td><input type="text" name="ram"></td>
            </tr>
            <tr> 
                <td>Kapasitas</td>
                <td><input type="text" name="kapasitas"></td>
            </tr>
            <tr> 
                <td>Tanggal</td>
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
        $tanggal = $_POST['tanggal'];
        $jumlah = $_POST['jumlah'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO masuk(kode,nama,warna,ram,kapasitas,tanggal,jumlah) 
        VALUES('$kode','$nama','$warna','$ram','$kapasitas','$tanggal','$jumlah')");

        // Show message when user added
        echo "BARANG MAKIN BANYAK BRO. SEMANGAT !!!! <a href='masuk.php'>Liat Tabel</a>";
    }
    ?>
</body>
</html>