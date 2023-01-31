<?php
include ('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form >
        <table border="1">
            <tr>
                <td> NIK</td>
                <td>
                    <select name="nik" id="nik" onchange="changeValue(this.value)" require>
                    <option > Silihkan isi NIK</option>
                    <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM warga order by nik ASC");
                        $r = mysqli_query($koneksi, "SELECT * FROM warga");
                        $a = "var nama = new Array();\n;";
                        $b = "var id_unit = new Array();\n;";
                        while($row = mysqli_fetch_array($r)){
                            echo '<option name="nik" value="'.$row['nik'] . '">' . $row['nik'] . '</option>' ;

                            $a .= "nama['" . $row['nik'] . "'] = {nama:'" . addslashes($row['nama'])."'};\n";  

                            $b .= "id_unit['" . $row['nik'] . "'] = {id_unit:'" . addslashes($row['id_unit'])."'};\n"; 
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>nama warga</td>  
                <td><input type="text" name="nama" id="nama" readonly></td> 
            </tr>
            <tr>
                <td>id unit</td>  
                <td><input type="text" name="id_unit" id="id_unit" readonly></td> 
            </tr>
            <script type="text/javascript">
                <?php
                    echo $a;
                    echo $b;
                ?>
                function changeValue(id){
                    document.getElementById('nama').value = nama[id].nama;
                    document.getElementById('id_unit').value = id_unit[id].id_unit;
                };
            </script>
        </table>
    </form>
</body>
</html>


<select type="text" class="form-control " name="nik">
                        <option value="not_option">
                            Silahkan Pilih NIK
                        </option>
                        <?php
                          $query = mysqli_query($koneksi, "SELECT * FROM warga ORDER BY nik");
                          while($data = mysqli_fetch_array($query)){
                        ?>
                        <option value="<?php $data['nik'];?><?php echo $data['nik'];?>"><?php echo $data['nik'];?></option>
                        <?php
                          }
                        ?>
                        <input type="button" value="pilih" class="btn btn-primary ml-2 mr-2">
              </select>