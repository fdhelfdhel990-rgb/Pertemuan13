<!-- <?php
$nama      = "Fadhel Sahila"; 
$nim       = "25/568222/SV/27396"; 
$prodi     = "Teknologi Rekayasa Perangkat Lunak";
$asal_kota = "Sleman";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas 1 - Profil Diri</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse; 
            margin: 20px 0; 
            font-family: sans-serif; 
        }
        th, td { 
            border: 1px solid #bdc3c7; 
            padding: 20px; 
            text-align: left; 
            }
        th { 
            background-color: #0b0e10; 
            color: white; 
        }
    </style>
</head>
<body>
    <h2>Profil Saya</h2>
    <table>
        <tr>
            <th>Nama Lengkap</th>
            <td><?= $nama; ?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?= $nim; ?></td>
        </tr>
        <tr>
            <th>Program Studi</th>
            <td><?= $prodi; ?></td>
        </tr>
        <tr>
            <th>Asal Kota</th>
            <td><?= $asal_kota; ?></td>
        </tr>
    </table>

</body>
</html> -->

<?php
$nama   ="Fadhel Sahila albab";
$nim    ="25/568222/SV/27396";
$prodi  ="TRPL";
$daerah ="Sleman";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Profil Saya</h1>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= $nama?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?= $nim?></td>
        </tr>
        <tr>
            <th>Prodi</th>
            <td><?= $prodi?></td>
        </tr>
        <tr>
            <th>Daerah</th>
            <td><?= $daerah?></td>
        </tr>
    </table>
</body>
</html>