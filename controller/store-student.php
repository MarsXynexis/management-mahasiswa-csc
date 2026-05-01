<?php
require_once "db.php";

if (isset($_POST["nama"]) && isset($_POST["nim"]) && isset($_POST["prodi_id"])) {
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $prodi_id = $_POST["prodi_id"];

    $filename = $_POST["nama"] . ".jpg";
    $filenametmp = $_FILES["profile_picture"]["tmp_name"];
    move_uploaded_file($filenametmp, "../public/images/" . $filename);

    $query = "INSERT INTO mahasiswa (nama, nim, prodi_id) VALUES ('$nama', '$nim', '$prodi_id')";
    execute($query);
    header("Location: ../index.php");
}


