<?php
include 'koneksi.php';

//Pengaturan Simpan
if(isset($_POST['bsimpan']))
{
    if($_GET['hal'] == "edit"){
        //data diedit
        $edit = mysqli_query($koneksi, "UPDATE tb_pegawai set Id = '$_POST[tid]', Nama = '$_POST[tnama]', Alamat = '$_POST[talamat]', Email = '$_POST[temail]', Gender = '$_POST[tgender]', Divisi = '$_POST[tdivisi]', Jabatan = '$_POST[tjabatan]' WHERE Id ='$_GET[Id]' ");
        if ($edit){
            echo "<script> alert('Pengeditan Data Anda Telah Berhasil');
                            document.location='dataPegawai.php';
            </script>";
        }else{
            echo "<script> alert('Maaf Pengeditan Data Anda Belum Berhasil');
                            document.location='dataPegawai.php';
            </script>";
        }

    }else{
        //data baru
        $simpan = mysqli_query($koneksi, "INSERT INTO tb_pegawai (Id, Nama, Alamat, Email, Gender, Divisi, Jabatan)
        VALUES ('$_POST[tid]', '$_POST[tnama]', '$_POST[talamat]', '$_POST[temail]', '$_POST[tgender]','$_POST[tdivisi]', '$_POST[tjabatan]') ");
        if ($simpan){ //jika penyimpanan sukses
            echo "<script> alert('Penyimpanan data anda telah berhasil');
                            document.location='dataPegawai.php';
            </script>";
        }else{
            echo "<script> alert('Maaf Penyimpanan Data Anda Belum Berhasil');
                            document.location='dataPegawai.php';
            </script>";
        }

    }
}

//Pengaturan Edit / hapus
if (isset($_GET['hal'])){
    //menampilkan data edit
    if($_GET['hal']== "edit"){
        $tampil = mysqli_query($koneksi, "SELECT * From tb_pegawai WHERE Id = '$_GET[Id]' ");
        $data = mysqli_fetch_array($tampil);
        if($data){
            //data yang ditemukan akan ditampung ke dalam variabel
            $vid = $data['Id'];
            $vnama = $data['Nama'];
            $valamat = $data['Alamat'];
            $vemail = $data['Email'];
            $vgender = $data['Gender'];
            $vdivisi = $data['Divisi'];
            $vjabatan = $data['Jabatan'];
        }
    }else if($_GET['hal'] == "hapus"){
        //Hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM tb_pegawai WHERE Id = '$_GET[Id]' ");
        if ($hapus){
            echo "<script> alert('Penghapusan Data Berhasil');
                            document.location='dataPegawai.php';
            </script>";
        }
    }
}

?>
<html>
    <head>
        <title>Data Pegawai</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">

            <br><h1 class="text-center">Data Pegawai</h1><br>

            <!--awal card form-->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Form Input Data Pegawai
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class ="form-grub">
                            <label>ID</label>
                            <input type="text" name="tid" value="<?=@$vid?>" class="form-control" placeholder="Masukan ID Anda" required ><br>
                        </div>
                        <div class ="form-grub">
                            <label>Nama</label>
                            <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Masukan Nama Anda" required ><br>
                        </div>
                        <div class ="form-grub">
                            <label>Alamat</label>
                            <input type="text" name="talamat" value="<?=@$valamat?>" class="form-control" placeholder="Masukan Alamat Anda" required ><br>
                        </div>
                        <div class ="form-grub">
                            <label>Email</label>
                            <input type="text" name="temail" value="<?=@$vemail?>" class="form-control" placeholder="Masukan Email Anda" required ><br>
                        </div>
                        <div class ="form-grub">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="tgender" >
                                <option value="<?=@$vgender?>"></option>
                                <option value="perempuan">Perempuan</option>
                                <option value="laki-laki">Laki-Laki</option>
                            </select> <br>
                        </div>
                        <div class ="form-grub">
                            <label>Divisi</label>
                            <select class="form-control" name="tdivisi" >
                                <option value="<?=@$vdivisi?>"></option>
                                <option value="HRD">HRD</option>
                                <option value="Pemasaran">Pemasaran</option>
                                <option value="Periklanan">Periklanan</option>
                                <option value="Operasional">Oprasional</option>
                            </select> <br>
                        </div>
                        <div class ="form-grub">
                            <label>Jabatan</label>
                            <input type="text" name="tjabatan" value="<?=@$vjabatan?>" class="form-control" placeholder="Masukan Jabatan Anda" required ><br>
                        </div>
                        <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                        <button type="batal" class="btn btn-danger" name="bbatal">Batal</button>
                    </form>
                </div>
            </div>
            <!--Akhir card form-->
            <!--awal card Tabel-->
            <div class="card">
                <div class="card-header bg-info text-white">
                    Data Buku Tamu
                </div>
                <div class="card-body">
                    <table class="table table-border table-striped">
                        <tr>
                            <td>No. </td>
                            <td>Id</td>
                            <td>Nama</td>
                            <td>Alamat</td>
                            <td>Email</td>
                            <td>Jenis Kelamin</td>
                            <td>Divisi</td>
                            <td>Jabatan</td>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no =1;
                        $tampil = mysqli_query($koneksi, "SELECT * from tb_pegawai order by Id desc");
                        while($data = mysqli_fetch_array($tampil)) :
                        ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$data['Id']?></td>
                            <td><?=$data['Nama']?></td>
                            <td><?=$data['Alamat']?></td>
                            <td><?=$data['Email']?></td>
                            <td><?=$data['Gender']?></td>
                            <td><?=$data['Divisi']?></td>
                            <td><?=$data['Jabatan']?></td>
                            <td>
                                <a href="dataPegawai.php?hal=edit&Id=<?=$data['Id']?>" class="btn btn-warning">Edit</a>
                                <a href="dataPegawai.php?hal=hapus&Id=<?=$data['Id']?>" onclick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; //penutup perulangan while ?>
                    </table>
                    
                </div>
            </div>
            <!--Akhir card tabel-->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>