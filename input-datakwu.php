<?php
    include('./input-config.php');
    if ( $_SESSION["login"] != TRUE) {
        header('location:login.php');
    }
    echo "<div class='container'>";
    echo "Selamat Datang, " . $_SESSION["username"] . "<br>" ;
    echo "Anda sebagai : " . $_SESSION["role"];
    echo " - <a class='btn btn-sm btn-secondary' href='logout.php'>Logout</a>";
    echo "<hr>";

    echo "<a class='btn btn-sm btn-primary' href='input-datakwu-tambah.php'>Tambah Data</a>";
    echo " - <a  class='btn btn-sm btn-warning' href='input-datakwu-pdf.php'>Cetak PDF</a>";
    echo "<hr>";
    // Menampilkan data dari database
    $no = 1;
    $tabledata = "";
    $data = mysqli_query($mysqli," SELECT * FROM transaksi ");
    while($row = mysqli_fetch_array($data)){

        $totalhargabeli = ($row ["qty"] * $row["hargabeli"]);
        $totalhargajual = ($row ["qty"] * $row["hargajual"]);
        $laba = ($totalhargajual - $totalhargabeli);


        $tabledata .= "
        <tr>
            <td>".$row["kode_barang"]. "</td>
            <td>".$row["tanggal"]. "</td>
            <td>".$row["pembeli"]. "</td>
            <td>".$row["namabarang"]. "</td>
            <td>".$row["qty"]. "</td>
            <td>".$row["hargabeli"]. "</td>
            <td>".$row["hargajual"]. "</td>
            <td>".$totalhargabeli."</td>
            <td>".$totalhargajual."</td>
            <td>".$laba."</td>
        
            <td>
                <a class='btn btn-sm btn-success' href='input-datakwu-edit.php?kode_barang=".$row["kode_barang"]."'>Edit</a>
                  &nbsp;-&nbsp;
                <a class='btn btn-sm btn-danger' href='input-datakwu-hapus.php?kode_barang=".$row["kode_barang"]."' 
                onclick='return confirm(\"Serius mau hapus? ga akan nyesel?\");'>Hapus</a>
            </td>
        </tr> 
             
      ";
      $no++;
    }

    echo "
        <table class='table table-dark table-bordered table-striped'>
        <tr>
            <th>Kode Barang</th>
            <th>Tanggal</th>
            <th>Pembeli</th>
            <th>Nama Barang</th>
            <th>qty</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Total Harga Beli</th>
            <th>Total Harga Jual</th>
            <th>Laba</th>
            <th>Aksi</th>
        </tr>
        $tabledata
     </table>       
 ";
 echo "</div>";

 ?>

