<?php
function hitungIMT($berat_kg, $tinggi_cm) {
    $tinggi_meter = $tinggi_cm / 100;
    
    
    $imt = $berat_kg / ($tinggi_meter * $tinggi_meter);
    $imt_format = round($imt, 1); 

    if ($imt_format < 18.5) {
        $kategori = "Kurus";
    } elseif ($imt_format >= 18.5 && $imt_format < 25.0) {
        $kategori = "Normal";
    } elseif ($imt_format >= 25.0 && $imt_format < 27.0) {
        $kategori = "Gemuk";
    } else {
        $kategori = "Obesitas";
    }

    return ['skor' => $imt_format, 'kategori' => $kategori];
}

$berat_badan  = 65;
$tinggi_badan = 170;
$hasil = hitungIMT($berat_badan, $tinggi_badan);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Kalkulator Indeks Massa Tubuh (IMT)</h2>
    <div class="box">
        <p> Berat Badan: <b><?= $berat_badan; ?> kg</b> <br></p>
        <p> Tinggi Badan: <b><?= $tinggi_badan; ?> cm</b></p>
        <hr>
        <p>Skor IMT Anda: <b><?= $hasil['skor']; ?></b></p>
        <p>Kategori: <b><?= $hasil['kategori']; ?></b></p>
    </div>

</body>
</html>