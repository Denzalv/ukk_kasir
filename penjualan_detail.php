<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan 
ON pelanggan.id_pelanggan = penjualan.id_pelanggan WHERE id_penjualan = $id");

$data = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"> Detail Penjualan</li>
    </ol>
    <a href="?page=penjualan" class="btn btn-danger">Kembali</a>
    <hr>
    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td>
                    <?php echo $data['nama_pelanggan'] ?>
                </td>
            </tr>

            <?php
            $queryProduk = mysqli_query($koneksi, "SELECT * FROM detail_penjualan LEFT JOIN produk ON produk.id_produk = detail_penjualan.id_produk WHERE id_penjualan= $id");
            while ($dataProduk = mysqli_fetch_array($queryProduk)) {

            ?>

                <tr>
                    <td><?php echo $dataProduk['nama_produk']; ?></td>
                    <td>:</td>
                    <td>
                        Harga Satuan : <?php echo $dataProduk['harga']; ?>
                        <br>
                        Jumlah : <?php echo $dataProduk['jumlah_produk']; ?>
                        <br>
                        Sub Total : <?php echo $dataProduk['sub_total']; ?>
                    </td>
                </tr>
            <?php
            }
            ?>

            <tr>
                <td>Total</td>
                <td>:</td>
                <td>
                    <?php echo $data['total_harga'] ?>
                </td>
            </tr>
        </table>
    </form>
</div>