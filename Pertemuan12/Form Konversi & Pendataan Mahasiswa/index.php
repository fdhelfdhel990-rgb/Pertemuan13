<?php
$nilai = "";
$grade = "";
$deskripsi = "";
$warna = "";
$pesan_error = "";
if (isset($_POST['submit'])) {
    $nilai = $_POST['nilai'];
    if ($nilai == "") {
        $pesan_error = "Nilai tidak boleh kosong!";
    } elseif (!is_numeric($nilai)) {
        $pesan_error = "Nilai harus berupa angka!";
    } elseif ($nilai < 0 || $nilai > 100) {
        $pesan_error = "Nilai harus berada di antara 0 - 100!";
    } else {
        if ($nilai >= 85 && $nilai <= 100) {
            $grade = "A";
            $deskripsi = "Sangat Baik";
            $warna = "green";
        } elseif ($nilai >= 70 && $nilai <= 84) {
            $grade = "B";
            $deskripsi = "Baik";
            $warna = "blue";
        } elseif ($nilai >= 55 && $nilai <= 69) {
            $grade = "C";
            $deskripsi = "Cukup";
            $warna = "#d4af37"; 
        } elseif ($nilai >= 40 && $nilai <= 54) {
            $grade = "D";
            $deskripsi = "Kurang";
            $warna = "orange";
        } elseif ($nilai >= 0 && $nilai <= 39) {
            $grade = "E";
            $deskripsi = "Sangat Kurang";
            $warna = "red";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas Konversi Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
        h2, h3 {
            text-align: center;
        }
        .form-group {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 8px;
            width: 200px;
        }
        input[type="submit"] {
            padding: 8px 15px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            border-radius:4px;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
        .hasil {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #fafafa;
            text-align: center;
        }
        .error {
            color: red;
            text-align: center;
            font-weight: bold;
        }
        table {
            width: 80%;
            margin: 30px auto 0 auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000000;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Program Konversi Nilai Mahasiswa</h2>
    <?php if ($pesan_error != "") { echo "<p class='error'>$pesan_error</p>"; } ?>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nilai">Masukkan Nilai (0 - 100): </label>
            <input type="text" name="nilai" id="nilai" value="<?php echo $nilai; ?>" autocomplete="off">
            <input type="submit" name="submit" value="Konversi">
        </div>
    </form>

    <?php if (isset($_POST['submit']) && $pesan_error == "") { ?>
        <div class="hasil">
            <h3>Hasil Konversi</h3>
            <p>Nilai Angka: <strong><?php echo $nilai; ?></strong></p>
            <p>Grade Huruf: <strong style="font-size: 24px; color: <?php echo $warna; ?>;"><?php echo $grade; ?></strong></p>
            <p>Deskripsi: <strong style="color: <?php echo $warna; ?>;"><?php echo $deskripsi; ?></strong></p>
        </div>
    <?php } ?>

    <table>
        <tr>
            <th>Rentang Nilai</th>
            <th>Grade</th>
            <th>Deskripsi</th>
        </tr>
        <tr>
            <td>85 - 100</td>
            <td>A</td>
            <td>Sangat Baik</td>
        </tr>
        <tr>
            <td>70 - 84</td>
            <td>B</td>
            <td>Baik</td>
        </tr>
        <tr>
            <td>55 - 69</td>
            <td>C</td>
            <td>Cukup</td>
        </tr>
        <tr>
            <td>40 - 54</td>
            <td>D</td>
            <td>Kurang</td>
        </tr>
        <tr>
            <td>0 - 39</td>
            <td>E</td>
            <td>Sangat Kurang</td>
        </tr>
    </table>
</div>

</body>
</html>