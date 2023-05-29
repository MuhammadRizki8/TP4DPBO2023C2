<?php
class MembersView{
    public function render($data){
        $no = 1;
        $dataMember = null;
        foreach($data as $val){
            list($id,$nama,$email, $phone, $join_date ,$id_Prodi ,$Prodi) = $val;
            $dataMember .= "<tr>
                    <td>" . $id . "</td>
                    <td>" . $nama . "</td>
                    <td>" . $email . "</td>
                    <td>" . $phone . "</td>
                    <td>" . $join_date . "</td>
                    <td>" . $Prodi . "</td>
                    <td>
                        <a href='index.php?id_edit=" . $id . "' class='btn btn-success'>Edit</a>
                        <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                    </td>
                    </tr>";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("DATA_TABEL", $dataMember);
        $tpl->write();
    }
    
    public function FormMemberUpdate($data)
    {
        $no = 1;
        $dataProdi = null;
        $simpanProdi = 0;
    
        foreach ($data['Members'] as $val) {
            list($id, $nama, $email, $phone, $join_date, $id_Prodi) = $val;
            $simpanProdi = $id_Prodi; // Simpan nilai ID Prodi untuk opsi terpilih
        }
    
        foreach ($data['Prodi'] as $val) {
            list($id_prodi, $namaProdi) = $val;
            if ($id_prodi == $simpanProdi) {
                $dataProdi .= "<option selected value='" . $id_prodi . "'>" . $namaProdi . "</option>";
            } else {
                $dataProdi .= "<option value='" . $id_prodi . "'>" . $namaProdi . "</option>";
            }
        }
    
        $tpl = new Template("templates/indexForm.html");
        $tpl->replace("DATA_TITLE", "Ubah");
        $tpl->replace("ACTION", "update");
        $tpl->replace("ID", $id);
        $tpl->replace("NAMA", $nama);
        $tpl->replace("EMAIL", $email);
        $tpl->replace("PHONE", $phone);
        $tpl->replace("JOIN_DATE", $join_date);
        $tpl->replace("OPTION", $dataProdi);
        $tpl->write();
    }
    
    public function FormMemberAdd($data){
        $dataProdi = null;
        foreach($data as $val){
            list($id, $nama) = $val;
            $dataProdi .= "<option value='".$id."'>".$nama."</option>";
        }

        $tpl = new Template("templates/indexForm.html");
        $tpl->replace("DATA_TITLE", "Tambah");
        $tpl->replace("ACTION", "add");
        $tpl->replace("ID", "");
        $tpl->replace("NAMA", "");
        $tpl->replace("EMAIL", "");
        $tpl->replace("PHONE", "");
        $tpl->replace("JOIN_DATE", "");
        $tpl->replace("OPTION", $dataProdi);
        $tpl->write();
    }  
}
?>
