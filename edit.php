<?php 
if (!isset ($_GET["index"])||
!is_numeric ($_GET["index"])
){
    header("Location: index.php");
    exit();
}

$index = $_GET["index"];

$getJSONFile = file_get_contents("buku.json");
$buku = json_decode($getJSONFile);

$row = $buku[$index];

if(isset($_POST["submit"])){

    $input = [
        "judul" => $_POST["judul"],
        "description" => $_POST["description"],
        "Penulis" => $_POST["Penulis"],
        "jmlHal" => $_POST["jmlHal"],
        "categories" => $_POST["categorie"],
        "penerbit" => $_POST["penerbit"],
        "img" => $_POST["img"]
    ];
    $buku[$index] = $input;

    $data = json_encode($buku, JSON_PRETTY_PRINT);
    file_put_contents("buku.json", $data);

    header("Location: index.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Edit keterangan buku</h1>
<form action="" method="post">
    <div class="row g-3">
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Judul" aria-label="Judul" name="judul"  value="<?= $row->judul ?>">
    </div>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Deskripsi" aria-label="Deskripsi" name="description" value="<?= $row->description ?>">
    </div>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Penulis" aria-label="Penulis" name="Penulis" value="<?= $row->Penulis ?>">
    </div>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Jumlah Halaman" aria-label="Jumlah Halaman" name="jmlHal" value="<?= $row->jmlHal ?>">
    </div>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Kategori" aria-label="Kategori" name="categorie" value="<?= $row->categorie ?>">
    </div>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Penerbit" aria-label="Penerbit" name="penerbit" value="<?= $row->penerbit?>">
    </div>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Masukkan link Gambar" aria-label="Masukkan link Gambar" name="img" value="<?= $row->img ?>">
    </div>
    <input name="submit" class="btn btn-primary" type="submit" style="width: 28%; margin-left: 0">  
    </div>
</form>
</body>
</html>