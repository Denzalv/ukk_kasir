<?php
if (isset($_POST['id_pelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $produk = $_POST['produk'];
    $total = 0;
    $tanggal = date('Y/m/d');

    $query = mysqli_query($koneksi, "INSERT INTO penjualan(tanggal_penjualan, id_pelanggan) 
    VALUES ('$tanggal', '$id_pelanggan')");

    $idTerakhir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM penjualan 
    ORDER BY id_penjualan DESC"));
    
    $id_penjualan = $idTerakhir['id_penjualan'];

    foreach ($produk as $key => $val) {
        $pr = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = $key"));

        if ($val > 0) {
            $sub = $val * $pr['harga'];
            $total += $sub;

            $query = mysqli_query($koneksi, "INSERT INTO detail_penjualan(id_penjualan, id_produk, jumlah_produk, sub_total) VALUES ($id_penjualan, $key, $val, $sub)");
            $updateProduk = mysqli_query($koneksi, "UPDATE produk SET stock=stock-$val WHERE id_produk=$key");
        }
    }

    $query = mysqli_query($koneksi, "UPDATE penjualan SET total_harga= $total WHERE id_penjualan = $id_penjualan");
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
        <li class="breadcrumb-item active">Penjualan</li>
    </ol>
    <a href="?page=penjualan" class="btn btn-danger">Kembali</a>
    <hr>
    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td>
                    <select class="form-control form-select" name="id_pelanggan">
                        <?php
                        $queryPelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                        while ($dataPelanggan = mysqli_fetch_array($queryPelanggan)) {
                        ?>
                            <option value="<?php echo $dataPelanggan['id_pelanggan'] ?>"><?php echo $dataPelanggan['nama_pelanggan'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <?php
            $queryProduk = mysqli_query($koneksi, "SELECT * FROM produk");
            while ($dataProduk = mysqli_fetch_array($queryProduk)) {

            ?>

                <tr>
                    <td><?php echo $dataProduk['nama_produk'] . ' (stock : ' . $dataProduk['stock'] . ')'; ?></td>
                    <td>:</td>
                    <td>
                        <input type="number" class="form-control" name="produk[<?php echo $dataProduk['id_produk'] ?>]" step="0" value="0" max="<?php echo $dataProduk['stock']; ?>">
                    </td>
                </tr>
            <?php
            }
            ?>

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