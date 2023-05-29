<?php
class Prodi extends DB {
    public function getProdi() {
        $query = "SELECT * FROM prodi";
        return $this->execute($query);
    }

    public function getProdiById($id) {
        $query = "SELECT * FROM prodi WHERE id = $id";
        return $this->execute($query);
    }

    public function add($data) {
        $name = $data['name'];
        $query = "INSERT INTO prodi VALUES ('', '$name')";
        return $this->execute($query);
    }

    public function delete($id) {
        $query = "DELETE FROM members WHERE id_prodi = '$id'";
        $this->execute($query);
        $query = "DELETE FROM prodi WHERE id = '$id'";
        return $this->execute($query);
    }

    public function edit($id, $data) {
        $name = $data['name'];
        $query = "UPDATE prodi SET nama = '$name' WHERE id = '$id'";
        return $this->execute($query);
    }
}
?>