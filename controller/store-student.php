<?php 

$name = $_POST["name"];
$nim = $_POST["nim"];
$major = $_POST["major"];

$filename = $_POST["name"] . ".jpg";
$filenametmp = $_FILES["profile_picture"]["tmp_name"];
move_uploaded_file($filenametmp, "../public/images/" . $filename);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Data mahasiswa berhasil ditambahkan!</p>
    <?= $name . " - " . $nim . " - " . $major . "<br><br>" . $filename ?>
    <br>
    <img src="../public/images/<?= $filename ?>" alt="Profile Picture" width="200">
    <br>
    <button>
        <a href="../index.php">Kembali ke Daftar Mahasiswa</a>
    </button>

</body>
</html>