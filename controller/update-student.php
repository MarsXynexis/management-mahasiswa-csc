<?php 
require_once "db.php";

if (isset($_POST["id"])){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $prodi_id = $_POST["prodi_id"];

    $query = "UPDATE mahasiswa SET nama='$nama', nim='$nim', prodi_id='$prodi_id' WHERE id=$id";
    execute($query);
    header("Location: ../index.php");
}
?>
