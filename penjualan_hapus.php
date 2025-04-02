<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_penjualan=$id");
$query = mysqli_query($koneksi, "DELETE FROM detail_penjualan WHERE id_penjualan=$id");

if ($query) {
    echo "<script>alert('Hapus data Berhasil'); location.href='?page=penjualan'</script>";
} else {
    echo "<script>alert('Hapus data Gagal')</script>";
}
