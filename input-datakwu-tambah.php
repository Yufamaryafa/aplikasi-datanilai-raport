<div class="container">
<h1>Tambah Data</h1>
<form action="input-datakwu-tambah.php" method="POST">
    <label for="kode_barang">Kode Barang:</label>
    <input class="form-control" type="number" name="kode_barang" placeholder="Ex. 0001" /><br>

    <label for="tanggal">Tanggal :</label>
    <input class="form-control" type="date" name="tanggal"  /><br>

    <label for="pembeli">Pembeli :</label>
    <input class="form-control" type="text" name="pembeli" placeholder="Ex. yufa"/><br>

    <label for="namabarang">Nama Barang :</label>
    <input class="form-control" type="text" name="namabarang" placeholder="Ex. Mie Lemonilo" /><br>

    <label for="qty">qty :</label>
    <input class="form-control" type="number" name="qty" placeholder="Ex. 01" /><br>

    <label for="hargabeli">Harga Beli :</label>
    <input class="form-control" type="number" name="hargabeli" placeholder="Ex. 3.000" /><br>

    <label for="hargajual">Harga Jual :</label>
    <input class="form-control" type="number" name="hargajual" placeholder="Ex. 5.000" /><br>

    <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" />
    <a class='btn btn-sm btn-secondary' href="input-datakwu.php">Kembali</a>
</form>    
</div>

<?php 
     include('./input-config.php');
     if ( $_SESSION["login"] != TRUE) {
         header('location:login.php');
     }
      if ( $_SESSION["role"] != "siswa" ) {
        echo "
        <script>
            alert('Akses tidak diberikan, Kamu Bukan Admin Siswa');
            window.location='input-datakwu.php';
        </script>
        ";
      }

    if( isset($_POST["simpan"]) ){
        $kode_barang = $_POST["kode_barang"];
        $tanggal = $_POST["tanggal"];
        $pembeli = $_POST["pembeli"];
        $namabarang = $_POST["namabarang"];
        $qty = $_POST["qty"];
        $hargabeli = $_POST["hargabeli"];
        $hargajual = $_POST["hargajual"];

        //CREATE - Menammbahkan Data ke Database
        $query = "
            INSERT INTO transaksi VALUES
            ('$kode_barang','$tanggal','$pembeli','$namabarang',' $qty','$hargabeli',' $hargajual');
         ";

        
         $insert = mysqli_query($mysqli, $query);

         if ($insert){
                echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    window.location='input-datakwu.php';
                </script>
            ";
         }

    }
    ?>