<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<h1>Edit keterangan buku</h1>
<form action="" method="post">
    <div class="row g-3">
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Judul" aria-label="Judul" name="judul">
    </div>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Deskripsi" aria-label="Deskripsi" name="description">
    </div>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Penulis" aria-label="Penulis" name="Penulis">
    </div>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Jumlah Halaman" aria-label="Jumlah Halaman" name="jmlHal">
    </div>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Kategori" aria-label="Kategori" name="categorie">
    </div>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Penerbit" aria-label="Penerbit" name="penerbit">
    </div>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Masukkan link Gambar" aria-label="Masukkan link Gambar" name="img">
    </div>
    <input name="submit" class="btn btn-primary" type="submit" style="width: 28%; margin-left: 0">  
    </div>
</form>
<a href="index.php">Kembali ke beranda</a>
<?php 
    //Apakah tombol tambah sudah ditekan
    if(isset($_POST["submit"])){
        //buka file json
        $getJSONFile = file_get_contents("buku.json");
        //pecah ke dalam file array php 
        $buku = json_decode($getJSONFile, true);
        //membuat assoc array untuk menampung data POST
        $input = [
            "judul" => $_POST["judul"],
            "description" => $_POST["description"],
            "Penulis" => $_POST["Penulis"],
            "jmlHal" => $_POST["jmlHal"],
            "categorie" => $_POST["categorie"],
            "penerbit" => $_POST["penerbit"],
            "img" => $_POST["img"]
        ];

        $inputValues = array_values($input);
        $isEmpty = false;
        foreach ($inputValues as $value){
            if (empty($value)){
                $isEmpty = true;
                break;
            }
        }
        if(!$isEmpty){
        //tambahkan $input ke variabel data
        $buku[] = $input;
        //kembalikan lagi data ke JSON
        $data = json_encode($buku, JSON_PRETTY_PRINT);
        file_put_contents("buku.json", $data);
        //arahkan kembali ke index.php
        header("Location: index.php");

    }else{
        echo "Masukkan terlebih dahulu data di atas";
    }
}
    
    ?>
</body>
</html>