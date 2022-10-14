<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    include('./input-config.php');
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
            <td>".$row["hargajual"]. "</td>
            <td>".$row["hargabeli"]. "</td>
            <td>".$totalhargabeli."</td>
            <td>".$totalhargajual."</td>
            <td>".$laba."</td>
        </tr> 
             
      ";
      $no++;
    }

    $waktu_cetak = date('d M Y - H:i:s');
    $table = "
        <h1>Laporan Data KWU</h1>
        <h6>Waktu Cetak : $waktu_cetak</h6>
        <table width='100%' cellpadding=5 border=1 cellspacing=0>
        <tr>
            <th>Kode Barang</th>
            <th>Tanggal</th>
            <th>Pembeli</th>
            <th>Nama Barang</th>
            <th>QTY</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Total Harga Beli</th>
            <th>Total Harga Jual</th>
            <th>Laba</th>            
        </tr>
        $tabledata
     </table>       
 ";

    $mpdf->WriteHTML($table);
    $mpdf->Output();