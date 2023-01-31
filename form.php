<?php
include ('koneksi.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>belajar autofill - sahretech.com</title>
    </head>
    <body>
        <form action="">
            <table>
                <tr>
                    <td>NIK</td>
                    <td><select type="text" id="nik" onChange="changeValue(this.value)">
                        <option value="">Silahkan Masukan NIK</option>
                        <?php
                            $query = mysqli_query($koneksi,"SELECT * FROM warga where nik ");
                            while($r = mysqli_fetch_array($query)){
                        ?>
                        <option value="<?php $r['nik']; ?>"> <?php echo $r['nik'];?></option>
                        <?php
                            }
                        ?>
                    </select></td>
                </tr>
                <!-- <tr><td>NIK</td><td><input type="text" onkeyup="isi_otomatis()" id="nik"></td></tr> -->
                <tr><td>NAMA</td><td><input type="text" id="nama" disabled></td></tr>
                <tr><td>ID UNIT</td><td><input type="text" id="id_unit" disabled></td></tr>
                <tr><td>ALAMAT</td><td><input type="text" id="alamat" disabled></td></tr>
                <tr><td>NO TELP</td><td><input type="text" id="no_telpon" disabled></td></tr>
            </table>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var nik = $("#nik").val();
                $.ajax({
                    url : 'ajax.php',
                    data: "nik="+nik ,
                }).success(function(data){
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama').val(obj.nama);
                    $('#id_unit').val(obj.id_unit);
                    $('#alamat').val(obj.alamat);
                    $('#no_telpon').val(obj.no_telpon);
                });
            }
        </script>
    </body>
</html>