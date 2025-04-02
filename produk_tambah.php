<?php
if (isset($_POST['nama_produk'])) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];

    $query = mysqli_query($koneksi, "INSERT INTO produk(nama_produk, harga, stock) VALUES ('$nama', '$harga', '$stock')");

    if ($query) {
        echo "<script>alert('Tambah data Berhasil')</script>";
    } else {
        echo "<script>alert('Tambah data Gagal')</script>";
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>
    <a href="?page=produk" class="btn btn-danger">Kembali</a>
    <hr>
    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Produk</td>
                <td width="1">:</td>
                <td><input type="text" class="form-control" name="nama_produk"></td>
            </tr>

            <tr>
                <td>Harga</td>
                <td>:</td>
                <td>
                    <input type="number" class="form-control" name="harga" step="0">
                </td>
            </tr>

            <tr>
                <td>Stock</td>
                <td>:</td>
                <td><input type="number" class="form-control" name="stock" step="0"></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                </td>
            </tr>
        </table>
    </form>
</div>