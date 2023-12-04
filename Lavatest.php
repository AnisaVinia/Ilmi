<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD with Lava Theme</title>
    <style>
        /* CSS Lava Theme Hiasan */
        body {
            background-color: #FF5733;
            color: #FFF;
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #FFF;
        }

        th {
            background-color: #900C3F;
        }

        tr:nth-child(even) {
            background-color: #C70039;
        }

        tr:nth-child(odd) {
            background-color: #FF5733;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"], input[type="submit"] {
            padding: 8px;
        }

        input[type="submit"] {
            background-color: #900C3F;
            color: #FFF;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
// Koneksi ke database (sesuaikan dengan konfigurasi database Anda)
$host = 'localhost';
$username = 'username_db';
$password = 'password_db';
$database = 'nama_db';

$koneksi = mysqli_connect($host, $username, $password, $database);

// Fungsi Create
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $query = "INSERT INTO users (nama, email) VALUES ('$nama', '$email')";
    mysqli_query($koneksi, $query);
}

// Fungsi Read
$query_select = "SELECT * FROM users";
$result = mysqli_query($koneksi, $query_select);
?>

<!-- Tampilan Data -->
<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['email']; ?></td>
        </tr>
    <?php } ?>
</table>

<!-- Form Create -->
<form method="POST" action="">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" required>
    <label for="email">Email:</label>
    <input type="text" name="email" required>
    <input type="submit" name="submit" value="Tambah Data">
</form>

</body>
</html>
