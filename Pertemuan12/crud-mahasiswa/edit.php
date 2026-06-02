<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id = '$id'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);

if (isset($_POST['update'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $nim = htmlspecialchars($_POST['nim']);
    $prodi = htmlspecialchars($_POST['prodi']);
    $semester = htmlspecialchars($_POST['semester']);

    $query_update = "UPDATE mahasiswa SET nama='$nama', nim='$nim', prodi='$prodi', semester='$semester' WHERE id='$id'";
    mysqli_query($koneksi, $query_update);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

   <nav class="navbar navbar-dark bg-primary mb-4 py-4">
        <div class="container d-flex align-items-center">
            <span class="navbar-brand mb-0 h1 fw-bold">SISTEM DATA MAHASISWA</span>
        </div>
    </nav>

    <div class="container">
        <div class="card" style="max-width: 600px; margin: auto;">
            <div class="card-header bg-white fw-bold">
                Edit Data Mahasiswa
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control" value="<?php echo $data['nim']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Prodi</label>
                        <input type="text" name="prodi" class="form-control" value="<?php echo $data['prodi']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Semester</label>
                        <input type="number" name="semester" class="form-control" value="<?php echo $data['semester']; ?>" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update Data</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>