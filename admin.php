<?php
// Koneksi
$host = "127.0.0.1";
$username = "root";  
$password = "";      
$dbname = "uas5a"; // Nama database

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tambahkan logika halaman di sini berdasarkan nilai 'action' dalam URL
$action = $_GET['action'] ?? 'dashboard';

// Logika untuk halaman dasbor (daftar artikel)
if ($action == 'dashboard') {
    $sql = "SELECT * FROM artikel";
    $result = $conn->query($sql);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <h1>Dashboard Admin</h1>
        <a href="?action=add">Tambah Artikel Baru</a>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Author</th>
                <th>Tanggal Publikasi</th>
                <th>Views</th>
                <th>Actions</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['judul']; ?></td>
                <td><?php echo $row['kategori']; ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['tanggal_publikasi']; ?></td>
                <td><?php echo $row['views']; ?></td>
                <td>
                    <a href="?action=edit&id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="?action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </body>
    </html>
    <?php
}

// Logika untuk menambah artikel
if ($action == 'add') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $kategori = $_POST['kategori'];
        $author = $_POST['author'];
        $tanggal_publikasi = $_POST['tanggal_publikasi'];
        $images = $_POST['images'];
        $views = 0;

        $sql = "INSERT INTO artikel (judul, isi, kategori, author, tanggal_publikasi, images, views)
                VALUES ('$judul', '$isi', '$kategori', '$author', '$tanggal_publikasi', '$images', '$views')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ?action=dashboard");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Tambah Artikel</title>
    </head>
    <body>
        <h1>Tambah Artikel Baru</h1>
        <form method="POST" action="">
            Judul: <input type="text" name="judul" required><br>
            Isi: <textarea name="isi" required></textarea><br>
            Kategori: 
            <select name="kategori">
                <option value="Technology">Technology</option>
                <option value="LifeStyle">LifeStyle</option>
            </select><br>
            Author: <input type="text" name="author" required><br>
            Tanggal Publikasi: <input type="date" name="tanggal_publikasi" required><br>
            Image Path: <input type="text" name="images"><br>
            <button type="submit">Tambah</button>
        </form>
    </body>
    </html>
    <?php
}

// Logika untuk mengedit artikel
if ($action == 'edit') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM artikel WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $kategori = $_POST['kategori'];
        $author = $_POST['author'];
        $tanggal_publikasi = $_POST['tanggal_publikasi'];
        $images = $_POST['images'];

        $sql = "UPDATE artikel SET 
                judul='$judul', isi='$isi', kategori='$kategori', author='$author',
                tanggal_publikasi='$tanggal_publikasi', images='$images'
                WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: ?action=dashboard");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Artikel</title>
    </head>
    <body>
        <h1>Edit Artikel</h1>
        <form method="POST" action="">
            Judul: <input type="text" name="judul" value="<?php echo $row['judul']; ?>" required><br>
            Isi: <textarea name="isi" required><?php echo $row['isi']; ?></textarea><br>
            Kategori: 
            <select name="kategori">
                <option value="Technology" <?php if($row['kategori'] == 'Technology') echo 'selected'; ?>>Technology</option>
                <option value="LifeStyle" <?php if($row['kategori'] == 'LifeStyle') echo 'selected'; ?>>LifeStyle</option>
            </select><br>
            Author: <input type="text" name="author" value="<?php echo $row['author']; ?>" required><br>
            Tanggal Publikasi: <input type="date" name="tanggal_publikasi" value="<?php echo $row['tanggal_publikasi']; ?>" required><br>
            Image Path: <input type="text" name="images" value="<?php echo $row['images']; ?>"><br>
            <button type="submit">Simpan</button>
        </form>
    </body>
    </html>
    <?php
}

// Logika untuk menghapus artikel
if ($action == 'delete') {
    $id = $_GET['id'];
    $sql = "DELETE FROM artikel WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ?action=dashboard");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
