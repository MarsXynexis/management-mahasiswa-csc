<?php
require "db.php";

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $query = "DELETE FROM mahasiswa WHERE id=$id";
    execute($query);
    header("Location: ../index.php");
}
