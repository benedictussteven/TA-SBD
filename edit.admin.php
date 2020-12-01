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
    $id_admin = $_POST['id_admin'];
    
    $username = $_POST['username'];
    $password=md5($_POST['password']);

    // update user data
    $result = mysqli_query($mysqli, "UPDATE admin SET username='$username',password='$password'
    WHERE id_admin=$id_admin");

    // Redirect to data mahasiswa to display updated user in list
    header("Location: admin.php");
}
?>
<?php
// Display selected user data based on nim
// Getting nim from url
$id_admin = $_GET['id_admin'];

// Fetech user data based on nim
$result = mysqli_query($mysqli, "SELECT * FROM admin WHERE id_admin=$id_admin");

while($user_data = mysqli_fetch_array($result))
{
    $id_admin = $user_data['id_admin'];
    $username = $user_data['username'];
    $password = $user_data['password'];
}
?>
<html>
<head>  
    <title>Edit Admin</title>
</head>

<body>
    <a href="admin.php">Daftar Admin</a>
    <br/><br/>

    <h2>EDIT ADMIN</h2>

    <form name="update_stok" method="post" action="edit.admin.php">
        <table border="0">
            <tr> 
                <td>Username</td>
                <td><input type="text" name="username" value=<?php echo $username;?>></td>
            </tr>   
            <tr> 
                <td>Password</td>
                <td><input type="text" name="password" value=<?php echo $password;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_admin" value=<?php echo $_GET['id_admin'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
