<?php
class ProdiView {
  public function render($data) {
      $dataProdi = null;
      $no = 1;
      foreach ($data as $val) {
          list($id, $name) = $val;
          $dataProdi .= "<tr>
              <td>" . $id . "</td>
              <td>" . $name . "</td>
              <td>
                  <a href='prodi.php?id_edit=" . $id . "' class='btn btn-success'>Edit</a>
                  <a href='prodi.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
              </td>
          </tr>";
          $no++;
      }

      $tpl = new Template("templates/Prodi.html");
      $tpl->replace("DATA_TABEL", $dataProdi);
      $tpl->write();
  }
  public function FormProdiUpdate($data) {
      $id = '';
      $nama = '';
      if (!empty($data)) {
          foreach ($data as $val) {
              list($id, $nama) = $val;
          }
      }

      $tpl = new Template("templates/prodiForm.html");
      $tpl->replace("DATA_TITLE", "Ubah");
      $tpl->replace("ACTION", "update");
      $tpl->replace("ID", $id);
      $tpl->replace("NAMA", $nama);
      $tpl->write();
  }
  public function FormProdiAdd() {
      $tpl = new Template("templates/prodiForm.html");
      $tpl->replace("DATA_TITLE", "Tambah");
      $tpl->replace("ACTION", "add");
      $tpl->replace("ID", "");
      $tpl->replace("NAMA", "");
      $tpl->write();
  }
}
