<?php
      include ('./input-config.php');
      if( $_SESSION["login"] !=TRUE) {
            header('location:login.php');
      }
      if( $_SESSION["role"] !="siswa") {
            echo "
                  <script>
                        alert('Akses tidak diberikan, kamu bukan Admin Siswa');
                        window.location='input-datakwu.php';
                  </script>
            ";
      }

      if ( isset($_GET["kode_barang"]) && $_SESSION["role"] =="siswa" ){
            $kode_barang = $_GET["kode_barang"];

            $query = "
                  DELETE FROM transaksi
                  WHERE kode_barang = '$kode_barang';
            ";
            
            $delete = mysqli_query($mysqli, $query);

            if($delete){
                  echo "
                        <script>
                        alert('Data berhasil dihapus');
                        window.location='input-datakwu.php';
                        </script>
                  ";
            }else{
                  echo "
                        <script>
                        alert('Data gagal');
                        window.location='input-datakwu.php';
                        </script>
                  ";
            }
      }
?>
