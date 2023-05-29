<?php

class Members extends DB
{
    function getMembersJoin()
    {
        $query = "SELECT members.id, members.name, members.email, members.phone, members.join_date, prodi.id, prodi.nama FROM members INNER JOIN prodi ON members.id_prodi = prodi.id";
        return $this->execute($query);
    }

    function getMembersJoinByID($id)
    {
        $query = "SELECT * FROM members WHERE id=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_prodi = $data['id_prodi'];
        $query = "INSERT INTO members (name, email, phone, join_date, id_prodi) VALUES ('$name', '$email', '$phone', '$join_date', '$id_prodi')";
        return $this->execute($query);
    }
    
    function delete($id)
    {
        $query = "DELETE FROM members WHERE id = '$id'";
        return $this->execute($query);
    }

    function edit($id)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $join_date = $_POST['join_date'];
        $id_prodi = $_POST['id_prodi'];
        $query = "UPDATE members SET name = '$name', email = '$email', phone = '$phone', join_date='$join_date', id_prodi = '$id_prodi' WHERE id = '$id'";
        return $this->execute($query);
    }
   
}
