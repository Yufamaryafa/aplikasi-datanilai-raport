<?php
    if ( isset($_GET["kode_barang"]) ){
        $kode_barang = $_GET["kode_barang"];
        $check_kode_barang = "SELECT * FROM transaksi WHERE kode_barang = '$kode_barang';";
        include('./input-config.php');
        $querry = mysqli_query($mysqli, $check_kode_barang);
        $row = mysqli_fetch_array($querry);
    }
?>
<div class="container">
<h1>Edit Data</h1>
<form action="input-datakwu-edit.php" method="POST">
    <label for="kode_barang"> Kode Barang :</label>
    <input class="form-control" value="<?php echo $row["kode_barang"]; ?>" readonly type="number" name="kode_barang" placeholder="Ex. 0001" /><br>

    <label for="tanggal"> Tanggal :</label>
    <input class="form-control" value="<?php echo $row["tanggal"]; ?>" type="date" name="tanggal" /><br>

    <label for="pembeli"> Pembeli :</label>
    <input class="form-control" value="<?php echo $row["pembeli"]; ?>" type="name" name="pembeli" /><br>

    <label for="namabarang"> Nama Barang :</label>
    <input class="form-control" value="<?php echo $row["namabarang"]; ?>" type="name" name="namabarang" placeholder="Ex. Mie Lemonilo" /><br>
   
    <label for="qty"> qty :</label>
    <input class="form-control" value="<?php echo $row["qty"]; ?>"  type="number" name="qty" placeholder="Ex. 01" /><br>
   
    <label for="hargabeli"> Harga Beli :</label>
    <input class="form-control" value="<?php echo $row["hargabeli"]; ?>"  type="number" name="hargabeli" placeholder="Ex. 3.000" /><br>
  
    <label for="hargajual"> Harga Jual :</label>
    <input class="form-control" value="<?php echo $row["hargajual"]; ?>" type="number" name="hargajual" placeholder="Ex. 5.000" /><br>

    <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" />
    <a class='btn btn-sm btn-secondary' href="input-datakwu.php">kembali</a>
</form>
<?php
    if ( isset($_POST["simpan"])) {
        $kode_barang = $_POST["kode_barang"];
        $tanggal = $_POST["tanggal"];
        $pembeli = $_POST["pembeli"];
        $namabarang = $_POST["namabarang"];
        $qty = $_POST["qty"];
        $hargabeli = $_POST["hargabeli"];
        $hargajual = $_POST["hargajual"];

        //Edit - Memperbarui Data 
        $query ="
            UPDATE transaksi SET tanggal = '$tanggal',
            pembeli = '$pembeli',
            namabarang = '$namabarang',
            qty = '$qty',
            hargabeli = '$hargabeli',
            hargajual = '$hargajual'
            WHERE kode_barang = '$kode_barang';
        ";
        include ('./input-config.php');
        $update = mysqli_query($mysqli, $query);

        if($update){
            echo "
                <script>
                    alert('Data Berhasil Diperbaharui');
                    window.location='input-datakwu.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data Gagal diperbaharui');
                window.location='input-datakwu-edit.php?nis=$nis';
            </script>
            ";
        }
    }
?>