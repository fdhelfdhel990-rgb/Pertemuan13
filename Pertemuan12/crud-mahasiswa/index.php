<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $nim = htmlspecialchars($_POST['nim']);
    $prodi = htmlspecialchars($_POST['prodi']);
    $semester = htmlspecialchars($_POST['semester']);
    $query = "INSERT INTO mahasiswa (nama, nim, prodi, semester) VALUES ('$nama', '$nim', '$prodi', '$semester')";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-warm">

   <nav class="navbar navbar-dark bg-primary mb-4 py-4">
        <div class="container d-flex align-items-center">
            <span class="navbar-brand mb-0 h1 fw-bold">SISTEM DATA MAHASISWA</span>
        </div>
    </nav>

    <div class="container">
        <div class="card mb-4">
            <div class="card-header bg-white fw-bold">
                Tambah Data Mahasiswa
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>NIM</label>
                            <input type="text" name="nim" class="form-control" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Prodi</label>
                            <input type="text" name="prodi" class="form-control" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Semester</label>
                            <input type="number" name="semester" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white fw-bold">
                Daftar Mahasiswa
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Prodi</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM mahasiswa ORDER BY id DESC";
                            $hasil = mysqli_query($koneksi, $query);
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($hasil)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['nim']; ?></td>
                                <td><?php echo $data['prodi']; ?></td>
                                <td><?php echo $data['semester']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="hapus.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>