<?php
$id = $_GET['id'];

if (isset($_POST['nama_pelanggan'])) {
    $nama = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $query = mysqli_query($koneksi, "UPDATE pelanggan SET nama_pelanggan = '$nama', alamat = '$alamat', no_telepon = '$no_telepon' WHERE id_pelanggan = $id");

    if ($query) {
        echo "<script>alert('Ubah data Berhasil'); location.href='?page=pelanggan'</script>";
    } else {
        echo "<script>alert('Ubah data Gagal')</script>";
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan=$id");
$data = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pelanggan</li>
    </ol>
    <a href="?page=pelanggan" class="btn btn-danger">Kembali</a>
    <hr>
    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td><input type="text" class="form-control" name="nama_pelanggan" value="<?php echo $data['nama_pelanggan'] ?>"></td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <textarea name="alamat" rows="5" class="form-control"><?php echo $data['alamat'] ?></textarea>
                </td>
            </tr>

            <tr>
                <td>No. Telepon</td>
                <td>:</td>
                <td><input type="number" class="form-control" name="no_telepon" step="0" value="<?php echo $data['no_telepon'] ?>"></td>
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