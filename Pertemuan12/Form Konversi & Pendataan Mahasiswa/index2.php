<?php
$nama = $nim = $prodi = $ipk = $semester = "";
$error_nama = $error_nim = $error_prodi = $error_ipk = $error_semester = "";
$berhasil = false;
$predikat = "";
$warna = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["nama"])) {
        $error_nama = "* Nama wajib diisi";
    } else {
        $nama = htmlspecialchars(trim($_POST["nama"])); 
    }
    if (empty($_POST["nim"])) {
        $error_nim = "* NIM wajib diisi";
    } elseif (!is_numeric($_POST["nim"])) {
        $error_nim = "* NIM hanya boleh berisi angka";
    } else {
        $nim = htmlspecialchars(trim($_POST["nim"]));
    }

    if (empty($_POST["prodi"])) {
        $error_prodi = "* Prodi wajib dipilih";
    } else {
        $prodi = htmlspecialchars($_POST["prodi"]);
    }

    if (empty($_POST["ipk"]) && $_POST["ipk"] !== "0") {
        $error_ipk = "* IPK wajib diisi";
    } elseif (!is_numeric($_POST["ipk"])) {
        $error_ipk = "* IPK harus berupa angka (contoh: 3.50)";
    } elseif ($_POST["ipk"] < 0 || $_POST["ipk"] > 4) {
        $error_ipk = "* IPK harus di antara 0 sampai 4";
    } else {
        $ipk = htmlspecialchars(trim($_POST["ipk"]));
    }

    // 5. Validasi Semester (Wajib diisi & hanya angka)
    if (empty($_POST["semester"])) {
        $error_semester = "* Semester wajib diisi";
    } elseif (!is_numeric($_POST["semester"])) {
        $error_semester = "* Semester hanya boleh berisi angka";
    } else {
        $semester = htmlspecialchars(trim($_POST["semester"]));
    }

    if (empty($error_nama) && empty($error_nim) && empty($error_prodi) && empty($error_ipk) && empty($error_semester)) {
        $berhasil = true;
        $nilai_ipk = floatval($ipk);

        if ($nilai_ipk >= 3.50) {
            $predikat = "Dengan Pujian";
            $warna = "green";
        } elseif ($nilai_ipk >= 3.00) {
            $predikat = "Sangat Memuaskan";
            $warna = "blue";
        } elseif ($nilai_ipk >= 2.50) {
            $predikat = "Memuaskan";
            $warna = "#d4b500"; // Menggunakan kuning gelap (gold) agar teks mudah dibaca
        } elseif ($nilai_ipk >= 2.00) {
            $predikat = "Cukup";
            $warna = "orange";
        } else {
            $predikat = "Kurang";
            $warna = "red";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Pendataan Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
        }
        .container {
            width: 500px;
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }
        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
        .btn-submit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .btn-submit:hover {
            background-color: #45a049;
        }
        /* Style untuk hasil data */
        .hasil-container {
            width: 500px;
            background-color: #eef7ee;
            padding: 20px;
            border: 1px solid #c3e6c3;
            margin: 20px auto 0 auto;
        }
        .hasil-container h3 {
            margin-top: 0;
            text-align: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .predikat-text {
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Form Pendataan Mahasiswa</h2>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            
            <div class="form-group">
                <label>Nama Lengkap:</label>
                <input type="text" name="nama" value="<?php echo $nama; ?>">
                <span class="error"><?php echo $error_nama; ?></span>
            </div>

            <div class="form-group">
                <label>NIM:</label>
                <input type="text" name="nim" value="<?php echo $nim; ?>">
                <span class="error"><?php echo $error_nim; ?></span>
            </div>

            <div class="form-group">
                <label>Program Studi:</label>
                <select name="prodi">
                    <option value="">-- Pilih Prodi --</option>
                    <option value="Informatika" <?php if($prodi == "Informatika") echo "selected"; ?>>Informatika</option>
                    <option value="Sistem Informasi" <?php if($prodi == "Sistem Informasi") echo "selected"; ?>>Sistem Informasi</option>
                    <option value="Teknik Industri" <?php if($prodi == "Teknik Industri") echo "selected"; ?>>Teknik Industri</option>
                    <option value="Manajemen" <?php if($prodi == "Manajemen") echo "selected"; ?>>Manajemen</option>
                </select>
                <span class="error"><?php echo $error_prodi; ?></span>
            </div>

            <div class="form-group">
                <label>IPK (0 - 4):</label>
                <input type="text" name="ipk" value="<?php echo $ipk; ?>">
                <span class="error"><?php echo $error_ipk; ?></span>
            </div>

            <div class="form-group">
                <label>Semester:</label>
                <input type="text" name="semester" value="<?php echo $semester; ?>">
                <span class="error"><?php echo $error_semester; ?></span>
            </div>

            <button type="submit" class="btn-submit">Simpan Data</button>
        </form>
    </div>

    <?php if ($berhasil) { ?>
        <div class="hasil-container">
            <h3>Hasil Pendataan</h3>
            <p><strong>Nama:</strong> <?php echo $nama; ?></p>
            <p><strong>NIM:</strong> <?php echo $nim; ?></p>
            <p><strong>Program Studi:</strong> <?php echo $prodi; ?></p>
            <p><strong>Semester:</strong> <?php echo $semester; ?></p>
            <p><strong>IPK:</strong> <?php echo number_format($nilai_ipk, 2); ?></p>
            
            <p><strong>Predikat Kelulusan:</strong> 
                <span class="predikat-text" style="color: <?php echo $warna; ?>;">
                    <?php echo $predikat; ?>
                </span>
            </p>
        </div>
    <?php } ?>

</body>
</html>