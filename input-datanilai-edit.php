<?php
    if ( isset($_GET["nis"]) ){
        $nis = $_GET["nis"];
        $check_nis = "SELECT * FROM datanilai WHERE nis = '$nis';";
        include('./input-config.php');
        $querry = mysqli_query($mysqli, $check_nis);
        $row = mysqli_fetch_array($querry);
    }
?>
<div class="container">
<h1>Edit Data</h1>
<form action="input-datanilai-edit.php" method="POST">
    <label for="nis"> Nomor Induk siswa :</label>
    <input class="form-control" value="<?php echo $row["nis"]; ?>" readonly type="number" name="nis" placeholder="Ex. 12100848" /><br>

    <label for="namalengkap"> Nama Lengkap :</label>
    <input class="form-control" value="<?php echo $row["namalengkap"]; ?>" type="text" name="namalengkap" placeholder="Ex. Yufa" /><br>

    <label for="jk"> Jenis Kelamin :</label>
    <input class="form-control" value="<?php echo $row["jk"]; ?>" type="text" name="jk" /><br>

    <label for="kelas"> Kelas :</label>
    <input class="form-control" value="<?php echo $row["kelas"]; ?>" type="text" name="kelas" placeholder="Ex. XI RPL 1" /><br>
   
    <label for="nilai_kehadiran"> Nilai Kehadiran :</label>
    <input class="form-control" value="<?php echo $row["nilai_kehadiran"]; ?>"  type="number" name="nilai_kehadiran" placeholder="Ex. 80" /><br>
   
    <label for="nilai_tugas"> Nilai Tugas :</label>
    <input class="form-control" value="<?php echo $row["nilai_tugas"]; ?>"  type="number" name="nilai_tugas" placeholder="Ex. 80" /><br>
  
    <label for="nilai_pts"> Nilai PTS :</label>
    <input class="form-control" value="<?php echo $row["nilai_pts"]; ?>" type="number" name="nilai_pts" placeholder="Ex. 90" /><br>
   
    <label for="nilai_pas"> Nilai PAS :</label>
   <input class="form-control" value="<?php echo $row["nilai_pas"]; ?>" type="number" name="nilai_pas" placeholder="Ex. 80" /><br>

    <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" />
    <a class='btn btn-sm btn-secondary' href="input-datanilai.php">kembali</a>
</form>
<?php
    if ( isset($_POST["simpan"])) {
        $nis = $_POST["nis"];
        $namalengkap = $_POST["namalengkap"];
        $jk = $_POST["jk"];
        $kelas = $_POST["kelas"];
        $nilai_kehadiran = $_POST["nilai_kehadiran"];
        $nilai_tugas = $_POST["nilai_tugas"];
        $nilai_pts = $_POST["nilai_pts"];
        $nilai_pas = $_POST["nilai_pas"];

        //Edit - Memperbarui Data 
        $query ="
            UPDATE datanilai SET namalengkap = '$namalengkap',
            jk = '$jk',
            kelas = '$kelas',
            nilai_kehadiran = '$nilai_kehadiran',
            nilai_tugas = '$nilai_tugas',
            nilai_pts = '$nilai_pts',
            nilai_pas = '$nilai_pas'
            WHERE nis = '$nis';
        ";
        include ('./input-config.php');
        $update = mysqli_query($mysqli, $query);

        if($update){
            echo "
                <script>
                    alert('Data Berhasil Diperbaharui');
                    window.location='input-datanilai.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data Gagal diperbaharui');
                window.location='input-datanilai-edit.php?nis=$nis';
            </script>
            ";
        }
    }
?>