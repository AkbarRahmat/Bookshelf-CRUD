<?php 

$getJSONFile = file_get_contents("buku.json");
$buku = json_decode($getJSONFile);

$length = count($buku);
for($i=0;$i<$length;$i++)
{
    for($j= 0;$j<($length-1-$i);$j++){
        if($buku[$j] > $buku[$j+1])
        {
            $temp = $buku[$j];
            $buku[$j] = $buku[$j+ 1];
            $buku[$j+1] = $temp;
        }
    }
}
for($k=0;$k<$length;$k++)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Sejahtera</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <a href="tambah.php">Tambahkan Buku yang ingin disimpan</a>
<table class="table table-dark table-hover">
<thead>
    <tr>
      <th scope="col">Judul Buku</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Penulis</th>
      <th scope="col">Jumlah Halaman</th>
      <th scope="col">Kategori</th>
      <th scope="col">Penerbit</th>
      <th scope="col">Gambar Buku</th>
      <th scope="col">Aksi</th>
    </tr>
    <?php 
        $index = 0;
        foreach ($buku as $bk): ?>
  </thead>
  <tbody>
    <tr>
        <td><?= $bk->judul ?></td>
        <td><?= $bk->description ?></td>
        <td><?= $bk->Penulis ?></td>
        <td><?= $bk->jmlHal ?></td>
        <td><?= $bk->categorie ?></td>
        <td><?= $bk->penerbit ?></td>
        <td><img src="<?= $bk->img ?>" alt="buku"></td>
        <td>
            <a href="edit.php?index=<?= $index ?>">Edit</a> | 
            <a href="delete.php?index=<?= $index ?>">Delete</a>
        </td>
    </tr>
  </tbody>
  <?php
        $index++;
    endforeach;?>
</table>
</body>
</html>