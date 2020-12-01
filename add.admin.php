<html>
<head>
    <title>Stok Baru</title>
</head>

<body>
    <a href="admin.php">Back</a>
    <br/><br/>

    <h2>Data Admin Baru</h2>

    <form action="add.admin.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>ID Admin</td>
                <td><input type="text" name="id_admin"></td>
            </tr>
            <tr> 
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="md5" name="password"></td>
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
        $id_admin = $_POST['id_admin'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO admin(id_admin,username,password) 
        VALUES('$id_admin','$username','$password')");

        // Show message when user added
        echo "ADA ADMIN BARU NIH BOR . <a href='admin.php'>Liat Tabel</a>";
    }
    ?>
</body>
</html>
