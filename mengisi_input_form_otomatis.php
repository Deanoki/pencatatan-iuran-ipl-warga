 view atau tampilannya :
 <tr><td width='200'>Nama Buku</td>
                
                <td>
        <select name="nik" id="nik" onchange="pilih_nik()" style="width: 200px" class="form-control">
                <option value="">--Pilih--</option>
                <?php
                $list = $this->db->query("SELECT * FROM warga");
                foreach($list->result() as $t){
                ?>
                  <option value="<?php echo $t->nik ?>" <?php if($nik== "$t->nik"){ echo 'selected'; } ?>><?php echo $t->nik ?></option>
                  <?php } ?>
                </select></td>

             <td><input type="text" class="form-control" name="id_unit" style="width: 200px" id="id_unit" placeholder="unit" /></td>
         </tr>
///////////////////////////////////////////////////////////////////////////
javascriptnya:

<script src="<?php echo base_url('bootstrap/page/jquery-3.3.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

<script type="text/javascript">
    // $(function() {

    //     $("#id_buku").autocomplete({
    //         source: "<?php echo base_url() ?>/index.php/peminjaman_buku/detail_buku",
    //         minLength: 1
    //     });       
    // });

     function pilih_buku(){
        var id_buku = $("#id_buku").val();
        $.ajax({
            url:"<?php echo base_url() ?>index.php/peminjaman_buku/menampilkan_penulis",
            data:"id_buku=" + id_buku ,
            method: 'post',
            dataType: 'json',
                success: function(data)
                {
                    $("#nama_penulis").val(data.nama_penulis_b);
                   
                }
            });    

    }
     $(function() {
        $(document).ready(function() {
    $('#id_buku').select2()
        });    
    });
</script>
///////////////////////////////////////////////////////////////////////////////////

phpnya atau controllernya :
function menampilkan_penulis(){
        $id_buku = $_POST['id_buku'];
        $s = "SELECT nama_penulis as nama_penulis_b FROM tb_buku WHERE id_buku='$id_buku'";
    $res = $this->db->query($s)->row_array();
    echo json_encode($res);
    }